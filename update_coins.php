<?php
// Pad naar je JSON-bestand
$filePath = 'login/hotspot/logins.json';

// Controleer of de vereiste POST-parameters aanwezig zijn
if (!isset($_POST['username']) || !isset($_POST['coins'])) {
    die('Username en coins zijn vereist.');
}

$username = $_POST['username'];
$coinsToAdd = (int)$_POST['coins'];

// Lees de bestaande JSON-gegevens
$jsonData = file_get_contents($filePath);
$data = json_decode($jsonData, true);

if ($data === null) {
    die('Fout bij het lezen van JSON-gegevens.');
}

// Controleer of de gebruiker bestaat en voeg de coins toe
if (isset($data[$username])) {
    if (!isset($data[$username]['coins'])) {
        $data[$username]['coins'] = 0;
    }
    $data[$username]['coins'] += $coinsToAdd;
} else {
    die('De opgegeven gebruiker bestaat niet.');
}

// Encode de gegevens terug naar JSON
$newJsonData = json_encode($data, JSON_PRETTY_PRINT);

if ($newJsonData === false) {
    die('Fout bij het encoderen van JSON-gegevens.');
}

// Schrijf de bijgewerkte gegevens terug naar het bestand
file_put_contents($filePath, $newJsonData);

echo "Coins zijn bijgewerkt voor gebruiker $username.";
?>