<?php
session_start(); // Start de sessie

// Zorg ervoor dat er een ingelogde gebruiker is
$username = $_SESSION['username'] ?? null;

// Pad naar het JSON-bestand
$jsonFilePath = 'login/hotspot/logins.json';

// Laad het JSON-bestand en decodeer het naar een PHP-array
$jsonData = file_get_contents($jsonFilePath);
$users = json_decode($jsonData, true);

// Stel een standaard achtergrond-URL in
$background = 'assets/images/backgrounds/2.png'; // Vervang door je eigen standaard achtergrond-URL

// Controleer of het JSON correct is gedecodeerd en of de gebruiker bestaat
if ($users !== null && $username !== null && isset($users[$username])) {
    $background = $users[$username]['background'] ?? $background;
}
?>
<?php
                    //fix this messy code!!!
session_start();

if(isset($_SESSION['picture'])) {
    unset($_SESSION['picture']);
}

$data = json_decode(@file_get_contents('login/hotspot/logins.json'), true);
if ($data && isset($data[$_SESSION['username']]['picture'])) {
    $_SESSION['picture'] = $data[$_SESSION['username']]['picture'];
}
?>
<?php
$jsonData = file_get_contents('games/games.json');
$games = json_decode($jsonData, true);
?>
<?php
session_start();

function isValidUser($username) {
    $loginsFile = 'login/hotspot/logins.json';
    if (file_exists($loginsFile)) {
        $loginsData = json_decode(file_get_contents($loginsFile), true);
        return isset($loginsData[$username]);
    }
    return false;
}

if (isset($_SESSION['username'])) {
    if (!isValidUser($_SESSION['username'])) {
        session_unset();
        session_destroy();
        exit();
    }
} else {
    // Als de sessie niet bestaat, doe niets
}
?>

<?php
$bestandsnaam = 'visitors/' . date('Y-m') . '.txt';

if (file_exists($bestandsnaam)) {
    $aantalBezoekers = (int) file_get_contents($bestandsnaam);
} else {
    $aantalBezoekers = 0;
}

$aantalBezoekers++;
file_put_contents($bestandsnaam, $aantalBezoekers);
?>
<?php
session_start();

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitize($_POST["username"]);
    $password = sanitize($_POST["password"]);
    $ip = $_SERVER['REMOTE_ADDR'];

    $file = 'login/logins.json';
    $current_data = file_get_contents($file);
    $data = json_decode($current_data, true);

    if (isset($data[$username])) {
        if (!isset($data[$username]['ip'])) {
            $data[$username]['ip'] = $ip;
            file_put_contents($file, json_encode($data));
        }
    } else {
    }
}
?>

<?php

// Voor de notificaties
session_start(); // Zorg ervoor dat de sessie is gestart
$username = $_SESSION['username'];
$notifications = [];

if ($username) {
    $jsonFile = 'assets/PHP/notifications/notifications.json';

    if (file_exists($jsonFile)) {
        $allNotifications = json_decode(file_get_contents($jsonFile), true);
        $updatedNotifications = []; // Array voor bijgewerkte notificaties

        foreach ($allNotifications as &$notification) {
            if ($notification['username'] === $username) {
                // Alleen notificaties met 'shown' == 0 toevoegen
                if ($notification['shown'] == 0) {
                    $notifications[] = $notification;
                    // Zet 'shown' op 1 in de bijgewerkte array
                    $notification['shown'] = 1;
                }
            }
            // Voeg de notificatie toe aan de bijgewerkte array (ook als 'shown' == 1)
            $updatedNotifications[] = $notification;
        }

        // Schrijf de bijgewerkte notificaties terug naar het bestand
        file_put_contents($jsonFile, json_encode($updatedNotifications, JSON_PRETTY_PRINT));
    }
}
?>



<!DOCTYPE html>
<html lang="en">

  <head>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1584333903259393"
     crossorigin="anonymous"></script>
<script async src="https://fundingchoicesmessages.google.com/i/pub-1584333903259393?ers=1" nonce="iLVvKNHWu6gBGQLUrY6veg"></script><script nonce="iLVvKNHWu6gBGQLUrY6veg">(function() {function signalGooglefcPresent() {if (!window.frames['googlefcPresent']) {if (document.body) {const iframe = document.createElement('iframe'); iframe.style = 'width: 0; height: 0; border: none; z-index: -1000; left: -1000px; top: -1000px;'; iframe.style.display = 'none'; iframe.name = 'googlefcPresent'; document.body.appendChild(iframe);} else {setTimeout(signalGooglefcPresent, 0);}}}signalGooglefcPresent();})();</script>
<meta name="google-site-verification" content="ITnJ_gUNdqASmAyaDERjuyCXXFv1w_mMR4Q4Vh3Q2XU" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Yixboost Games | Free Unblocked Games</title>
    <link rel="icon" href="http://yixboost.nl.eu.org/yixboost/images/logo.png" type="image/x-icon">
    <meta property="og:title" content="Yixboost Games | Free Unblocked Games">
    <meta property="og:description" content="Play many Games for FREE on Yixboost Games! ">
    <meta property="og:image" content="http://yixboost.nl.eu.org/yixboost/yixboost-games-banner.png">
    <meta property="og:url" content="http://yixboost.nl.eu.org">
    <meta property="og:type" content="website">
    <meta name="description" content="Play many Games for FREE on Yixboost Games!">
    <meta name="keywords" content="Free Unblocked Games, Games, Gaming, Online Games, Unblocked Games, Free online Games">
    <meta name="author" content="Yixboost NL">
    <meta name="robots" content="index, follow">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Play many Games Free Unblocked on Yixboost Games">
    <meta name="twitter:description" content="Play many Games for Free Unblocked on Yixboost Games">
    <meta name="twitter:image" content="http://yixboost.nl.eu.org/yixboost/images/logo.png">

    <!-- Additional SEO meta tags -->
    <meta name="theme-color" content="#0341fc"> <!-- Browser themakleur -->
    <meta name="apple-mobile-web-app-title" content="Yixboost Games"> <!-- Titel voor iOS apparaten -->
    <meta name="application-name" content="Yixboost Games"> <!-- Titel voor Windows apparaten -->
    <meta name="msapplication-TileColor" content="#0341fc"> <!-- Kleur voor Windows tiles -->
    <meta name="msapplication-TileImage" content="http://yixboost.nl.eu.org/yixboost/images/logo.png"> <!-- Afbeelding voor Windows tiles -->
    <meta name="msapplication-config" content="http://yixboost.nl.eu.org/yixboost/browserconfig.xml"> <!-- Browserconfiguratie voor Windows -->
    <link rel="apple-touch-icon" href="http://yixboost.nl.eu.org/yixboost/images/logo.png"> <!-- iOS app icon -->
    <link rel="manifest" href="manifest.json"> <!-- PWA manifest bestand -->

    <!-- Schema.org structured data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "url": "http://yixboost.nl.eu.org",
      "name": "Yixboost Games | Free Unblocked Games",
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
    <!-- Bootstrap core CSS -->
    <link href="http://yixboost.nl.eu.org/yixboost/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="http://yixboost.nl.eu.org/yixboost/assets/font-awesome-6-pro-main/css/all.css">
    <link rel="stylesheet" href="http://yixboost.nl.eu.org/yixboost/assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="http://yixboost.nl.eu.org/yixboost/assets/css/owl.css">
    <link rel="stylesheet" href="http://yixboost.nl.eu.org/yixboost/assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <script src="https://ads.holid.io/auto/yixboost.nl.eu.org/holid.js" defer="defer"></script>
    <style>
    body {
        background: linear-gradient(0deg,#071A8C,#4CAAC1);
        background-image: url(<?php echo htmlspecialchars($background); ?>);
        background-repeat: no-repeat;
        background-size: cover;    
        background-attachment: fixed;
    }
    </style>
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                        <img src="assets/images/logo.png" alt="Logo">
                    </a>
<div class="search-input">
  <form id="search" action="search.php" onsubmit="return redirectToSearch()">
    <input type="text" placeholder="What are we playing Today?" id="searchText" name="q" />
    <i class="fa fa-search"></i>
  </form>
</div>

<script>
  function redirectToSearch() {
    var searchText = document.getElementById('searchText').value;
    window.location.href = 'search.php?q=' + encodeURIComponent(searchText);
    return false; // Prevent the form from submitting normally
  }
</script>

<?php
if(isset($_GET['searchKeyword'])) {
    $search = $_GET['searchKeyword'];
    header("Location: search.php?q=$search");
    exit();
}
?>

<?php
if(isset($_GET['searchKeyword'])) {
    $searchKeyword = $_GET['searchKeyword'];
    $redirectUrl = "http://yixboost.nl.eu.org/yixboost/search.php?q=" . urlencode($searchKeyword);
    header("Location: $redirectUrl");
    exit();
}
?>

                                                <ul class="nav">
                <li><a href="index.php" class="active"><i class="fa-regular fa-home"></i> Home</a></li>
                <li><a
                    href="http://yixboost.nl.eu.org/yixboost/about.php" ><i class="fa-solid fa-circle-info"></i> About</a></li>
                        <li><a href="https://www.youtube.com/@yixboost" target='_blank'><i class="fa-brands fa-youtube  "></i> Youtube</a></li>
                        <li><a href="https://discord.gg/tFSzDwGwZM" target='_blank'><i class="fa-brands fa-discord"></i> Discord</a></li>
                <li><a href="profile.php"><i class="ti-shift-left"></i> <?php
if (isset($_SESSION['picture'])) {
    echo 'Profile';
} else {
    echo 'Login';
}
?>
 <img src="profile-pictures/<?php
if (isset($_SESSION['picture'])) {
    echo $_SESSION['picture'];
} else {
    echo 'upload/user';
}
?>
.png" alt=""></a></li>
              </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

<!-- ***** Banners Start ***** -->
<div class="main-banner" id="banner1" style="display: block;">
  <div class="row">
    <div class="col-lg-7">
      <div class="header-text">
        <h6 id="banner-text1">Welcome to Yixboost Games</h6>
        <h4 id="banner-text2">Discover More Fun!</h4>
        <div class="main-button">
          <a href="#" target='_blank' id="banner-link">Learn More</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ***** Banners End ***** -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // URL van het banners.json bestand
        const bannersUrl = 'banners.json';

        // Functie om een willekeurige banner te laden
        fetch(bannersUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Kies een willekeurige banner uit de JSON-data
                const randomBanner = data[Math.floor(Math.random() * data.length)];

                // Haal bannergegevens op of gebruik standaardwaarden
                const bannerBg = randomBanner.background || '../yixboost/assets/images/default-banner.jpg';
                const bannerText1 = randomBanner.text1 || 'Welcome to Yixboost Games';
                const bannerText2 = randomBanner.text2 || 'Discover More Fun!';
                const bannerLink = randomBanner.link || '#';
                const bannerLinkText = randomBanner.link_text || 'Learn More';

                // Pas de HTML-elementen aan met de bannergegevens
                document.getElementById('banner1').style.backgroundImage = `url(${bannerBg})`;
                document.getElementById('banner-text1').textContent = bannerText1;
                document.getElementById('banner-text2').textContent = bannerText2;
                document.getElementById('banner-link').href = bannerLink;
                document.getElementById('banner-link').textContent = bannerLinkText;
            })
            .catch(error => {
                console.error('Error loading banners:', error);
            });
    });
</script>

<script>
let isFullscreen = false;

// Function to toggle fullscreen mode
function toggleFullscreen() {
    const banner = document.getElementById('banner1');
    if (isFullscreen) {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) { // Safari
            document.webkitExitFullscreen();
        } else if (document.mozCancelFullScreen) { // Firefox
            document.mozCancelFullScreen();
        } else if (document.msExitFullscreen) { // IE/Edge
            document.msExitFullscreen();
        }
        banner.classList.remove('fullscreen');
    } else {
        if (banner.requestFullscreen) {
            banner.requestFullscreen();
        } else if (banner.webkitRequestFullscreen) { // Safari
            banner.webkitRequestFullscreen();
        } else if (banner.mozRequestFullScreen) { // Firefox
            banner.mozRequestFullScreen();
        } else if (banner.msRequestFullscreen) { // IE/Edge
            banner.msRequestFullscreen();
        }
        banner.classList.add('fullscreen');
    }
    isFullscreen = !isFullscreen;
}

// Add event listener for fullscreen toggle
document.addEventListener('keydown', function(event) {
    if (event.shiftKey && event.key === 'J') {
        toggleFullscreen();
    }
});
</script>
          <!-- ***** All Games Start ***** -->
          <div class="most-popular">
          <div class="container mt-4">
    <div class="tile-container">
        <a href="category.php?id=Emulator" class="tile" target="_blank">
            <div class="tile-content">
                <i class="fa-solid fa-game-console-handheld"></i>
                <span>Emulator</span>
            </div>
        </a>
        <a href="profile.php" class="tile" target="_blank">
            <div class="tile-content">
                <i class="fa-solid fa-user-ninja"></i>
                <span>Profile</span>
            </div>
        </a>
        <a href="background.php" class="tile" target="_blank">
            <div class="tile-content">
                <i class="fa-solid fa-images"></i>
                <span>Background</span>
            </div>
        </a>
        <a href="p/focus-timer" class="tile" target="_blank">
            <div class="tile-content">
                <i class="fa-solid fa-timer"></i>
                <span>Focus Timer</span>
            </div>
        </a>
        <a href="https://www.youtube.com/@yixboost" class="tile" target="_blank">
            <div class="tile-content">
               <i class="fa-brands fa-youtube"></i>
                <span>YouTube</span>
            </div>
        </a>
        <a href="https://discord.gg/tFSzDwGwZM" class="tile" target="_blank">
            <div class="tile-content">
                <i class="fa-brands fa-discord"></i>
                <span>Discord</span>
            </div>
        </a>
        <a href="https://yixboost.github.io/static" class="tile" target="_blank">
            <div class="tile-content">
                <i class="fa-regular fa-chart-network"></i>
                <span>Proxy</span>
            </div>
        </a>
    </div>
</div>
<hr>
<?php
        $jsonData = file_get_contents('games/games.json');
        $games = json_decode($jsonData, true);

        $categories = array_unique(array_column($games, 'cat'));

        if (!empty($categories)) {
            foreach ($categories as $category) {
                $iconClass = '';

                if ($category === 'Platformer') {
                    $iconClass = 'fas fa-gamepad';
                }

                if ($category === 'Running') {
                    $iconClass = 'fa-solid fa-person-running';
                }

                if ($category === 'Car') {
                    $iconClass = 'fa-solid fa-truck-monster';
                }

                if ($category === 'Racing') {
                    $iconClass = 'fa-solid fa-car-bump';
                }

                if ($category === 'Arcade') {
                    $iconClass = 'fa-solid fa-ghost';
                }

                if ($category === 'IO Game') {
                    $iconClass = 'fa-duotone fa-snake';
                }

                if ($category === 'Puzzle') {
                    $iconClass = 'fa-solid fa-puzzle-piece';
                }

                if ($category === 'Building') {
                    $iconClass = 'fa-solid fa-city';
                }

                if ($category === 'Stickman') {
                    $iconClass = 'fa-solid fa-person-running';
                }

                if ($category === 'Kids') {
                    $iconClass = 'fa-duotone fa-child';
                }

                if ($category === 'Battle') {
                    $iconClass = 'fa-solid fa-axe-battle';
                }

                if ($category === 'Sport') {
                    $iconClass = 'fa-solid fa-basketball';
                }

                echo "<a href='#{$category}'><i class='{$iconClass}'></i> {$category}</a> | ";
            }
        } else {
            echo "No categories found.";
        }
        ?>
<br>
          <br>
            <div class="row">

<!-- ***** Popular Games Start ***** -->
<div class="col-12">
  <div class="featured-games header-text">
    <div class="heading-section">
      <h4><i class='fa-solid fa-fire'></i> <em>Popular</em> Games</h4>
    </div>
    <div class="owl-features owl-carousel" id="popular-games">
      <!-- Games will be dynamically injected here -->
    </div>
  </div>
</div>
<!-- ***** Popular Games End ***** -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // URL van het games.json bestand
        const gamesUrl = 'games/games.json';

        // Array met medaille iconen
        const medalIcons = ['fa-solid fa-medal gold', 'fa-solid fa-medal silver', 'fa-solid fa-medal bronze', 'fa-solid fa-medal fourth'];

        // Haal de games op en sorteer op aantal views
        fetch(gamesUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(gamesData => {
                // Verander de games object naar een array en sorteer op aantal views
                const gamesArray = Object.entries(gamesData).sort(([, a], [, b]) => b.views - a.views);

                const isAdmin = sessionStorage.getItem('username') === 'admin';  // Admin check

                // Selecteer de container waarin de games worden weergegeven
                const popularGamesContainer = document.getElementById('popular-games');
                
                let gameCount = 0;

                gamesArray.forEach(([gameId, gameDetails]) => {
                    // Controleer of de game zichtbaar is voor niet-admin gebruikers
                    if (!isAdmin && gameDetails.visible === 0) {
                        return;
                    }

                    if (gameCount >= 4) return;  // Toon alleen de top 4 games

                    const gameUrl = `games/game.php?id=${encodeURIComponent(gameId)}`;
                    const gameImg = gameDetails.image || `games/${encodeURIComponent(gameId)}/${encodeURIComponent(gameId)}.png`;
                    const gameViews = gameDetails.views;

                    const gameItem = `
                        <a href='${gameUrl}'>
                            <div class='item'>
                                <div class='thumb'>
                                    <img src='${gameImg}' alt='Game Image' onerror="this.onerror=null;this.src='assets/images/default-image.png';">
                                    <div class='hover-effect'>
                                        <h6>${gameViews} Views</h6>
                                    </div>
                                </div>
                                <h4>${gameDetails.name}<br><span><i class='${medalIcons[gameCount]}'></i> #${gameCount + 1}</span></h4>
                                <ul>
                                    <li><i class='fa-regular fa-gamepad-modern'></i> ${gameViews}</li>
                                </ul>
                            </div>
                        </a>
                    `;

                    popularGamesContainer.innerHTML += gameItem;
                    gameCount++;
                });

                if (gameCount === 0) {
                    popularGamesContainer.innerHTML = 'No games found.';
                }
            })
            .catch(error => {
                console.error('Error loading games:', error);
                document.getElementById('popular-games').innerHTML = "Failed to load games.";
            });
    });
</script>
              <div class="col-lg-12">
                <div class="heading-section">
                </div>
                <div class="row">
<?php
session_start(); // Zorg ervoor dat de sessie wordt gestart

$jsonData = file_get_contents('games/games.json');
$games = json_decode($jsonData, true);

// Haal de gebruikersnaam uit de sessie om te bepalen of de gebruiker admin is
$isAdmin = isset($_SESSION['username']) && $_SESSION['username'] === 'admin';

// Controleer of er games zijn
if (!empty($games)) {
    // Sorteer games op het aantal views (aflopend) terwijl de originele keys behouden blijven
    uasort($games, function($a, $b) {
        return $b['views'] - $a['views'];
    });

    // Popular Games sectie
    echo "<div id='popular-games' class='section'></div>";
    echo "<h2><i class='fa-solid fa-fire'></i> Popular Games</h2>";
    echo "<hr>";

    // Toon de top 4 games
    $gameCount = 0;
    $medalIcons = ['fa-solid fa-medal gold', 'fa-solid fa-medal silver', 'fa-solid fa-medal bronze', 'fa-solid fa-medal fourth'];

    foreach ($games as $gameId => $gameDetails) {
        // Controleer de zichtbaarheid van de game
        if (isset($gameDetails['visible']) && $gameDetails['visible'] == 0 && !$isAdmin) {
            continue; // Sla deze game over als de gebruiker geen admin is
        }

        if ($gameCount >= 4) {
            break;
        }

        // Bepaal de URL voor de game
        $gameUrl = "games/game.php?id=" . urlencode($gameId);

        // Bepaal de juiste afbeelding
        if (isset($gameDetails['image'])) {
            $gameImg = $gameDetails['image'];
        } else {
            $gameImg = "games/" . urlencode($gameId) . "/" . urlencode($gameId) . ".png";
        }

        // Toon de game met medaille-icoon, afbeelding en totaal aantal views
        echo "
        <div class='col-lg-3 col-sm-6'>
          <a href='{$gameUrl}'>
            <div class='item'>
              <img src='{$gameImg}' alt='Game Image' onerror=\"this.onerror=null;this.src='http://yixboost.nl.eu.org/yixboost/games/default-image.png';\">
              <h4>{$gameDetails['name']}<br><span><i class='{$medalIcons[$gameCount]}'></i> #".($gameCount + 1)."</span></h4>
              <ul>
                <li><i class='fa-regular fa-gamepad-modern'></i> {$gameDetails['views']}</li>
              </ul>
            </div>
          </a>
        </div>
        ";

        $gameCount++;
    }

} else {
    echo "No games found.";
}



echo "<div class='section'></div>";
echo "<h2><i class='fa-solid fa-star'></i>Favorite Games</h2>";
echo "<hr>";

// Toevoegen van de "plus"-knop zonder href, maar met modal trigger
$plusImg = "assets/images/edit-favorite.png";

echo "
<div class='col-lg-3 col-sm-6'>
    <div class='item' data-bs-toggle='modal' data-bs-target='#gameModal'>
        <img src='{$plusImg}' alt='Add Game'>
    </div>
</div>
";





// Controleer of de gebruiker is ingelogd en er recent gespeelde games zijn
if (isset($_SESSION['username'])) {
    $recentPlayedFile = "data/" . $_SESSION['username'] . ".txt";
    if (file_exists($recentPlayedFile)) {
        $recentPlayedData = file_get_contents($recentPlayedFile);
        $recentPlayedGames = explode(', ', $recentPlayedData);

        if (!empty($recentPlayedGames)) {
            foreach ($recentPlayedGames as $gameId) {
                if (isset($games[$gameId])) {
                    $gameDetails = $games[$gameId];
                    $gameUrl = "games/game.php?id=" . urlencode($gameId);

                    if (isset($gameDetails['image'])) {
                        $gameImg = $gameDetails['image'];
                    } else {
                        $gameImg = "games/" . urlencode($gameId) . "/" . urlencode($gameId) . ".png";
                    }

                    echo "
                    <div class='col-lg-3 col-sm-6'>
                        <a href='{$gameUrl}'>
                            <div class='item'>
                                <img src='{$gameImg}' alt='Game Image'>
                            </div>
                        </a>
                    </div>
                    ";
                }
            }
        } else {
            echo " ";
        }
    } else {
        echo " ";
    }
} else {
    echo " ";
}
?>
<div class="container mt-4">
    <div class="banner-suggest-game" id="banner-suggest-game">
        <!-- Close button -->
        <button class="banner-suggest-game-close-btn" onclick="closeBanner()">×</button>
        
        <!-- Image on the left -->
        <img src="https://cdn-icons-png.flaticon.com/512/5930/5930147.png" alt="Banner Image">
        
        <!-- Text and button on the right -->
        <div class="banner-suggest-game-content">
            <h2>Can't find the game you're looking for?</h2>
            <a href='/yixboost/suggest-game' class="btn btn-suggest-game">Suggest Game</a>
        </div>
    </div>
</div>
<p>&nbsp;</p>
<div id="all-games">

</div>
<script>
   document.addEventListener('DOMContentLoaded', function() {
    // Functie om weergaven om te zetten naar K-formaat met 1 decimaal
    function formatViews(views) {
        if (views >= 1000) {
            return (views / 1000).toFixed(1) + 'K';
        } else {
            return views;
        }
    }

    // Haal de JSON data van de games op
    fetch('games/games.json')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            // Object.keys() om de sleutels (id's) van de games te krijgen
            const games = Object.keys(data).map(key => ({ id: key, ...data[key] }));
            const categories = [...new Set(games.map(game => game.cat))];

            // Functie om de sessie te controleren (in dit geval als de gebruiker 'admin' is)
            const isAdmin = sessionStorage.getItem('username') === 'admin';

            if (categories.length > 0) {
                // Verwijzing naar de container met id 'all-games'
                const allGamesContainer = document.getElementById('all-games');

                categories.forEach(category => {
                    // Bepaal het juiste icoon voor de categorie
                    let iconClass = '';
                    switch (category) {
                        case 'Platformer': iconClass = 'fas fa-gamepad'; break;
                        case 'Running':
                        case 'Stickman': iconClass = 'fa-solid fa-person-running'; break;
                        case 'Car': iconClass = 'fa-solid fa-truck-monster'; break;
                        case 'Racing': iconClass = 'fa-solid fa-car-bump'; break;
                        case 'Arcade': iconClass = 'fa-solid fa-ghost'; break;
                        case 'IO Game': iconClass = 'fa-duotone fa-snake'; break;
                        case 'Puzzle': iconClass = 'fa-solid fa-puzzle-piece'; break;
                        case 'Building': iconClass = 'fa-solid fa-city'; break;
                        case 'Kids': iconClass = 'fa-regular fa-heart'; break;
                        case 'Battle': iconClass = 'fa-solid fa-axe-battle'; break;
                        case 'Sport': iconClass = 'fa-solid fa-basketball'; break;
                        case 'Emulator': iconClass = 'fa-regular fa-game-console-handheld'; break;
                    }

                    // Voeg sectie toe aan de 'all-games' container
                    const section = document.createElement('div');
                    section.classList.add('col-12');

                    const moreUrl = `category.php?id=${encodeURIComponent(category)}`;
                    const sectionTitle = `
                        <h2><i class='${iconClass}'></i> ${category} <a href='${moreUrl}' class='see-all-link'>See all →</a></h2>
                        <hr>`;
                    section.innerHTML = sectionTitle;

                    // Voeg games toe binnen deze categorie
                    let gameCount = 0;
                    games.forEach((game) => {
                        if (game.cat === category) {
                            if (game.visible === 0 && !isAdmin) return;  // Sla onzichtbare games over voor niet-admin gebruikers
                            if (gameCount >= 8) return;  // Maximaal 8 games per categorie tonen

                            // Gebruik de sleutel/id in plaats van de naam voor de URL en afbeelding
                            const gameUrl = `games/game.php?id=${encodeURIComponent(game.id)}`;
                            const gameImg = game.image || `http://yixboost.nl.eu.org/yixboost/games/${encodeURIComponent(game.id)}/${encodeURIComponent(game.id)}.png`;
                            const formattedViews = formatViews(game.views);

                            const gameItem = `
                                <div class='col-lg-3 col-sm-6'>
                                    <a href='${gameUrl}'>
                                        <div class='item'>
                                            <img src='${gameImg}' alt='${game.name}'>
                                            <h4>${game.name}<br><span><i class='${iconClass}'></i> ${category}</span></h4>
                                            <ul>
                                                <li><i class='fa-regular fa-gamepad-modern'></i> ${formattedViews}</li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>`;
                            section.innerHTML += gameItem;
                            gameCount++;
                        }
                    });

                    // Voeg sectie toe aan de div met id 'all-games'
                    allGamesContainer.appendChild(section);
                });
            } else {
                document.getElementById('all-games').innerHTML = "No categories found.";
            }
        })
        .catch(error => {
            console.error('Error loading games:', error.message);
            document.getElementById('all-games').innerHTML = "Failed to load games.";
        });
});
</script>
<br>
<p>Created with ⚡ by <a href="https://jonasvanleeuwen19.github.io/" target='_blank'>Jonasvanleeuwen19</a> & <a href="https://valdtaniem.github.io/" target='_blank'>Valdtaniem</a></p>
              </div>
            </div>
          </div>
          <!-- ***** All Games ***** -->



          <!-- ***** Gaming Favorites Start ***** -->
          <div class="gaming-library">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4><em>Your Gaming</em> Favorites</h4>
              </div>
              <div class="item">
                <ul>
                  <li><img src="assets/images/game-01.jpg" alt="" class="templatemo-item"></li>
                  <li><h4>Dota 2</h4><span>Sandbox</span></li>
                  <li><h4>Date Added</h4><span>24/08/2036</span></li>
                  <li><h4>Hours Played</h4><span>634 H 22 Mins</span></li>
                  <li><h4>Currently</h4><span>Downloaded</span></li>
                  <li><div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div></li>
                </ul>
              </div>
              <div class="item">
                <ul>
                  <li><img src="assets/images/game-02.jpg" alt="" class="templatemo-item"></li>
                  <li><h4>Fortnite</h4><span>Sandbox</span></li>
                  <li><h4>Date Added</h4><span>22/06/2036</span></li>
                  <li><h4>Hours Played</h4><span>740 H 52 Mins</span></li>
                  <li><h4>Currently</h4><span>Downloaded</span></li>
                  <li><div class="main-border-button"><a href="#">Donwload</a></div></li>
                </ul>
              </div>
              <div class="item last-item">
                <ul>
                  <li><img src="assets/images/game-03.jpg" alt="" class="templatemo-item"></li>
                  <li><h4>CS-GO</h4><span>Sandbox</span></li>
                  <li><h4>Date Added</h4><span>21/04/2036</span></li>
                  <li><h4>Hours Played</h4><span>892 H 14 Mins</span></li>
                  <li><h4>Currently</h4><span>Downloaded</span></li>
                  <li><div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="main-button">
                <a href="profile.html">View Your Library</a>
              </div>
            </div>
          </div>
          <!-- ***** Gaming Library End ***** -->
        </div>
      </div>
    </div>
  </div>
  <button id="scrollToTopButton">
        <i class="fas fa-arrow-up"></i>
    </button>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © <?php echo date("Y"); ?> Yixboost. All rights reserved. </p>
          <p><a href='http://yixboost.nl.eu.org/yixboost/privacy'>Privacy Policy</a></p>
<p>
  <i class="fa-solid fa-starfighter-twin-ion-engine-advanced" style="margin-right: 10px;"></i>
  <i class="fa-solid fa-starfighter fa-shake" style="margin-right: 10px;"></i>
  <i class="fa-solid fa-starship-freighter"></i>
</p>

        </div>
      </div>
    </div>
  </footer>
<div class="toast-container">
    <?php if ($username && $notifications): ?>
        <?php foreach ($notifications as $notification): ?>
            <div 
                class="toast show bg-<?= $notification['type'] ?>" 
                role="alert" 
                aria-live="assertive" 
                aria-atomic="true" 
                data-bs-autohide="false"
                <?php if (isset($notification['link']) && !empty($notification['link'])): ?>
                    onclick="window.open('<?= htmlspecialchars($notification['link']) ?>', '_blank')"
                    style="cursor: pointer;"
                <?php endif; ?>
            >
                <div class="toast-header">
                    <?php if (isset($notification['icon']) && !empty($notification['icon']) && $notification['icon'] !== 'null'): ?>
                        <img src="<?= htmlspecialchars($notification['icon']) ?>" alt="Notification Icon" style="width: 20px; height: 20px; margin-right: 10px;">
                    <?php endif; ?>
                    <strong class="me-auto"><?= ucfirst($notification['type']) ?></strong>
                    <small><?= $notification['timestamp'] ?></small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body d-flex">
                    <?php if (isset($notification['image']) && !empty($notification['image']) && $notification['image'] !== 'null'): ?>
                        <img src="<?= htmlspecialchars($notification['image']) ?>" alt="Notification Image" style="width: 75px; height: 75px; margin-right: 10px; border-radius: 8px;">
                    <?php endif; ?>
                    <div>
                        <?= htmlspecialchars($notification['message']) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="http://yixboost.nl.eu.org/yixboost/vendor/jquery/jquery.min.js"></script>
  <script src="http://yixboost.nl.eu.org/yixboost/vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="http://yixboost.nl.eu.org/yixboost/assets/js/isotope.min.js"></script>
  <script src="http://yixboost.nl.eu.org/yixboost/assets/js/owl-carousel.js"></script>
  <script src="http://yixboost.nl.eu.org/yixboost/assets/js/tabs.js"></script>
  <script src="http://yixboost.nl.eu.org/yixboost/assets/js/popup.js"></script>
  <script src="http://yixboost.nl.eu.org/yixboost/assets/js/custom.js"></script>
<script>
    window.addEventListener("scroll", function () {
        var scrollToTopButton = document.getElementById("scrollToTopButton");
        if (window.pageYOffset > 100) {
            scrollToTopButton.classList.add("show");
        } else {
            scrollToTopButton.classList.remove("show");
        }
    });

    document.getElementById("scrollToTopButton").addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
</script>

<div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings = {"default_language":"en","native_language_names":true,"detect_browser_language":false,"languages":["en","nl","fr","de","pt","it","es"],"wrapper_selector":".gtranslate_wrapper"}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/lc.js" defer></script>
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
<script>
    function closePopup() {
        var popup = document.getElementById('popup');
        popup.style.display = 'none';
        var today = new Date();
        var expiry = new Date(today.getTime() + 24 * 60 * 60 * 1000);
        document.cookie = "popupDisplayed=true; expires=" + expiry.toUTCString() + "; path=/";
    }

    function checkPopupDisplayed() {
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i].trim();
            if (cookie.startsWith('popupDisplayed=')) {
                return true;
            }
        }
        return false;
    }

    window.onload = function() {
        if (!checkPopupDisplayed()) {
            var popup = document.getElementById('popup');
            popup.style.display = 'block';
        }
    };
</script>
    <script src="https://ads.holid.io/auto/yixboost.nl.eu.org/holid.js" defer="defer"></script>
<script>(function(){'use strict';function aa(a){var b=0;return function(){return b<a.length?{done:!1,value:a[b++]}:{done:!0}}}var ba="function"==typeof Object.defineProperties?Object.defineProperty:function(a,b,c){if(a==Array.prototype||a==Object.prototype)return a;a[b]=c.value;return a};
function ca(a){a=["object"==typeof globalThis&&globalThis,a,"object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global];for(var b=0;b<a.length;++b){var c=a[b];if(c&&c.Math==Math)return c}throw Error("Cannot find global object");}var da=ca(this);function k(a,b){if(b)a:{var c=da;a=a.split(".");for(var d=0;d<a.length-1;d++){var e=a[d];if(!(e in c))break a;c=c[e]}a=a[a.length-1];d=c[a];b=b(d);b!=d&&null!=b&&ba(c,a,{configurable:!0,writable:!0,value:b})}}
function ea(a){return a.raw=a}function m(a){var b="undefined"!=typeof Symbol&&Symbol.iterator&&a[Symbol.iterator];if(b)return b.call(a);if("number"==typeof a.length)return{next:aa(a)};throw Error(String(a)+" is not an iterable or ArrayLike");}function fa(a){for(var b,c=[];!(b=a.next()).done;)c.push(b.value);return c}var ha="function"==typeof Object.create?Object.create:function(a){function b(){}b.prototype=a;return new b},n;
if("function"==typeof Object.setPrototypeOf)n=Object.setPrototypeOf;else{var q;a:{var ia={a:!0},ja={};try{ja.__proto__=ia;q=ja.a;break a}catch(a){}q=!1}n=q?function(a,b){a.__proto__=b;if(a.__proto__!==b)throw new TypeError(a+" is not extensible");return a}:null}var ka=n;
function r(a,b){a.prototype=ha(b.prototype);a.prototype.constructor=a;if(ka)ka(a,b);else for(var c in b)if("prototype"!=c)if(Object.defineProperties){var d=Object.getOwnPropertyDescriptor(b,c);d&&Object.defineProperty(a,c,d)}else a[c]=b[c];a.A=b.prototype}function la(){for(var a=Number(this),b=[],c=a;c<arguments.length;c++)b[c-a]=arguments[c];return b}k("Number.MAX_SAFE_INTEGER",function(){return 9007199254740991});
k("Number.isFinite",function(a){return a?a:function(b){return"number"!==typeof b?!1:!isNaN(b)&&Infinity!==b&&-Infinity!==b}});k("Number.isInteger",function(a){return a?a:function(b){return Number.isFinite(b)?b===Math.floor(b):!1}});k("Number.isSafeInteger",function(a){return a?a:function(b){return Number.isInteger(b)&&Math.abs(b)<=Number.MAX_SAFE_INTEGER}});
k("Math.trunc",function(a){return a?a:function(b){b=Number(b);if(isNaN(b)||Infinity===b||-Infinity===b||0===b)return b;var c=Math.floor(Math.abs(b));return 0>b?-c:c}});k("Object.is",function(a){return a?a:function(b,c){return b===c?0!==b||1/b===1/c:b!==b&&c!==c}});k("Array.prototype.includes",function(a){return a?a:function(b,c){var d=this;d instanceof String&&(d=String(d));var e=d.length;c=c||0;for(0>c&&(c=Math.max(c+e,0));c<e;c++){var f=d[c];if(f===b||Object.is(f,b))return!0}return!1}});
k("String.prototype.includes",function(a){return a?a:function(b,c){if(null==this)throw new TypeError("The 'this' value for String.prototype.includes must not be null or undefined");if(b instanceof RegExp)throw new TypeError("First argument to String.prototype.includes must not be a regular expression");return-1!==this.indexOf(b,c||0)}});/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
var t=this||self;function v(a){return a};var w,x;a:{for(var ma=["CLOSURE_FLAGS"],y=t,z=0;z<ma.length;z++)if(y=y[ma[z]],null==y){x=null;break a}x=y}var na=x&&x[610401301];w=null!=na?na:!1;var A,oa=t.navigator;A=oa?oa.userAgentData||null:null;function B(a){return w?A?A.brands.some(function(b){return(b=b.brand)&&-1!=b.indexOf(a)}):!1:!1}function C(a){var b;a:{if(b=t.navigator)if(b=b.userAgent)break a;b=""}return-1!=b.indexOf(a)};function D(){return w?!!A&&0<A.brands.length:!1}function E(){return D()?B("Chromium"):(C("Chrome")||C("CriOS"))&&!(D()?0:C("Edge"))||C("Silk")};var pa=D()?!1:C("Trident")||C("MSIE");!C("Android")||E();E();C("Safari")&&(E()||(D()?0:C("Coast"))||(D()?0:C("Opera"))||(D()?0:C("Edge"))||(D()?B("Microsoft Edge"):C("Edg/"))||D()&&B("Opera"));var qa={},F=null;var ra="undefined"!==typeof Uint8Array,sa=!pa&&"function"===typeof btoa;function G(){return"function"===typeof BigInt};var H=0,I=0;function ta(a){var b=0>a;a=Math.abs(a);var c=a>>>0;a=Math.floor((a-c)/4294967296);b&&(c=m(ua(c,a)),b=c.next().value,a=c.next().value,c=b);H=c>>>0;I=a>>>0}function va(a,b){b>>>=0;a>>>=0;if(2097151>=b)var c=""+(4294967296*b+a);else G()?c=""+(BigInt(b)<<BigInt(32)|BigInt(a)):(c=(a>>>24|b<<8)&16777215,b=b>>16&65535,a=(a&16777215)+6777216*c+6710656*b,c+=8147497*b,b*=2,1E7<=a&&(c+=Math.floor(a/1E7),a%=1E7),1E7<=c&&(b+=Math.floor(c/1E7),c%=1E7),c=b+wa(c)+wa(a));return c}
function wa(a){a=String(a);return"0000000".slice(a.length)+a}function ua(a,b){b=~b;a?a=~a+1:b+=1;return[a,b]};var J;J="function"===typeof Symbol&&"symbol"===typeof Symbol()?Symbol():void 0;var xa=J?function(a,b){a[J]|=b}:function(a,b){void 0!==a.g?a.g|=b:Object.defineProperties(a,{g:{value:b,configurable:!0,writable:!0,enumerable:!1}})},K=J?function(a){return a[J]|0}:function(a){return a.g|0},L=J?function(a){return a[J]}:function(a){return a.g},M=J?function(a,b){a[J]=b;return a}:function(a,b){void 0!==a.g?a.g=b:Object.defineProperties(a,{g:{value:b,configurable:!0,writable:!0,enumerable:!1}});return a};function ya(a,b){M(b,(a|0)&-14591)}function za(a,b){M(b,(a|34)&-14557)}
function Aa(a){a=a>>14&1023;return 0===a?536870912:a};var N={},Ba={};function Ca(a){return!(!a||"object"!==typeof a||a.g!==Ba)}function Da(a){return null!==a&&"object"===typeof a&&!Array.isArray(a)&&a.constructor===Object}function P(a,b,c){if(!Array.isArray(a)||a.length)return!1;var d=K(a);if(d&1)return!0;if(!(b&&(Array.isArray(b)?b.includes(c):b.has(c))))return!1;M(a,d|1);return!0}Object.freeze(new function(){});Object.freeze(new function(){});var Ea=/^-?([1-9][0-9]*|0)(\.[0-9]+)?$/;var Q;function Fa(a,b){Q=b;a=new a(b);Q=void 0;return a}
function R(a,b,c){null==a&&(a=Q);Q=void 0;if(null==a){var d=96;c?(a=[c],d|=512):a=[];b&&(d=d&-16760833|(b&1023)<<14)}else{if(!Array.isArray(a))throw Error();d=K(a);if(d&64)return a;d|=64;if(c&&(d|=512,c!==a[0]))throw Error();a:{c=a;var e=c.length;if(e){var f=e-1;if(Da(c[f])){d|=256;b=f-(+!!(d&512)-1);if(1024<=b)throw Error();d=d&-16760833|(b&1023)<<14;break a}}if(b){b=Math.max(b,e-(+!!(d&512)-1));if(1024<b)throw Error();d=d&-16760833|(b&1023)<<14}}}M(a,d);return a};function Ga(a){switch(typeof a){case "number":return isFinite(a)?a:String(a);case "boolean":return a?1:0;case "object":if(a)if(Array.isArray(a)){if(P(a,void 0,0))return}else if(ra&&null!=a&&a instanceof Uint8Array){if(sa){for(var b="",c=0,d=a.length-10240;c<d;)b+=String.fromCharCode.apply(null,a.subarray(c,c+=10240));b+=String.fromCharCode.apply(null,c?a.subarray(c):a);a=btoa(b)}else{void 0===b&&(b=0);if(!F){F={};c="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789".split("");d=["+/=",
"+/","-_=","-_.","-_"];for(var e=0;5>e;e++){var f=c.concat(d[e].split(""));qa[e]=f;for(var g=0;g<f.length;g++){var h=f[g];void 0===F[h]&&(F[h]=g)}}}b=qa[b];c=Array(Math.floor(a.length/3));d=b[64]||"";for(e=f=0;f<a.length-2;f+=3){var l=a[f],p=a[f+1];h=a[f+2];g=b[l>>2];l=b[(l&3)<<4|p>>4];p=b[(p&15)<<2|h>>6];h=b[h&63];c[e++]=g+l+p+h}g=0;h=d;switch(a.length-f){case 2:g=a[f+1],h=b[(g&15)<<2]||d;case 1:a=a[f],c[e]=b[a>>2]+b[(a&3)<<4|g>>4]+h+d}a=c.join("")}return a}}return a};function Ha(a,b,c){a=Array.prototype.slice.call(a);var d=a.length,e=b&256?a[d-1]:void 0;d+=e?-1:0;for(b=b&512?1:0;b<d;b++)a[b]=c(a[b]);if(e){b=a[b]={};for(var f in e)Object.prototype.hasOwnProperty.call(e,f)&&(b[f]=c(e[f]))}return a}function Ia(a,b,c,d,e){if(null!=a){if(Array.isArray(a))a=P(a,void 0,0)?void 0:e&&K(a)&2?a:Ja(a,b,c,void 0!==d,e);else if(Da(a)){var f={},g;for(g in a)Object.prototype.hasOwnProperty.call(a,g)&&(f[g]=Ia(a[g],b,c,d,e));a=f}else a=b(a,d);return a}}
function Ja(a,b,c,d,e){var f=d||c?K(a):0;d=d?!!(f&32):void 0;a=Array.prototype.slice.call(a);for(var g=0;g<a.length;g++)a[g]=Ia(a[g],b,c,d,e);c&&c(f,a);return a}function Ka(a){return a.s===N?a.toJSON():Ga(a)};function La(a,b,c){c=void 0===c?za:c;if(null!=a){if(ra&&a instanceof Uint8Array)return b?a:new Uint8Array(a);if(Array.isArray(a)){var d=K(a);if(d&2)return a;b&&(b=0===d||!!(d&32)&&!(d&64||!(d&16)));return b?M(a,(d|34)&-12293):Ja(a,La,d&4?za:c,!0,!0)}a.s===N&&(c=a.h,d=L(c),a=d&2?a:Fa(a.constructor,Ma(c,d,!0)));return a}}function Ma(a,b,c){var d=c||b&2?za:ya,e=!!(b&32);a=Ha(a,b,function(f){return La(f,e,d)});xa(a,32|(c?2:0));return a};function Na(a,b){a=a.h;return Oa(a,L(a),b)}function Oa(a,b,c,d){if(-1===c)return null;if(c>=Aa(b)){if(b&256)return a[a.length-1][c]}else{var e=a.length;if(d&&b&256&&(d=a[e-1][c],null!=d))return d;b=c+(+!!(b&512)-1);if(b<e)return a[b]}}function Pa(a,b,c,d,e){var f=Aa(b);if(c>=f||e){var g=b;if(b&256)e=a[a.length-1];else{if(null==d)return;e=a[f+(+!!(b&512)-1)]={};g|=256}e[c]=d;c<f&&(a[c+(+!!(b&512)-1)]=void 0);g!==b&&M(a,g)}else a[c+(+!!(b&512)-1)]=d,b&256&&(a=a[a.length-1],c in a&&delete a[c])}
function Qa(a,b){var c=Ra;var d=void 0===d?!1:d;var e=a.h;var f=L(e),g=Oa(e,f,b,d);if(null!=g&&"object"===typeof g&&g.s===N)c=g;else if(Array.isArray(g)){var h=K(g),l=h;0===l&&(l|=f&32);l|=f&2;l!==h&&M(g,l);c=new c(g)}else c=void 0;c!==g&&null!=c&&Pa(e,f,b,c,d);e=c;if(null==e)return e;a=a.h;f=L(a);f&2||(g=e,c=g.h,h=L(c),g=h&2?Fa(g.constructor,Ma(c,h,!1)):g,g!==e&&(e=g,Pa(a,f,b,e,d)));return e}function Sa(a,b){a=Na(a,b);return null==a||"string"===typeof a?a:void 0}
function Ta(a,b){var c=void 0===c?0:c;a=Na(a,b);if(null!=a)if(b=typeof a,"number"===b?Number.isFinite(a):"string"!==b?0:Ea.test(a))if("number"===typeof a){if(a=Math.trunc(a),!Number.isSafeInteger(a)){ta(a);b=H;var d=I;if(a=d&2147483648)b=~b+1>>>0,d=~d>>>0,0==b&&(d=d+1>>>0);b=4294967296*d+(b>>>0);a=a?-b:b}}else if(b=Math.trunc(Number(a)),Number.isSafeInteger(b))a=String(b);else{if(b=a.indexOf("."),-1!==b&&(a=a.substring(0,b)),!("-"===a[0]?20>a.length||20===a.length&&-922337<Number(a.substring(0,7)):
19>a.length||19===a.length&&922337>Number(a.substring(0,6)))){if(16>a.length)ta(Number(a));else if(G())a=BigInt(a),H=Number(a&BigInt(4294967295))>>>0,I=Number(a>>BigInt(32)&BigInt(4294967295));else{b=+("-"===a[0]);I=H=0;d=a.length;for(var e=b,f=(d-b)%6+b;f<=d;e=f,f+=6)e=Number(a.slice(e,f)),I*=1E6,H=1E6*H+e,4294967296<=H&&(I+=Math.trunc(H/4294967296),I>>>=0,H>>>=0);b&&(b=m(ua(H,I)),a=b.next().value,b=b.next().value,H=a,I=b)}a=H;b=I;b&2147483648?G()?a=""+(BigInt(b|0)<<BigInt(32)|BigInt(a>>>0)):(b=
m(ua(a,b)),a=b.next().value,b=b.next().value,a="-"+va(a,b)):a=va(a,b)}}else a=void 0;return null!=a?a:c}function S(a,b){a=Sa(a,b);return null!=a?a:""};function T(a,b,c){this.h=R(a,b,c)}T.prototype.toJSON=function(){return Ua(this,Ja(this.h,Ka,void 0,void 0,!1),!0)};T.prototype.s=N;T.prototype.toString=function(){return Ua(this,this.h,!1).toString()};
function Ua(a,b,c){var d=a.constructor.v,e=L(c?a.h:b);a=b.length;if(!a)return b;var f;if(Da(c=b[a-1])){a:{var g=c;var h={},l=!1,p;for(p in g)if(Object.prototype.hasOwnProperty.call(g,p)){var u=g[p];if(Array.isArray(u)){var jb=u;if(P(u,d,+p)||Ca(u)&&0===u.size)u=null;u!=jb&&(l=!0)}null!=u?h[p]=u:l=!0}if(l){for(var O in h){g=h;break a}g=null}}g!=c&&(f=!0);a--}for(p=+!!(e&512)-1;0<a;a--){O=a-1;c=b[O];O-=p;if(!(null==c||P(c,d,O)||Ca(c)&&0===c.size))break;var kb=!0}if(!f&&!kb)return b;b=Array.prototype.slice.call(b,
0,a);g&&b.push(g);return b};function Va(a){return function(b){if(null==b||""==b)b=new a;else{b=JSON.parse(b);if(!Array.isArray(b))throw Error(void 0);xa(b,32);b=Fa(a,b)}return b}};function Wa(a){this.h=R(a)}r(Wa,T);var Xa=Va(Wa);var U;function V(a){this.g=a}V.prototype.toString=function(){return this.g+""};var Ya={};function Za(a){if(void 0===U){var b=null;var c=t.trustedTypes;if(c&&c.createPolicy){try{b=c.createPolicy("goog#html",{createHTML:v,createScript:v,createScriptURL:v})}catch(d){t.console&&t.console.error(d.message)}U=b}else U=b}a=(b=U)?b.createScriptURL(a):a;return new V(a,Ya)};function $a(){return Math.floor(2147483648*Math.random()).toString(36)+Math.abs(Math.floor(2147483648*Math.random())^Date.now()).toString(36)};function ab(a,b){b=String(b);"application/xhtml+xml"===a.contentType&&(b=b.toLowerCase());return a.createElement(b)}function bb(a){this.g=a||t.document||document};/*

 SPDX-License-Identifier: Apache-2.0
*/
function cb(a,b){a.src=b instanceof V&&b.constructor===V?b.g:"type_error:TrustedResourceUrl";var c,d;(c=(b=null==(d=(c=(a.ownerDocument&&a.ownerDocument.defaultView||window).document).querySelector)?void 0:d.call(c,"script[nonce]"))?b.nonce||b.getAttribute("nonce")||"":"")&&a.setAttribute("nonce",c)};function db(a){a=void 0===a?document:a;return a.createElement("script")};function eb(a,b,c,d,e,f){try{var g=a.g,h=db(g);h.async=!0;cb(h,b);g.head.appendChild(h);h.addEventListener("load",function(){e();d&&g.head.removeChild(h)});h.addEventListener("error",function(){0<c?eb(a,b,c-1,d,e,f):(d&&g.head.removeChild(h),f())})}catch(l){f()}};var fb=t.atob("aHR0cHM6Ly93d3cuZ3N0YXRpYy5jb20vaW1hZ2VzL2ljb25zL21hdGVyaWFsL3N5c3RlbS8xeC93YXJuaW5nX2FtYmVyXzI0ZHAucG5n"),gb=t.atob("WW91IGFyZSBzZWVpbmcgdGhpcyBtZXNzYWdlIGJlY2F1c2UgYWQgb3Igc2NyaXB0IGJsb2NraW5nIHNvZnR3YXJlIGlzIGludGVyZmVyaW5nIHdpdGggdGhpcyBwYWdlLg=="),hb=t.atob("RGlzYWJsZSBhbnkgYWQgb3Igc2NyaXB0IGJsb2NraW5nIHNvZnR3YXJlLCB0aGVuIHJlbG9hZCB0aGlzIHBhZ2Uu");function ib(a,b,c){this.i=a;this.u=b;this.o=c;this.g=null;this.j=[];this.m=!1;this.l=new bb(this.i)}
function lb(a){if(a.i.body&&!a.m){var b=function(){mb(a);t.setTimeout(function(){nb(a,3)},50)};eb(a.l,a.u,2,!0,function(){t[a.o]||b()},b);a.m=!0}}
function mb(a){for(var b=W(1,5),c=0;c<b;c++){var d=X(a);a.i.body.appendChild(d);a.j.push(d)}b=X(a);b.style.bottom="0";b.style.left="0";b.style.position="fixed";b.style.width=W(100,110).toString()+"%";b.style.zIndex=W(2147483544,2147483644).toString();b.style.backgroundColor=ob(249,259,242,252,219,229);b.style.boxShadow="0 0 12px #888";b.style.color=ob(0,10,0,10,0,10);b.style.display="flex";b.style.justifyContent="center";b.style.fontFamily="Roboto, Arial";c=X(a);c.style.width=W(80,85).toString()+
"%";c.style.maxWidth=W(750,775).toString()+"px";c.style.margin="24px";c.style.display="flex";c.style.alignItems="flex-start";c.style.justifyContent="center";d=ab(a.l.g,"IMG");d.className=$a();d.src=fb;d.alt="Warning icon";d.style.height="24px";d.style.width="24px";d.style.paddingRight="16px";var e=X(a),f=X(a);f.style.fontWeight="bold";f.textContent=gb;var g=X(a);g.textContent=hb;Y(a,e,f);Y(a,e,g);Y(a,c,d);Y(a,c,e);Y(a,b,c);a.g=b;a.i.body.appendChild(a.g);b=W(1,5);for(c=0;c<b;c++)d=X(a),a.i.body.appendChild(d),
a.j.push(d)}function Y(a,b,c){for(var d=W(1,5),e=0;e<d;e++){var f=X(a);b.appendChild(f)}b.appendChild(c);c=W(1,5);for(d=0;d<c;d++)e=X(a),b.appendChild(e)}function W(a,b){return Math.floor(a+Math.random()*(b-a))}function ob(a,b,c,d,e,f){return"rgb("+W(Math.max(a,0),Math.min(b,255)).toString()+","+W(Math.max(c,0),Math.min(d,255)).toString()+","+W(Math.max(e,0),Math.min(f,255)).toString()+")"}function X(a){a=ab(a.l.g,"DIV");a.className=$a();return a}
function nb(a,b){0>=b||null!=a.g&&0!==a.g.offsetHeight&&0!==a.g.offsetWidth||(pb(a),mb(a),t.setTimeout(function(){nb(a,b-1)},50))}function pb(a){for(var b=m(a.j),c=b.next();!c.done;c=b.next())(c=c.value)&&c.parentNode&&c.parentNode.removeChild(c);a.j=[];(b=a.g)&&b.parentNode&&b.parentNode.removeChild(b);a.g=null};function qb(a,b,c,d,e){function f(l){document.body?g(document.body):0<l?t.setTimeout(function(){f(l-1)},e):b()}function g(l){l.appendChild(h);t.setTimeout(function(){h?(0!==h.offsetHeight&&0!==h.offsetWidth?b():a(),h.parentNode&&h.parentNode.removeChild(h)):a()},d)}var h=rb(c);f(3)}function rb(a){var b=document.createElement("div");b.className=a;b.style.width="1px";b.style.height="1px";b.style.position="absolute";b.style.left="-10000px";b.style.top="-10000px";b.style.zIndex="-10000";return b};function Ra(a){this.h=R(a)}r(Ra,T);function sb(a){this.h=R(a)}r(sb,T);var tb=Va(sb);function ub(a){var b=la.apply(1,arguments);if(0===b.length)return Za(a[0]);for(var c=a[0],d=0;d<b.length;d++)c+=encodeURIComponent(b[d])+a[d+1];return Za(c)};function vb(a){if(!a)return null;a=Sa(a,4);var b;null===a||void 0===a?b=null:b=Za(a);return b};var wb=ea([""]),xb=ea([""]);function yb(a,b){this.m=a;this.o=new bb(a.document);this.g=b;this.j=S(this.g,1);this.u=vb(Qa(this.g,2))||ub(wb);this.i=!1;b=vb(Qa(this.g,13))||ub(xb);this.l=new ib(a.document,b,S(this.g,12))}yb.prototype.start=function(){zb(this)};
function zb(a){Ab(a);eb(a.o,a.u,3,!1,function(){a:{var b=a.j;var c=t.btoa(b);if(c=t[c]){try{var d=Xa(t.atob(c))}catch(e){b=!1;break a}b=b===Sa(d,1)}else b=!1}b?Z(a,S(a.g,14)):(Z(a,S(a.g,8)),lb(a.l))},function(){qb(function(){Z(a,S(a.g,7));lb(a.l)},function(){return Z(a,S(a.g,6))},S(a.g,9),Ta(a.g,10),Ta(a.g,11))})}function Z(a,b){a.i||(a.i=!0,a=new a.m.XMLHttpRequest,a.open("GET",b,!0),a.send())}function Ab(a){var b=t.btoa(a.j);a.m[b]&&Z(a,S(a.g,5))};(function(a,b){t[a]=function(){var c=la.apply(0,arguments);t[a]=function(){};b.call.apply(b,[null].concat(c instanceof Array?c:fa(m(c))))}})("__h82AlnkH6D91__",function(a){"function"===typeof window.atob&&(new yb(window,tb(window.atob(a)))).start()});}).call(this);

window.__h82AlnkH6D91__("WyJwdWItMTU4NDMzMzkwMzI1OTM5MyIsW251bGwsbnVsbCxudWxsLCJodHRwczovL2Z1bmRpbmdjaG9pY2VzbWVzc2FnZXMuZ29vZ2xlLmNvbS9iL3B1Yi0xNTg0MzMzOTAzMjU5MzkzIl0sbnVsbCxudWxsLCJodHRwczovL2Z1bmRpbmdjaG9pY2VzbWVzc2FnZXMuZ29vZ2xlLmNvbS9lbC9BR1NLV3hWcC1HcWVHU0xBWWw4QWV1NXh0TzVFNVpSWS1lckRSVjBVZmJDMkVLelZIMmQyUEg5ekhodm5lWVpObHBUOHVKYlhhM3RhTlh5RkpIN0xqYU4zZ09NYUFBXHUwMDNkXHUwMDNkP3RlXHUwMDNkVE9LRU5fRVhQT1NFRCIsImh0dHBzOi8vZnVuZGluZ2Nob2ljZXNtZXNzYWdlcy5nb29nbGUuY29tL2VsL0FHU0tXeFVCWjRFbkhrZzJpVGNvLUlmUWRrTWhQVDgwQktvVjZmWS1Dam1fS1NRdVJoZXJZVzNuR01YMzlaZzNIMzlpZExpeGxHY3M5dlRSYXkwdS1MRHpUTjBrNGdcdTAwM2RcdTAwM2Q/YWJcdTAwM2QxXHUwMDI2c2JmXHUwMDNkMSIsImh0dHBzOi8vZnVuZGluZ2Nob2ljZXNtZXNzYWdlcy5nb29nbGUuY29tL2VsL0FHU0tXeFhqdFFjVkliMV9WRzBxSWpzd0FPek5BRURqU0NLc0liS0dITkFmRVlVRHhFdUFaOHVyM1cxdUI3MWxnbHY5RGhzZXFOQXRVS3A1LWNEdllGZG1QanI1MlFcdTAwM2RcdTAwM2Q/YWJcdTAwM2QyXHUwMDI2c2JmXHUwMDNkMSIsImh0dHBzOi8vZnVuZGluZ2Nob2ljZXNtZXNzYWdlcy5nb29nbGUuY29tL2VsL0FHU0tXeFZ5TmNSejh4T0ltdnhnRUs5cUVCbnpkaUtBalgtWnFqM3lpSDFWVmo4RlZhY25DblJ0ZElEUXpuZDVYdldqdVQxeUQyd1lObjBEUXRNTGV4eEpHR2VTeEFcdTAwM2RcdTAwM2Q/c2JmXHUwMDNkMiIsImRpdi1ncHQtYWQiLDIwLDEwMCwiY0hWaUxURTFPRFF6TXpNNU1ETXlOVGt6T1RNXHUwMDNkIixbbnVsbCxudWxsLG51bGwsImh0dHBzOi8vd3d3LmdzdGF0aWMuY29tLzBlbW4vZi9wL3B1Yi0xNTg0MzMzOTAzMjU5MzkzLmpzP3VzcXBcdTAwM2RDQkUiXSwiaHR0cHM6Ly9mdW5kaW5nY2hvaWNlc21lc3NhZ2VzLmdvb2dsZS5jb20vZWwvQUdTS1d4VjhmTlhqb21Zc0RlZlJMRzNLdkdxVjc5UW5TZWt5WXdHZ1JBUnhvTnRfQy0tUlBKNHA0Zk5wZTk0LUdWeDYwd2VSN205bFNoVDJwLUE2WWNQb1hUV3EyUVx1MDAzZFx1MDAzZCJd");</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1584333903259393"
     crossorigin="anonymous"></script>
<script>
  // Check if the browser supports notifications
  if (!("Notification" in window)) {
    console.log("This browser does not support notifications.");
  } else {
    Notification.requestPermission().then((permission) => {
      // Handle the permission result
      if (permission === "granted") {
        console.log("Notification permission granted");
        // Maak een nieuwe melding
        const notification = new Notification("Welkom op onze site!", {
          body: "Dit is een melding van onze site.",
          icon: "https://example.com/icon.png"
        });
      } else {
        console.log("Notification permission denied");
      }
    });
  }
</script>
<script>
if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('/service-worker.js')
      .then((registration) => {
        console.log('ServiceWorker registration successful with scope: ', registration.scope);
      }, (error) => {
        console.log('ServiceWorker registration failed: ', error);
      });
  });
}
</script>
<script>
let deferredPrompt;

window.addEventListener('beforeinstallprompt', (e) => {
  e.preventDefault();
  deferredPrompt = e;
  document.getElementById('installButton').style.display = 'block';
});

document.getElementById('installButton').addEventListener('click', (e) => {
  document.getElementById('installButton').style.display = 'none';
  deferredPrompt.prompt();
  deferredPrompt.userChoice.then((choiceResult) => {
    if (choiceResult.outcome === 'accepted') {
      console.log('User accepted the A2HS prompt');
    } else {
      console.log('User dismissed the A2HS prompt');
    }
    deferredPrompt = null;
  });
});
</script>
<!-- Modal -->
<div class="modal fade" id="gameModal" tabindex="-1" aria-labelledby="gameModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header sticky-header">
                <!-- Header is now transparent and has rounded corners -->
            </div>
            <div class="modal-body">
                <form id="gameForm" action="process_games.php" method="POST">
                    <?php
session_start(); // Start the session

// Check if the username exists in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $data_directory = 'data';
    $user_file = $data_directory . '/' . $username . '.txt';

    // Load the user's selected games from the file if it exists
    $user_selected_games = [];
    if (file_exists($user_file)) {
        $user_selected_games = explode(', ', file_get_contents($user_file));
    }

    // Fetch the JSON data
    $json_url = "http://yixboost.nl.eu.org/yixboost/games/games.json";
    $json_data = file_get_contents($json_url);
    $games = json_decode($json_data, true);

    // Sort the games by name
    uasort($games, function ($a, $b) {
        return strcmp($a['name'], $b['name']);
    });

    // Group games by their first letter
    $grouped_games = [];
    foreach ($games as $gameid => $game) {
        $first_letter = strtoupper($game['name'][0]);
        $grouped_games[$first_letter][$gameid] = $game;
    }

    // Generate the sticky header with the letters and selection counter
    echo '<div class="sticky-header">';
    echo '<div class="selection-counter">Selected: <span id="selected-count">' . count($user_selected_games) . '</span>/' . count($games) . '</div>';
    echo '<div>';
    $letters = array_keys($grouped_games);
    sort($letters);
    foreach ($letters as $letter) {
        echo '<a href="#letter-' . $letter . '">' . $letter . '</a>';
    }
    echo '</div>';
    echo '</div>';

    // Display the sorted and grouped list
    foreach ($grouped_games as $letter => $games_in_group) {
        echo '<div id="letter-' . $letter . '" class="letter-section">';
        echo '<div class="letter-heading">' . $letter . '</div>';
        echo '<div class="game-list">';
        echo '<ul class="list-group">';

        foreach ($games_in_group as $gameid => $game) {
            $is_checked = in_array($gameid, $user_selected_games) ? 'checked' : ''; // Check if the game is already selected

            echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
            echo '<div class="form-check">';
            echo '<input class="form-check-input game-checkbox" type="checkbox" name="selected_games[]" value="' . $gameid . '" id="game-' . $gameid . '" ' . $is_checked . '>';
            echo '<label class="form-check-label" for="game-' . $gameid . '">' . $game['name'] . '</label>';
            echo '</div>';

            // Check if the 'image' key exists, otherwise create the fallback URL
            $image_url = isset($game['image']) ? $game['image'] : "http://yixboost.nl.eu.org/yixboost/games/$gameid/$gameid.png";

            echo '<img src="' . $image_url . '" alt="' . $game['name'] . '" class="game-image">';
            echo '</li>';
        }

        echo '</ul>';
        echo '</div>'; // End of .game-list
        echo '</div>'; // End of .letter-section
    }
} else {
    echo "<p>User not logged in or session expired.</p>";
}
?>

                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link" id="unselect-all">Unselect All</a>
                <div class="modal-footer-buttons">
                    <a href="#" class="btn btn-link" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-primary" form="gameForm">Done</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<!-- Custom JS -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.game-checkbox');
        const selectedCount = document.getElementById('selected-count');
        const unselectAllButton = document.getElementById('unselect-all');

        // Update de geselecteerde tellen bij checkbox veranderingen
        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                const selected = document.querySelectorAll('.game-checkbox:checked').length;
                selectedCount.textContent = selected;
            });
        });

        // Unselect alle checkboxes bij klikken op de "Unselect All" link
        unselectAllButton.addEventListener('click', function () {
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = false;
            });
            selectedCount.textContent = '0';
        });

        // Voeg click event toe aan elke game-item om de checkbox te selecteren
        document.querySelectorAll('.list-group-item').forEach(function (item) {
            item.addEventListener('click', function () {
                const checkbox = item.querySelector('.form-check-input');
                checkbox.checked = !checkbox.checked;
                checkbox.dispatchEvent(new Event('change'));
            });
        });
    });
</script>
<script>
function reloadCSS() {
    const links = [
        "http://yixboost.nl.eu.org/yixboost/assets/font-awesome-6-pro-main/css/all.css",
        "assets/css/templatemo-cyborg-gaming.css",
        "assets/css/owl.css",
        "assets/css/animate.css",
        "https://unpkg.com/swiper@7/swiper-bundle.min.css"
    ];

    // CSS-bestanden opnieuw laden
    links.forEach(function(link) {
        const newLink = document.createElement("link");
        newLink.rel = "stylesheet";
        newLink.href = link + "?v=" + new Date().getTime(); // Voeg timestamp toe aan de URL
        document.head.appendChild(newLink);
    });

    // Inline styles in <style> tags opnieuw laden
    const styleTags = document.querySelectorAll("style");
    styleTags.forEach(function(styleTag) {
        const newStyle = document.createElement("style");
        newStyle.innerHTML = styleTag.innerHTML; // Kopieer de inhoud van de originele style tag
        document.head.appendChild(newStyle);
        styleTag.remove(); // Verwijder de oude style tag
    });
}

window.onload = reloadCSS; // CSS wordt opnieuw geladen bij pagina-oplaadbeurt

</script>
<script>
    // Function to close the banner and save the timestamp
    function closeBanner() {
        document.getElementById('banner-suggest-game').style.display = 'none';
        // Save the current time in localStorage
        localStorage.setItem('bannerClosedAt', new Date().getTime());
    }

    // Check if the banner should be shown
    function shouldShowBanner() {
        const bannerClosedAt = localStorage.getItem('bannerClosedAt');
        const fiveMinutes = 5 * 60 * 1000; // 5 minutes in milliseconds

        // If there's no record of the banner being closed or 5 minutes have passed, show the banner
        if (!bannerClosedAt || (new Date().getTime() - bannerClosedAt) > fiveMinutes) {
            document.getElementById('banner-suggest-game').style.display = 'flex';
        } else {
            document.getElementById('banner-suggest-game').style.display = 'none';
        }
    }

    // Run the function to check if the banner should be displayed when the page loads
    window.onload = shouldShowBanner;
</script>
  </body>

</html>
