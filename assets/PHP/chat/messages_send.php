<?php
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['username'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

$username = $_SESSION['username'];
$messagesFile = 'messages.json';

// Controleer of de POST-gegevens correct zijn
if (!isset($_POST['recipient']) || !isset($_POST['message'])) {
    echo json_encode(['error' => 'Missing recipient or message']);
    exit();
}

$recipient = $_POST['recipient'];
$message = $_POST['message'];

// Haal de bestaande berichten op
if (file_exists($messagesFile)) {
    $messages = json_decode(file_get_contents($messagesFile), true);
} else {
    $messages = [];
}

// Voeg het nieuwe bericht toe
$messages[] = [
    'sender' => $username,
    'recipient' => $recipient,
    'message' => $message,
    'timestamp' => date('Y-m-d H:i:s')
];

// Sla de bijgewerkte berichten op
file_put_contents($messagesFile, json_encode($messages, JSON_PRETTY_PRINT));

echo json_encode(['success' => 'Message sent']);
?>
