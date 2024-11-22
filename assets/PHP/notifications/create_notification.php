<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $type = $_POST['type'];
    $message = $_POST['message'];
    $link = $_POST['link'];
    $image = $_POST['image'];
    $icon = $_POST['icon'];

    $notification = [
        'username'=> $username,
        'type' => $type,
        'message' => $message,
        'timestamp' => date('Y-m-d H:i:s'),
        'shown' => false,
        'link' => $link,
        'image' => $image,
        'icon' => $icon
    ];

    $jsonFile = 'notifications.json';
    if (file_exists($jsonFile)) {
        $notifications = json_decode(file_get_contents($jsonFile), true);
    } else {
        $notifications = [];
    }

    $notifications[] = $notification;

    file_put_contents($jsonFile, json_encode($notifications, JSON_PRETTY_PRINT));

    echo "Notificatie toegevoegd voor gebruiker: $username";
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maak een Notificatie</title>
    <!-- Voeg Bootstrap CSS toe -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Maak een Notificatie</h1>
        <form action="http://yixboost.nl.eu.org/yixboost/assets/PHP/notifications/create_notification.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                <select id="type" name="type" class="form-control">
                    <option value="info">Info</option>
                    <option value="warning">Warning</option>
                    <option value="error">Error</option>
                    <option value="success">Success</option>
                    <option value="neutral">Neutral</option>
                    <option value="alert">Alert</option>
                    <option value="confirmation">Confirmation</option>
                    <option value="progress">Progress</option>
                    <option value="pending">Pending</option>
                    <option value="failure">Failure</option>
                    <option value="notification">Notification</option>
                    <option value="update">Update</option>
                    <option value="reminder">Reminder</option>
                    <option value="promotion">Promotion</option>
                    <option value="special">Special</option>
                    <option value="offer">Offer</option>
                    <option value="gamesuggest">Gamesuggest</option>
                </select>
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="link">Link  (optional):</label>
                <textarea id="link" name="link" class="form-control" rows="1"></textarea>
            </div>
            
            <div class="form-group">
                <label for="image">Image (optional):</label>
                <textarea id="image" name="image" class="form-control" rows="1"></textarea>
            </div>
            
            <div class="form-group">
                <label for="image">Icon (optional):</label>
                <textarea id="icon" name="icon" class="form-control" rows="1"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Maak Notificatie</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

