<?php
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['username'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

$username = $_SESSION['username'];
$messagesFile = 'messages.json';

// Controleer of de ontvanger is opgegeven
if (!isset($_GET['recipient'])) {
    echo json_encode(['error' => 'No recipient specified']);
    exit();
}

$recipient = $_GET['recipient'];

// Controleer of het berichtenbestand bestaat
if (!file_exists($messagesFile)) {
    echo json_encode([]);
    exit();
}

$messages = json_decode(file_get_contents($messagesFile), true);
$chatMessages = [];

// Filter berichten
foreach ($messages as $message) {
    if (($message['sender'] === $username && $message['recipient'] === $recipient) ||
        ($message['recipient'] === $username && $message['sender'] === $recipient)) {
        $chatMessages[] = $message;
    }
}

// Geef de gefilterde berichten terug
echo json_encode($chatMessages);
