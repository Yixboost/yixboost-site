<?php
$username = isset($_POST['username']) ? $_POST['username'] : null;
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
    <title>Notificaties</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .toast-container {
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            z-index: 1050;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <form action="get_notifications.php" method="POST">
        <label for="username">Geef je username op:</label>
        <input type="text" id="username" name="username" required>
        <button type="submit" class="btn btn-primary">Bekijk Notificaties</button>
    </form>
</div>

<div class="toast-container">
    <?php if ($username && $notifications): ?>
        <?php foreach ($notifications as $notification): ?>
            <div class="toast show bg-<?= $notification['type'] ?>" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false" onclick="window.location.href='<?= htmlspecialchars($notification['link']) ?>'" style="cursor: pointer;">
                <div class="toast-header">
                    <strong class="me-auto"><?= ucfirst($notification['type']) ?></strong>
                    <small><?= $notification['timestamp'] ?></small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <?= htmlspecialchars($notification['message']) ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
