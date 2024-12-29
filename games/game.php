<?php
if (isset($_GET['id'])) {
    $gameId = $_GET['id'];
    $url = 'update-counter.php';
    $postData = http_build_query(array('id' => $gameId));
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => $postData,
        ),
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        echo "Fout bij het verzenden van het POST-verzoek.";
    } else {

    }
}
?>
<?php
$gameid = $_GET['id'];
$json_file = __DIR__ . '/../data/json/games.json';
$jsonData = file_get_contents($json_file);
$games = json_decode($jsonData, true);

if (array_key_exists($gameid, $games)) {
    $game = $games[$gameid];
    $cat = $game['cat'];
    $name = $game['name'];
    $iframe = "gameframe.php?id=" . $gameid;

    if (isset($game['extra'])) {
        $extra = $game['extra'];
    } else {
        $extra = null;
    }

    $image = "$gameid/$gameid.png";
    if (isset($game['image'])) {
        $image = $game['image'];
    }
} else {
    echo "Game not found";
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="<?php echo $image; ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6948f435f5.js" crossorigin="anonymous"></script>
    <title>
        <?php echo $name; ?> Unblocked | Yixboost Games
    </title>
    <meta property="og:title" content="<?php echo $name; ?> | Yixboost Games">
    <meta property="og:description" content="Play <?php echo $name; ?> for FREE on Yixboost Games! ">
    <meta property="og:image" content="<?php echo $image; ?>">
    <meta property="og:url" content="https://yixboost.com">
    <meta property="og:type" content="website">
    <meta name="description" content="Play <?php echo $name; ?> for FREE on Yixboost Games!">
    <meta name="keywords"
        content="<?php echo $name; ?>, Free Unblocked Games, Games, Gaming, Online Games, Unblocked Games, Free online Games, <?php echo $name; ?> Unblocked, <?php echo $name; ?> Game, <?php echo $name; ?> Online, Free <?php echo $name; ?> Game">
    <meta name="author" content="Yixboost NL">
    <meta name="robots" content="index, follow">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $name; ?> Unblocked">
    <meta name="twitter:description" content="Play <?php echo $name; ?> Free Unblocked on Yixboost Games">
    <meta name="twitter:image" content="<?php echo $image; ?>">

    <!-- Schema.org structured data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "url": "http://yixboost.nl.eu.org",
      "name": "Yixboost Games",
      "description": "Play many Unblocked Games for FREE on Yixboost Games",
      "publisher": {
        "@type": "Organization",
        "name": "Yixboost NL"
      },
      "potentialAction": {
        "@type": "SearchAction",
        "target": "http://yixboost.nl.eu.org/yixboost/search.php?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>
</head>
<style>


    body {
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
        background-color: #000;
    }

    .game-container {
        position: relative;
        width: 100%;
        height: calc(100vh - 0px);
    }

    .game-iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

    .chat {
        margin: 20px;
        position: absolute;
        right: 0;
        bottom: 0;
        top: 0;
    }

    .visible {
        opacity: 1;
        transition: opacity 0.5s ease-in-out;
    }

    img {
        opacity: 0;
    }

</style>
</head>
    <div class="game-container">
        <iframe class="game-iframe" src="<?php echo $iframe; ?>"></iframe>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            var iframe = document.querySelector('.game-iframe');
            iframe.onload = function () {
                console.log('De iframe is geladen');
                iframe.contentWindow.focus();
            };
            iframe.src = '<?php echo $iframe; ?>';
        });

        document.addEventListener('keydown', function (event) {
            var iframe = document.querySelector('.game-iframe');
            var key = event.key.toLowerCase();
            if (key === 'arrowup' || key === 'arrowdown' || key === 'arrowleft' || key === 'arrowright' || key === 'w' || key === 'a' || key === 's' || key === 'd' || key === ' ') {
                iframe.contentWindow.focus();
            }
            iframe.contentWindow.postMessage(event.key, '*');
        });
    </script>
</body>

</html>