<?php
session_start();
header('Content-Type: application/json');

// Verkrijg de gegevens van het POST-verzoek
$data = json_decode(file_get_contents('php://input'), true);
$newContact = $data['username'] ?? '';

if (!isset($_SESSION['username'])) {
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
    exit();
}

if (empty($newContact)) {
    echo json_encode(['success' => false, 'error' => 'Contact username is empty']);
    exit();
}

// Laad de bestaande contacten uit de sessie of initialiseer een lege array
$contacts = $_SESSION['contacts'] ?? [];

// Voeg de nieuwe contactpersoon toe aan de lijst als deze nog niet bestaat
if (!in_array($newContact, $contacts)) {
    $contacts[] = $newContact;
    $_SESSION['contacts'] = $contacts;
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Contact already exists']);
}
?>
