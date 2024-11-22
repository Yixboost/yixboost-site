<?php
session_start();

// Verkrijg de gegevens van het verzoek
$data = json_decode(file_get_contents('php://input'), true);
if ($data && isset($_SESSION['username'])) {
    $file = 'data.json';
    $jsonData = file_get_contents($file);
    $dataArray = json_decode($jsonData, true);

    // Voeg het nieuwe bericht toe aan de array
    $message = [
        'username' => $_SESSION['username'],
        'recipient' => $data['recipient'],
        'text' => $data['text']
    ];

    $dataArray['messages'][] = $message;

    // Sla de bijgewerkte gegevens op met pretty print
    file_put_contents($file, json_encode($dataArray, JSON_PRETTY_PRINT));
}
?>
