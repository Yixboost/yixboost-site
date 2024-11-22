<?php
session_start();

// Map voor geüploade afbeeldingen
$uploadDirectory = "profile-pictures/";

// Controleer of de map voor uploads bestaat
if (!file_exists($uploadDirectory . "upload/")) {
    mkdir($uploadDirectory . "upload/", 0777, true);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check of er een afbeelding is geüpload
    if (isset($_FILES['upload_picture']) && $_FILES['upload_picture']['error'] === UPLOAD_ERR_OK) {
        // Controleer of het een PNG-bestand is
        $file_info = pathinfo($_FILES['upload_picture']['name']);
        if ($file_info['extension'] != 'png') {
            echo "Alleen PNG-bestanden zijn toegestaan.";
            exit();
        }

        // Bepaal de bestandsnaam voor de nieuwe afbeelding
        $new_image_number = count(glob($uploadDirectory . "upload/*.png")) + 1;
        $new_image_name = 'upload/' . $new_image_number . '.png';

        // Verplaats de geüploade afbeelding naar de map voor uploads
        move_uploaded_file($_FILES['upload_picture']['tmp_name'], $uploadDirectory . $new_image_name);

        // Update 'picture' for the current user in JSON
        $file = 'login/hotspot/logins.json';
        $current_data = file_get_contents($file);
        $data = json_decode($current_data, true);

        // Update picture for current user (zonder extensie)
        $data[$_SESSION['username']]['picture'] = 'upload/' . $new_image_number;

        // Save updated data back to JSON file
        file_put_contents($file, json_encode($data));

        // Redirect to profile page or any other page
        header("Location: profile.php");
        exit();
    } else {
        echo "Fout bij het uploaden van de afbeelding.";
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-top: 20px;
    color: #333;
    font-family: Arial;
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
}

.image-container img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border: 2px solid transparent;
    border-radius: 6px;
    transition: border-color 0.3s ease;
}

.image-container label:hover img {
    border-color: #007bff;
}

input[type="file"] {
    display: block;
    margin-top: 20px;
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="image-container">
                <?php foreach ($imageFiles as $imageFile) {
                    $imageName = basename($imageFile);
                    echo "<label><input type=\"radio\" name=\"picture\" value=\"$imageName\"><img src=\"$imageFile\" alt=\"$imageName\"></label>";
                } ?>
            </div>
            <input type="file" name="upload_picture" accept=".png" required>
            <button type="submit">Change Picture</button>
        </form>
    </div>
</body>
</html>
