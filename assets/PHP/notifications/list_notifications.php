<?php

session_start();

$username = $_SESSION['username'] ?? null;
$notifications = [];

if ($username) {
    $jsonFile = 'notifications.json';
    if (file_exists($jsonFile)) {
        $allNotifications = json_decode(file_get_contents($jsonFile), true);
        // Filter notificaties voor de specifieke gebruiker
        $notifications = array_filter($allNotifications, function($notification) use ($username) {
            return $notification['username'] === $username;
        });
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <?php if ($username && $notifications): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Type</th>
                <th>Shown</th>
                <th>Date and time</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($notifications as $notification): ?>
            <tr>
                <td><?= htmlspecialchars($notification['type']) ?></td>
                <td><?= htmlspecialchars($notification['shown']) ?></td>
                <td><?= htmlspecialchars($notification['timestamp']) ?></td>
                <td><?= htmlspecialchars($notification['message']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Geen notificaties beschikbaar.</p>
    <?php endif; ?>
</div>

</body>
</html>
