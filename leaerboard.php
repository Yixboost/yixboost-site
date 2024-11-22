<?php
// Pad naar je JSON-bestand
$filePath = 'login/hotspot/logins.json';

// Lees de bestaande JSON-gegevens
$jsonData = file_get_contents($filePath);
$data = json_decode($jsonData, true);

if ($data === null) {
    die('Fout bij het lezen van JSON-gegevens.');
}

// Zet de gebruikers om naar een array van arrays voor sorteren
$users = [];
foreach ($data as $username => $user) {
    $users[] = [
        'username' => $username,
        'coins' => isset($user['coins']) ? $user['coins'] : 0
    ];
}

// Filter gebruikers met minimaal 1 coin
$users = array_filter($users, function($user) {
    return $user['coins'] >= 1;
});

// Sorteer gebruikers op basis van het aantal coins in aflopende volgorde
usort($users, function($a, $b) {
    return $b['coins'] <=> $a['coins'];
});

// Beperk het aantal gebruikers tot maximaal 100
$users = array_slice($users, 0, 100);

// Begin HTML-output
echo '<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Gebruikers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Top Gebruikers met de Meeste Coins</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Gebruikersnaam</th>
                <th>Coins</th>
            </tr>
        </thead>
        <tbody>';

// Vul de tabel met gegevens
foreach ($users as $user) {
    echo '<tr>
            <td>' . htmlspecialchars($user['username']) . '</td>
            <td>' . htmlspecialchars($user['coins']) . '</td>
          </tr>';
}

// Sluit HTML-output af
echo '    </tbody>
    </table>
</div>
</body>
</html>';
?>
