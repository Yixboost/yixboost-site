<?php
session_start(); // Start the session

// Check if the username exists in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $data_directory = 'data';
    $user_file = $data_directory . '/' . $username . '.txt';

    // Ensure the data directory exists
    if (!is_dir($data_directory)) {
        mkdir($data_directory, 0777, true);
    }

    // Handle the form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_games'])) {
        $selected_games = $_POST['selected_games'];

        // Convert the array of selected game IDs to a comma and space-separated string
        $games_list = implode(', ', $selected_games);

        // Overwrite the file with the new game IDs
        file_put_contents($user_file, $games_list);

        // Redirect to index.php after saving
        header("Location: index.php");
        exit(); // Make sure to exit after the redirect
    } else {
        echo "<p>No games selected.</p>";
    }
} else {
    echo "<p>User not logged in or session expired.</p>";
}
?>
