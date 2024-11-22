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

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Yixboost Games</title>
    <link rel="icon" href="/yixboost/images/logo.png" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/yixboost/assets/font-awesome-6-pro-main/css/all.css">
    <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <style>
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

    .popup {
        font-family: 'Press Start 2P', cursive;
        width: 300px;
        background-color: #222; 
        border-radius: 10px;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        text-align: center;
        z-index: 999;
        display: none;
    }
    .popup h2 {
        margin-top: 0;
        font-size: 24px;
        color: #0ff; 
    }
    .popup p {
        font-size: 16px;
        color: #0ff;
        margin-bottom: 20px;
    }
    .btn {
        background-color: #0ff; 
        color: #000; 
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        font-size: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease-in-out;
    }
    .btn:hover {
        background-color: rgb(0, 190, 190);
    }
    .btn i {
        margin-right: 10px;
    }
    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #0ff;
        cursor: pointer;
    }
html {
    scroll-behavior: smooth;
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

a.glink {
  text-decoration:none
}
a.glink.gt-current-lang {
  font-weight:bold
}
.gt_container-unisv1 a.glink span {
  margin-right:5px;
  font-size:15px;
  vertical-align:middle
}
a.glink img {
  vertical-align:middle;
  display:inline;
  border:0;
  padding:0;
  margin:0;
  opacity:0.8;
  height:auto
}
a.glink:hover img {
  opacity:1
}
.gt_black_overlay {
  display:none;
  position:fixed;
  top:0%;
  left:0%;
  width:100%;
  height:100%;
  background-color:black;
  z-index:10000;
  -moz-opacity:0.8;
  opacity:.80;
  filter:alpha(opacity=80)
}
.gt_white_content {
  display:none;
  position:fixed;
  top:50%;
  left:50%;
  width:181px;
  height:285px;
  margin:-142.5px 0 0 -90.5px;
  padding:6px 16px;
  background-color:white;
  color:black;
  z-index:19881205;
  overflow:auto;
  text-align:left
}
.gt_white_content a {
  display:block;
  padding:10px 0;
  border-bottom:1px solid #e7e7e7;
  white-space:nowrap;
  line-height:0;
  flex-basis:39px;
  box-sizing:border-box;
}
.gt_white_content .gt_languages {
  display:flex;
  flex-flow:column wrap;
  max-height:285px;
  overflow-x:hidden;
}
.gt_white_content::-webkit-scrollbar-track {
  background-color:#F5F5F5
}
.gt_white_content::-webkit-scrollbar {
  width:5px
}
.gt_white_content::-webkit-scrollbar-thumb {
  background-color:#888
}
div.skiptranslate,
#google_translate_element2 {
  display:;
}
body {
  top:0!important
}
font font {
  background-color:transparent!important;
  box-shadow:none!important;
  position:initial!important
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
                    <!-- 
                    <div class="search-input">
                      <form id="search" action="#">
                        <input type="text" placeholder="What are we playing Today?" id='searchText' name="searchKeyword" onkeypress="handle" />
                        <i class="fa fa-search"></i>
                      </form>
                    </div> -->
                    <ul class="nav">
                <li><a href="index.php"><i class="fa-regular fa-home"></i> Home</a></li>
                <li><a
                    href="/yixboost/about.php"><i class="fa-solid fa-circle-info"></i> About</a></li>
                        <li><a href="https://www.youtube.com/@yixboost" target='_blank'><i class="fa-brands fa-youtube  "></i> Youtube</a></li>
                        <li><a href="https://discord.gg/tFSzDwGwZM" target='_blank'><i class="fa-brands fa-discord"></i> Discord</a></li>
                <li><a href="login/logout.php"><i
                      class="ti-shift-left"></i> Profile <img
                      src="profile-pictures/<?php echo $_SESSION['picture']; ?>.png" alt></a></li>
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
<?php
// Laad de JSON-data in
$jsonData = file_get_contents('games/games.json');
$games = json_decode($jsonData, true);
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="heading-section"></div>
        <div class="row">
<?php
// Als er een zoekopdracht is
if (!empty($searchQuery)) {
    $matchedGames = [];
    $relatedGames = [];
    $categories = [];

    foreach ($games as $gameId => $game) {
        similar_text(strtolower($searchQuery), strtolower($game['name']), $percent);
        if ($percent >= 60 || strpos(strtolower($game['cat']), strtolower($searchQuery)) !== false) {
            $matchedGames[$gameId] = $game;
            $categories[] = $game['cat'];
        }
    }

    // Verzamel gerelateerde games
    foreach ($games as $gameId => $game) {
        if (!array_key_exists($gameId, $matchedGames) && in_array($game['cat'], $categories)) {
            $relatedGames[$gameId] = $game;
        }
    }
} else {
    $matchedGames = $games;
    $relatedGames = [];
}

function getIconClass($category) {
    switch ($category) {
        case 'Platformer':
            return 'fas fa-gamepad';
        case 'Running':
        case 'Stickman':
            return 'fa-solid fa-person-running';
        case 'Car':
            return 'fa-solid fa-truck-monster';
        case 'Racing':
            return 'fa-solid fa-car';
        case 'Arcade':
            return 'fa-solid fa-ghost';
        case 'IO Game':
            return 'fa-regular fa-heart';
        case 'Puzzle':
            return 'fa-solid fa-puzzle-piece';
        case 'Building':
            return 'fa-solid fa-city';
        case 'Kids':
            return 'fa-solid fa-children';
        case 'Battle':
            return 'fa-solid fa-gun';
        case 'Sport':
            return 'fa-solid fa-basketball';
        default:
            return '';
    }
}

function displayGame($gameId, $game) {
    $gameUrl = "/yixboost/games/game.php?id=" . urlencode($gameId);

                // Check if 'image' key exists in the game array
                if (isset($game['image'])) {
                    $gameImg = $game['image'];
                } else {
                    $gameImg = "/yixboost/games/" . urlencode($gameId) . "/" . urlencode($gameId) . ".png";
                }

    $iconClass = getIconClass($game['cat']);
    echo "
    <div class='col-lg-3 col-sm-6'>
        <a href='{$gameUrl}'>
            <div class='item'>
                <img src='{$gameImg}' alt='{$game['name']}'>
                <h4>{$game['name']}<br><span><i class='$iconClass'></i> {$game['cat']}</span></h4>
            </div>
        </a>
    </div>
    ";
}

foreach ($matchedGames as $gameId => $game) {
    displayGame($gameId, $game);
}

if (!empty($relatedGames)) {
    echo "<h3>Related Games</h3>";
    foreach ($relatedGames as $gameId => $game) {
        displayGame($gameId, $game);
    }
}
?>

        </div>
    </div>
</div>


                  



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
        </div>
      </div>
    </div>
  </footer>
<div class="popup" id="popup">
    <span class="close" onclick="closePopup()">&times;</span>
    <h2>Rate Us on Google</h2>
    <p>We would love to hear your feedback. Please take a moment to rate us on Google.</p>
    <a href="https://www.google.com/search?newwindow=1&sca_esv=6e87d5184cf45ead&sca_upv=1&authuser=2&sxsrf=ADLYWIJKrWUWSm3TyTFtCVMoDqku2gkt7w:1715423870807&uds=ADvngMjcH0KdF7qGWtwTBrP0nt7dQWwhVpH_baOphry1It_WquWohjRvwVj965SUCXDF_ksotMbDPbFxzcEAq5ySBAS4YY6h-JKWRO56tsgAX0kRnUNW-knNt2OI4RRiNNNdzxAovp0I&si=ACC90nwjPmqJHrCEt6ewASzksVFQDX8zco_7MgBaIawvaF4-7lQfCP5Y_6HLgZCaP3jQhcRHHjGEAzjELuWCOQgXeHk0tmtoYq7tgqCu_AdQ7CF8AEukdOqx6yufF-Fp88JB6MJICDhC&q=Yixboost+Games+Reviews&prmd=ivnbz&hl=nl-NL&authuser=2&sa=X&ved=2ahUKEwiJqdXzs4WGAxVdxAIHHZd3A24Q_4MLegQIPRAG&biw=1280&bih=559&dpr=1.5" target="_blank" class="btn"><i class="fab fa-google"></i> Rate Us on Google</a>
</div>

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
    var gamesElement = document.getElementById('games');
    if(gamesElement){
        gamesElement.scrollIntoView({ behavior: "smooth", block: "start" });
    }
});

    </script>
<div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings = {"default_language":"en","native_language_names":true,"detect_browser_language":true,"languages":["en","nl","fr","de","pt","it","es"],"wrapper_selector":".gtranslate_wrapper"}</script>
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
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1584333903259393"
     crossorigin="anonymous"></script>

  </body>

</html>
