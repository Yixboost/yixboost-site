<?php
header('Content-Type: application/json');

// Verkrijg de gegevens van het POST-verzoek
$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'] ?? '';

// Controleer of de gebruikersnaam niet leeg is
if (empty($username)) {
    echo json_encode(['exists' => false, 'error' => 'Empty username']);
    exit();
}

// Laad de logins vanuit een JSON-bestand
$loginsFile = 'http://yixboost.nl.eu.org/yixboost/login/hotspot/logins.json';

if (file_exists($loginsFile)) {
    $logins = json_decode(file_get_contents($loginsFile), true);

    // Controleer of de gebruikersnaam bestaat in het logins-bestand
    $exists = isset($logins[$username]);

    echo json_encode(['exists' => $exists]);
} else {
    echo json_encode(['exists' => false, 'error' => 'Login file not found']);
}
?>
