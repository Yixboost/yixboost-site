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
    <title>Yixboost Games</title>
    <link rel="icon" href="http://yixboost.nl.eu.org/yixboost/images/logo.png" type="image/x-icon">
    <meta property="og:title" content="Yixboost Games">
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
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/font-awesome-6-pro-main/css/all.css">
    <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
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
    #scrollToTopButton {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 40px;
    height: 40px;
    background-color: #000;
    color: #fff;
    border: none;
    border-radius: 50%;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
    z-index: 9999;
}

#scrollToTopButton.show {
    opacity: 1;
    visibility: visible;
}

#scrollToTopButton i {
    font-size: 20px;
}


        .modal-content {
            border-radius: 16px; /* Rounded corners for entire modal */
            background-color: #1e1e1e; /* Darker background for the modal */
            color: #e0e0e0; /* Light text color */
        }
        .modal-header {
            border-top-left-radius: 16px; /* Rounded corners for top left */
            border-top-right-radius: 16px; /* Rounded corners for top right */
            border-bottom-left-radius: 16px; /* Rounded corners for bottom left */
            border-bottom-right-radius: 16px; /* Rounded corners for bottom right */
            background-color: rgba(30, 30, 30, 0.9); /* Adjusted transparency */
            border: none; /* Remove border */
            height: 30px; /* Smalle header */
        }
        .modal-footer {
            border-bottom-left-radius: 16px; /* Rounded corners for bottom left */
            border-bottom-right-radius: 16px; /* Rounded corners for bottom right */
            background-color: #1e1e1e;
            border-top: none; /* Remove border */
            padding: 10px 20px;
            display: flex;
            justify-content: space-between; /* Space out the buttons */
            align-items: center;
        }
        .modal-body {
            padding-bottom: 60px; /* Space for footer */
            max-height: 70vh; /* Limit the height of the modal body */
            overflow-y: scroll; /* Enable vertical scrolling */
            scrollbar-width: none; /* For Firefox: hide scrollbar */
        }

        .modal-body::-webkit-scrollbar {
            display: none; /* For Chrome, Safari, and Opera: hide scrollbar */
        }

        .game-image {
            width: 50px;
            height: auto;
            border-radius: 8px; /* Rounded corners for images */
        }
        .letter-section {
            margin-top: 20px;
            display: flex;
            align-items: flex-start;
        }
        .letter-heading {
            font-weight: bold;
            font-size: 1.5em;
            margin-right: 15px;
            text-transform: uppercase;
            width: 50px;
            text-align: right;
            color: #bb86fc; /* Accent color */
        }
        .game-list {
            flex-grow: 1;
            background-color: #333; /* Dark grey background for the game list */
            border-radius: 8px; /* Rounded corners for the list */
        }
        .list-group-item {
            background-color: #2c2c2c; /* Constant grey color for list items */
            border: none; /* Remove borders */
            color: #e0e0e0; /* Light text color */
            cursor: pointer; /* Wijzigt de cursor naar een pointer bij hover */
        }
        .list-group-item:hover {
            background-color: #333; /* Slightly lighter grey on hover */
        }
        .sticky-header {
            position: sticky;
            top: 0;
            background-color: rgba(30, 30, 30, 0.5); /* Semi-transparent background */
            border-top-left-radius: 16px; /* Rounded corners for sticky header */
            border-top-right-radius: 16px; /* Rounded corners for sticky header */
            z-index: 1050; /* Ensure it stays above the modal body */
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #e0e0e0;
        }
        .sticky-header a {
            margin: 0 5px;
            font-weight: bold;
            color: #bb86fc; /* Accent color */
            text-decoration: none;
        }
        .sticky-header a:hover {
            text-decoration: underline;
        }
        .selection-counter {
            font-weight: bold;
            margin-left: 10px;
        }
        .btn-primary {
            background-color: #bb86fc;
            border-color: #bb86fc;
        }
        .btn-primary:hover {
            background-color: #8c52ff;
            border-color: #8c52ff;
        }
        .btn-secondary {
            background-color: #333;
            border-color: #333;
        }
        .btn-secondary:hover {
            background-color: #555;
            border-color: #555;
        }
        .btn-link {
            color: #bb86fc; /* Purple link color */
            font-weight: bold;
            text-decoration: none;
        }
        .btn-link:hover {
            text-decoration: underline;
        }
        .form-check-input:checked {
            background-color: #bb86fc;
            border-color: #bb86fc;
        }
        .form-check-label {
            color: #e0e0e0;
        }
        
        .item {
  transition: background-color 0.3s ease;
}

.item span {
  transition: background-image 0s ease;
}

.item:hover {
background-image: linear-gradient(
			-70deg,
			rgba(0, 0, 0, 0.15) 60%,
			transparent 60%
		),
		linear-gradient(-20deg, rgba(0, 0, 0, 0.15) 50%, transparent 50%),
		linear-gradient(40deg, rgba(0, 0, 0, 0.15) 60%, transparent 60%),
		linear-gradient(-50deg, rgba(0, 0, 0, 0.15) 15%, transparent 15%),
		linear-gradient(137.42deg, #aa00ff 0%, #7c4dff 50.43%, #304ffe 100%);
	background-repeat: no-repeat;
}

.item:hover span {
color: #fff;
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
    $redirectUrl = "search.php?q=" . urlencode($searchKeyword);
    header("Location: $redirectUrl");
    exit();
}
?>

                                                <ul class="nav">
                <li><a href="index.php" class="active"><i class="fa-regular fa-home"></i> Home</a></li>
                <li><a
                    href="about.php" ><i class="fa-solid fa-circle-info"></i> About</a></li>
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
          <!-- ***** All Games Start ***** -->
          <div class="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                </div>
                <div class="row">
<?php
session_start(); // Zorg ervoor dat de sessie wordt gestart

// Haal de JSON-data op en decodeer deze
$jsonData = file_get_contents('games/games.json');
$games = json_decode($jsonData, true);

// Haal de categorie uit de URL (als deze is ingesteld)
$selectedCategory = isset($_GET['id']) ? $_GET['id'] : null;

// Haal de gebruikersnaam uit de sessie om te bepalen of de gebruiker admin is
$isAdmin = isset($_SESSION['username']) && $_SESSION['username'] === 'admin';

// Controleer of de categorie is ingesteld en niet leeg is
if (!empty($selectedCategory)) {
    // Bepaal het juiste icoon voor de geselecteerde categorie
    $iconClass = '';
    if ($selectedCategory === 'Platformer') {
        $iconClass = 'fas fa-gamepad';
    } elseif ($selectedCategory === 'Running' || $selectedCategory === 'Stickman') {
        $iconClass = 'fa-solid fa-person-running';
    } elseif ($selectedCategory === 'Car') {
        $iconClass = 'fa-solid fa-truck-monster';
    } elseif ($selectedCategory === 'Racing') {
        $iconClass = 'fa-solid fa-car-bump';
    } elseif ($selectedCategory === 'Arcade') {
        $iconClass = 'fa-solid fa-ghost';
    } elseif ($selectedCategory === 'IO Game') {
        $iconClass = 'fa-duotone fa-snake';
    } elseif ($selectedCategory === 'Puzzle') {
        $iconClass = 'fa-solid fa-puzzle-piece';
    } elseif ($selectedCategory === 'Building') {
        $iconClass = 'fa-solid fa-city';
    } elseif ($selectedCategory === 'Kids') {
        $iconClass = 'fa-regular fa-heart';
    } elseif ($selectedCategory === 'Battle') {
        $iconClass = 'fa-solid fa-axe-battle';
    } elseif ($selectedCategory === 'Sport') {
        $iconClass = 'fa-solid fa-basketball';
    } elseif ($selectedCategory === 'Emulator') {
        $iconClass = 'fa-regular fa-game-console-handheld';
    }

    echo "<div id='{$selectedCategory}' class='section'>";
    echo "</div>";
    echo "<h2><i class='$iconClass'></i> {$selectedCategory}</h2>";
    echo "<hr>";

    // Filter de games op basis van de geselecteerde categorie
    foreach ($games as $gameId => $game) {
        if ($game['cat'] == $selectedCategory) {
            // Controleer de zichtbaarheid van de game
            if (isset($game['visible']) && $game['visible'] == 0 && !$isAdmin) {
                continue; // Sla deze game over als de gebruiker geen admin is
            }

            // Bepaal de URL voor de game
            $gameUrl = "games/game.php?id=" . urlencode($gameId);

            // Check of de 'image' key bestaat in de game array
            if (isset($game['image'])) {
                $gameImg = $game['image'];
            } else {
                $gameImg = "games/" . urlencode($gameId) . "/" . urlencode($gameId) . ".png";
            }

            echo "
            <div class='col-lg-3 col-sm-6'>
              <a href='{$gameUrl}'>
                <div class='item'>
                  <img src='{$gameImg}' alt='{$game['name']}'>
                  <h4>{$game['name']}<br><span><i class='$iconClass'></i> {$selectedCategory}</span></h4>
                    <ul>
                      <li><i class='fa-regular fa-gamepad-modern'></i> {$game['views']}</li>
                    </ul>
                </div>
              </a>
            </div>
            ";
        }
    }
} else {
    echo "No category selected or category not found.";
}

?>



                  



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
          <p><a href='/yixboost/privacy'>Privacy Policy</a></p>
<p>
  <i class="fa-solid fa-starfighter-twin-ion-engine-advanced" style="margin-right: 10px;"></i>
  <i class="fa-solid fa-starfighter fa-shake" style="margin-right: 10px;"></i>
  <i class="fa-solid fa-starship-freighter"></i>
</p>

        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  </body>

</html>
