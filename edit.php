<?php
// Pad naar je JSON-bestand
$filePath = 'login/hotspot/logins.json';

// Lees de bestaande JSON-gegevens
$jsonData = file_get_contents($filePath);
$data = json_decode($jsonData, true);

if ($data === null) {
    die('Fout bij het lezen van JSON-gegevens.');
}

// Voeg de 'coins' sleutel toe aan elke gebruiker
foreach ($data as $username => $user) {
    if (!isset($user['coins'])) {
        $data[$username]['coins'] = 0;
    }
}

// Encode de gegevens terug naar JSON
$newJsonData = json_encode($data, JSON_PRETTY_PRINT);

if ($newJsonData === false) {
    die('Fout bij het encoderen van JSON-gegevens.');
}

// Schrijf de bijgewerkte gegevens terug naar het bestand
file_put_contents($filePath, $newJsonData);

echo "De 'coins' sleutel is toegevoegd aan alle gebruikers.";
?>
