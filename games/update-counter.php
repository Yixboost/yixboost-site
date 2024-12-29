<?php
$jsonFile = __DIR__ . '/../data/json/games.json';
$jsonData = file_get_contents($jsonFile);
$games = json_decode($jsonData, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $gameId = $_POST['id'];

    if (isset($games[$gameId])) {
        $games[$gameId]['views']++;
        file_put_contents($jsonFile, json_encode($games, JSON_PRETTY_PRINT));
        echo "Views voor game '" . $games[$gameId]['name'] . "' zijn verhoogd naar " . $games[$gameId]['views'];
    } else {
        echo "Fout: Game ID bestaat niet.";
    }
} else {
    echo "Fout: Geen geldig POST-verzoek of game ID ontvangen.";
}
?>
