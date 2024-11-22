<?php
session_start(); // Start de sessie

// Zorg ervoor dat er een ingelogde gebruiker is
if (!isset($_SESSION['username'])) {
    die('No user logged in.');
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Selection - Dark Mode</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }
        .container {
            margin-top: 50px;
        }
        .img-fluid {
            border-radius: 15px;
            transition: transform 0.3s ease, border 0.3s ease;
            cursor: pointer;
            border: 2px solid transparent;
        }
        .img-fluid:hover {
            transform: scale(1.05);
        }
        .img-selected {
            border-color: #ff6f61;
        }
        .btn-primary, .btn-secondary {
            background-color: #ff6f61;
            border: none;
        }
        .btn-primary:hover, .btn-secondary:hover {
            background-color: #ff3d2e;
        }
        .fixed-bottom-buttons {
            position: fixed;
            bottom: 0;
            right: 0;
            padding: 15px;
            background-color: #1e1e1e;
            border-top: 1px solid #2c2c2c;
            z-index: 1000;
        }
        .fixed-bottom-buttons button {
            margin-left: 10px;
        }
        .input-url {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Select a Background Image</h2>

    <!-- Input box for custom URL -->
    <div class="input-url">
        <label for="customUrl">Or enter a custom URL:</label>
        <input type="text" id="customUrl" class="form-control" placeholder="Enter image URL" oninput="selectCustomUrl(this)">
    </div>

    <div class="row">
        <?php
        $directory = 'assets/images/backgrounds/';
        $images = scandir($directory);

        foreach ($images as $image) {
            $imagePath = $directory . $image;
            if (is_file($imagePath)) {
                echo '<div class="col-md-4 mb-3">';
                echo '<img src="' . $imagePath . '" class="img-fluid" alt="Background Image" onclick="selectImage(this)">';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>

<!-- Fixed bottom buttons -->
<div class="fixed-bottom-buttons">
    <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">Cancel</button>
    <button type="button" class="btn btn-primary" onclick="updateBackground()">Done</button>
</div>

<!-- Bootstrap and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    let selectedImage = null;

    // Function to select an image
    function selectImage(imgElement) {
        // Deselect custom URL if it's selected
        document.getElementById('customUrl').value = '';
        if (selectedImage) {
            selectedImage.classList.remove('img-selected');
        }
        imgElement.classList.add('img-selected');
        selectedImage = imgElement;
    }

    // Function to select custom URL
    function selectCustomUrl(inputElement) {
        const customUrl = inputElement.value;
        if (customUrl) {
            // Deselect any image if custom URL is provided
            if (selectedImage) {
                selectedImage.classList.remove('img-selected');
                selectedImage = null;
            }
        }
    }

    // Function for the 'Done' button
    function updateBackground() {
        const customUrl = document.getElementById('customUrl').value;
        
        let backgroundUrl = null;

        // Check if a custom URL is provided or an image is selected
        if (customUrl) {
            backgroundUrl = customUrl;
        } else if (selectedImage) {
            backgroundUrl = selectedImage.src;
        }

        if (backgroundUrl) {
            // AJAX call to update the background URL
            $.ajax({
                type: 'POST',
                url: 'update_background.php',
                data: {
                    username: '<?php echo $username; ?>',
                    background: backgroundUrl
                },
                success: function(response) {
                    alert('Background updated successfully!');
                    window.location.href = 'index.php'; // Or another page to navigate back to
                },
                error: function() {
                    alert('Error updating the background.');
                }
            });
        } else {
            alert('Please select an image or enter a custom URL.');
        }
    }
</script>

</body>
</html>
