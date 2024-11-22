<?php
$gameid = $_GET['id'];
$jsonData = file_get_contents('games/games.json');
$games = json_decode($jsonData, true);

if (array_key_exists($gameid, $games)) {
    $game = $games[$gameid];
    $cat = $game['cat'];
    $name = $game['name'];
    $iframe = "http://yixboost.nl.eu.org/yixboost/games/gameframe.php?id=" . $gameid;

    if (isset($game['extra'])) {
        $extra = $game['extra'];
    } else {
        $extra = null;
    }
} else {
    echo "Game not found";
}

?>
<?php
header("X-Frame-Options: ALLOW-FROM http://yixboost.nl.eu.org");
?>
<?php
session_start();

if(isset($_SESSION['picture'])) {
    unset($_SESSION['picture']);
}

$data = json_decode(@file_get_contents('login/logins.json'), true);
if ($data && isset($data[$_SESSION['username']]['picture'])) {
    $_SESSION['picture'] = $data[$_SESSION['username']]['picture'];
}
?>
<?php
session_start();

function isValidUser($username) {
    $loginsFile = 'login/logins.json';
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
$jsonData = file_get_contents('games/games.json');
$games = json_decode($jsonData, true);
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
<!DOCTYPE html>
<html lang="en">

  <head>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1584333903259393"
     crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet">
    <title>About | Yixboost Games</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link href="/yixboost/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/yixboost/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/yixboost/assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="/yixboost/assets/css/owl.css">
    <link rel="stylesheet" href="/yixboost/assets/css/animate.css">
    <link rel="stylesheet"
      href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
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

/* Algemene stijlen */
body {
  background-color: #222;
  color: #fff;
}

/* Stijl voor select element */
.gt_selector {
  font-family: Arial, sans-serif;
  font-size: 16px;
  color: #fff;
  border: 2px solid #666;
  border-radius: 5px;
  padding: 5px 15px;
  width: 200px;
  background-color: #444;
  cursor: pointer;
}

/* Stijl voor opties */
.gt_selector option {
  font-family: Arial, sans-serif;
  background-color: #444;
  color: #fff;
}

/* Stijl voor hover */
.gt_selector:hover {
  border-color: #007aff !important;
}

/* Stijl voor focus */
.gt_selector:focus {
  outline: none;
  border-color: #007aff;
  box-shadow: 0 0 5px rgba(102, 175, 233, 0.5);
}

/* Stijl voor geselecteerde optie */
.gt_selector option:checked {
  background-color: #007aff;
  color: #fff;
}

/* Stijl voor dropdown pijl */
.gt_selector::after {
  content: '▼';
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  pointer-events: none;
  color: #fff;
}

.gt_selector[aria-label="Select Language"] {
    display: none;
}

#perfect {
    display: block; /* of display: inline; of elke andere geschikte display-waarde */
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
                <img src="assets/images/logo.png" alt>
              </a>
              <!-- 
                    <div class="search-input">
                      <form id="search" action="#">
                        <input type="text" placeholder="What are we playing Today?" id='searchText' name="searchKeyword" onkeypress="handle" />
                        <i class="fa fa-search"></i>
                      </form>
                    </div> -->
              <ul class="nav">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a
                    href="http://yixboost.nl.eu.org/yixboost/about.php">About</a></li>
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

          <!-- ***** Featured Start ***** -->
          <div class="row">
            <div class="col-lg-12">
                  <div class="game-container">
        <iframe class="game-iframe" src="<?php echo $iframe; ?>"></iframe>
    </div>
        <div id="contextmenu">
            <ul>
              <li><a href="/yixboost">
                <i class="fas fa-home"></i> Back to Home
              </a></li>
              <li><a href="#">
                <i class="fas fa-sync"></i> Reload
              </a></li>
              <li><a href="#">
                <i class="fas fa-expand-arrows-alt"></i> Fullscreen
              </a></li>
              <li><hr></li>
              <li><a href="/yixboost/profile.php">
                <i class="fas fa-user"></i> Account
              </a></li>
              <li><a href="/yixboost/about.php">
                <i class="fas fa-info-circle"></i> About
              </a></li>
            </ul>
          </div>
            </div>
          </div>
          <!-- ***** Details End ***** -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1584333903259393"
     crossorigin="anonymous"></script>
<!-- Yixboost Games -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1584333903259393"
     data-ad-slot="7255399134"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
              </div>
             
            </div>
          </div>
          <!-- ***** Other End ***** -->

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
                  <p><a
                      href='http://yixboost.nl.eu.org/yixboost/privacy'>Privacy
                      Policy</a></p>
                </div>
              </div>
            </div>
          </footer>
          <div class="popup" id="popup">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2>Rate Us on Google</h2>
            <p>We would love to hear your feedback. Please take a moment to rate
              us on Google.</p>
            <a
              href="https://www.google.com/search?newwindow=1&sca_esv=6e87d5184cf45ead&sca_upv=1&authuser=2&sxsrf=ADLYWIJKrWUWSm3TyTFtCVMoDqku2gkt7w:1715423870807&uds=ADvngMjcH0KdF7qGWtwTBrP0nt7dQWwhVpH_baOphry1It_WquWohjRvwVj965SUCXDF_ksotMbDPbFxzcEAq5ySBAS4YY6h-JKWRO56tsgAX0kRnUNW-knNt2OI4RRiNNNdzxAovp0I&si=ACC90nwjPmqJHrCEt6ewASzksVFQDX8zco_7MgBaIawvaF4-7lQfCP5Y_6HLgZCaP3jQhcRHHjGEAzjELuWCOQgXeHk0tmtoYq7tgqCu_AdQ7CF8AEukdOqx6yufF-Fp88JB6MJICDhC&q=Yixboost+Games+Reviews&prmd=ivnbz&hl=nl-NL&authuser=2&sa=X&ved=2ahUKEwiJqdXzs4WGAxVdxAIHHZd3A24Q_4MLegQIPRAG&biw=1280&bih=559&dpr=1.5"
              target="_blank" class="btn"><i class="fab fa-google"></i> Rate Us
              on Google</a>
          </div>

          <!-- Scripts -->
          <!-- Bootstrap core JavaScript -->
          <script src="/yixboost/vendor/jquery/jquery.min.js"></script>
          <script src="/yixboost/vendor/bootstrap/js/bootstrap.min.js"></script>

          <script src="/yixboost/assets/js/isotope.min.js"></script>
          <script src="/yixboost/assets/js/owl-carousel.js"></script>
          <script src="/yixboost/assets/js/tabs.js"></script>
          <script src="/yixboost/assets/js/popup.js"></script>
          <script src="/yixboost/assets/js/custom.js"></script>
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
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>
          <!-- Google tag (gtag.js) -->
          <script>
  window.dataLayer = window.dataLayer || [];
  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());
  gtag('config', 'G-7KHGF44319');
</script>
          <script async
            src="https://www.googletagmanager.com/gtag/js?id=G-7KHGF44319"
            type="text/javascript"></script>
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
        </body>

      </html>
