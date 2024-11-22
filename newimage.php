<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_picture = $_POST["picture"];

    $file = 'login/hotspot/logins.json';
    $current_data = file_get_contents($file);
    $data = json_decode($current_data, true);

    $data[$_SESSION['username']]['picture'] = $selected_picture;

    file_put_contents($file, json_encode($data));

    $notification_data = http_build_query([
        'username' => $_SESSION['username'],
        'type' => 'success',
        'message' => 'Your profile picture has been successfully updated.',
        'timestamp' => date('Y-m-d H:i:s'),
        'shown' => false
    ]);

    $options = ['http' => ['header' => "Content-type: application/x-www-form-urlencoded\r\n", 'method' => 'POST', 'content' => $notification_data]];

    file_get_contents("http://yixboost.nl.eu.org/yixboost/assets/PHP/notifications/create_notification.php", false, stream_context_create($options));

    header("Location: profile.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Picture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .image-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }
        .image-container label {
            margin: 5px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border-color 0.3s ease;
            border-radius: 6px;
            overflow: hidden;
        }
        .image-container label:hover {
            border-color: #007bff;
        }
        .image-container img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        .image-container input[type="radio"] {
            display: none;
        }
        .image-container input[type="radio"]:checked + img {
            border: 2px solid #007bff;
        }
        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Change Picture</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="image-container">
                <?php for ($i = 1; $i <= 200; $i++) {
                    $imagePath = "profile-pictures/$i.png";
                    echo "<label><input type=\"radio\" name=\"picture\" value=\"$i\"><img src=\"$imagePath\" alt=\"Picture $i\"></label>";
                } ?>
            </div>
            <button type="submit">Change Picture</button>
        </form>
    </div>
<!-- Google tag (gtag.js) -->
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());
  gtag('config', 'G-7KHGF44319');
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7KHGF44319" type="text/javascript"></script>
</body>
</html>