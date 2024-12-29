<?php
session_start();

// Get the username from the query parameter 'usr'
if (isset($_GET['usr'])) {
    $username = $_GET['usr'];
} else {
    // If no username is provided in the URL, output an error or use a default username
    header('HTTP/1.0 400 Bad Request');
    echo 'Username parameter is missing.';
    exit;
}

// Load and decode the JSON file
$data = json_decode(@file_get_contents('/volume1/web/yixboost/login/hotspot/logins.json'), true);

// Check if the username is in the data and the picture exists
if ($data && isset($data[$username]['picture'])) {
    // Set the picture in the session (optional)
    $_SESSION['picture'] = $data[$username]['picture'];
}

// Ensure the picture is available before outputting
if (isset($_SESSION['picture'])) {
    // Set the content-type to PNG
    header('Content-Type: image/png');

    // Read and output the image file
    $imagePath = '/volume1/web/yixboost/profile-pictures/' . $_SESSION['picture'] . '.png';
    if (file_exists($imagePath)) {
        // Output the image directly to the browser
        readfile($imagePath);
    } else {
        // If the image doesn't exist, output an error or a default image
        header('HTTP/1.0 404 Not Found');
        echo 'Image not found.';
    }
} else {
    // If no picture is found for the username, output an error
    header('HTTP/1.0 404 Not Found');
    echo 'No picture found for user ' . htmlspecialchars($username);
}
?>
