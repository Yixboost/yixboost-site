<?php
$timestamp = time();
$date_time = date("Y-m-d H:i:s", $timestamp);

$file_name = 'gebruikslog.txt';

$file = fopen($file_name, 'a');

fwrite($file, $date_time . "\n");

fclose($file);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Onderhoud</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            text-align: center;
            background-image: url('login/bg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        h1 {
            font-size: 2.5rem;
            color: #0064FF;
        }

        p {
            font-size: 1.5rem;
        }

        .container {
            background-color: #ffffff;
            width: 50%;
            padding: 20px;
            border-radius: 20px;
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;
            margin: 0 auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @font-face {
            font-family: 'customfont';
            src: url('txt.ttf') format('truetype');
        }

        .extra p {
            font-size: 16px;
            font-family: customfont;
        }

        button {
            background-color: #0064FF;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            border-radius: 20px;
        }

        button:hover {
            background-color: #004b99;
            color: white;
        }

        .image {
            display: flex;
            justify-content: center;
        }

        img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid black;
        }

        <?php echo $style; ?>
    </style>
</head>

<body>
    <div class="container">
        <div class="image">
            <img id="dog-photo" src="images/loading.gif">
        </div>
        <h1>Site buiten bereik</h1>
        <p>Helaas zijn we bezig met onderhoud, we werken er hard aan om de site weer online te krijgen.</p>
        <div class="extra">
            <p>Wilt u toegang tot de bétaversie van Yixboost Games? Klik <a href="http://yixboost.nl.eu.org/yixboost/games">hier</a> om te bekijken.</p>
        </div>
        <script>
            async function loadDogPhoto() {
                const response = await fetch('https://dog.ceo/api/breeds/image/random');
                const data = await response.json();
                const dogPhoto = document.getElementById('dog-photo');
                dogPhoto.src = data.message;
            }

            setInterval(loadDogPhoto, 3000);
        </script>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1584333903259393"
     crossorigin="anonymous"></script>
</body>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1584333903259393"
     crossorigin="anonymous"></script>
<!-- zijkand -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1584333903259393"
     data-ad-slot="4028329592"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</html>