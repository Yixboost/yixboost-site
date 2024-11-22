<?php
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$today = date('Y-m-d');

// Pad naar het bestand waarin de dagelijkse challenges worden opgeslagen
$challengeFile = 'challenges/daily_challenges.json';

// Laad bestaande challenges
if (!file_exists($challengeFile)) {
    file_put_contents($challengeFile, json_encode([]));
}
$challengesData = json_decode(file_get_contents($challengeFile), true);

// Als er nog geen challenge voor vandaag is, genereer er dan een
if (!isset($challengesData[$today])) {
    $jsonData = file_get_contents('games/games.json');
    $games = json_decode($jsonData, true);

    // Selecteer een willekeurige game voor de dagelijkse challenge
    mt_srand(strtotime($today)); // Zorg dat elke dag dezelfde game wordt gekozen
    $randomGameKey = array_rand($games);
    $randomGame = $games[$randomGameKey];

    // Genereer een willekeurige tijdsduur tussen 5 en 10 minuten
    $randomDuration = mt_rand(5, 10);

    // Sla de nieuwe challenge op met duur
    $challengesData[$today] = [
        'game_id' => $randomGameKey,
        'duration' => $randomDuration
    ];

    file_put_contents($challengeFile, json_encode($challengesData));
} else {
    $randomGameKey = $challengesData[$today]['game_id'];
    $randomDuration = $challengesData[$today]['duration'];
    $randomGame = $games[$randomGameKey];
}

// Laad de voortgang van de gebruiker
$progressFile = 'challenges/progress.json';
if (!file_exists($progressFile)) {
    file_put_contents($progressFile, json_encode([]));
}
$progressData = json_decode(file_get_contents($progressFile), true);

if (!isset($progressData[$username])) {
    $progressData[$username] = [];
}

// Check of de gebruiker de challenge al heeft voltooid
$hasCompletedChallenge = isset($progressData[$username][$today]);

// Als de challenge is voltooid, update de data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$hasCompletedChallenge) {
    $progressData[$username][$today] = true;
    file_put_contents($progressFile, json_encode($progressData));
    $hasCompletedChallenge = true;
}

// Bepaal de URL van het spel
$gameUrl = "http://yixboost.nl.eu.org/yixboost/games/game.php?id=" . urlencode($randomGameKey);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Challenge</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .challenge-container {
            max-width: 600px;
            margin: 50px auto;
            text-align: center;
        }
        .challenge-container img {
            max-width: 100%;
            height: auto;
        }
        .challenge-completed {
            color: green;
            font-size: 1.5em;
            margin-top: 20px;
        }
        .challenges-table {
            margin: 50px auto;
            width: 100%;
            max-width: 800px;
            text-align: left;
        }
        .challenges-table th, .challenges-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .challenges-table img {
            max-width: 100px;
            height: auto;
        }
        .completed-status {
            font-weight: bold;
        }
        .completed-status.completed {
            color: green;
        }
        .completed-status.incomplete {
            color: red;
        }
    </style>
</head>
<body>

<div class="challenge-container">
    <h1>Daily Challenge</h1>
    <h2><?php echo $today; ?></h2>
    
    <div class="game-info">
        <img src="<?php echo isset($randomGame['image']) ? $randomGame['image'] : 'http://yixboost.nl.eu.org/yixboost/games/' . urlencode($randomGameKey) . '/' . urlencode($randomGameKey) . '.png'; ?>" alt="<?php echo $randomGame['name']; ?>">
        <h3><?php echo $randomGame['name']; ?></h3>
        <p>Your challenge is to play this game for <?php echo $randomDuration; ?> minutes!</p>
        <a href="<?php echo $gameUrl; ?>" class="btn btn-primary btn-lg">Play Now</a>
    </div>

    <?php if ($hasCompletedChallenge): ?>
        <div class="challenge-completed">Challenge Completed!</div>
    <?php else: ?>
        <form method="post" style="margin-top: 20px;">
            <button type="submit" class="btn btn-success btn-lg">Mark as Completed</button>
        </form>
    <?php endif; ?>
</div>

<!-- Tabel met alle opgeslagen challenges -->
<div class="challenges-table">
    <h2>All Challenges</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Game</th>
                <th>Image</th>
                <th>Duration</th>
                <th>Completed</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($challengesData as $date => $challenge): 
                $game = $games[$challenge['game_id']];
                $completed = isset($progressData[$username][$date]);
            ?>
                <tr>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $game['name']; ?></td>
                    <td><img src="<?php echo isset($game['image']) ? $game['image'] : 'http://yixboost.nl.eu.org/yixboost/games/' . urlencode($challenge['game_id']) . '/' . urlencode($challenge['game_id']) . '.png'; ?>" alt="<?php echo $game['name']; ?>"></td>
                    <td><?php echo $challenge['duration']; ?> minutes</td>
                    <td class="completed-status <?php echo $completed ? 'completed' : 'incomplete'; ?>">
                        <?php echo $completed ? 'Yes' : 'No'; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
