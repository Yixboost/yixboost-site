<?php
session_start(); // Start de sessie

// Zorg ervoor dat er een ingelogde gebruiker is
if (!isset($_SESSION['username'])) {
    die('Geen gebruiker ingelogd.');
}

$username = $_POST['username'] ?? '';
$backgroundUrl = $_POST['background'] ?? '';

// Zorg ervoor dat zowel de username als background URL zijn opgegeven
if (empty($username) || empty($backgroundUrl)) {
    die('Onvolledige gegevens.');
}

// Pad naar het JSON-bestand
$jsonFilePath = 'login/hotspot/logins.json';

// Laad het JSON-bestand en decodeer het naar een PHP-array
$jsonData = file_get_contents($jsonFilePath);
$users = json_decode($jsonData, true);

// Controleer of het JSON correct is gedecodeerd
if ($users === null) {
    die('Fout bij het decoderen van het JSON-bestand.');
}

// Controleer of de gebruiker bestaat in de JSON-gegevens
if (isset($users[$username])) {
    $users[$username]['background'] = $backgroundUrl;

    // Sla de bijgewerkte gegevens op met pretty print
    $newJsonData = json_encode($users, JSON_PRETTY_PRINT);

    if (file_put_contents($jsonFilePath, $newJsonData)) {
        echo "Achtergrond succesvol bijgewerkt.";
    } else {
        die('Fout bij het opslaan van het JSON-bestand.');
    }
} else {
    die('Gebruiker niet gevonden.');
}
