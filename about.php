<?php
// Start de sessie
session_start();

// Controleer ingelogde gebruiker en laad achtergrond
$username = $_SESSION['username'] ?? null;
$jsonFilePath = 'login/hotspot/logins.json';
$background = 'http://yixboost.nl.eu.org/yixboost/assets/images/backgrounds/2.png';

$jsonData = @file_get_contents($jsonFilePath);
$users = json_decode($jsonData, true);

if ($users !== null && $username !== null && isset($users[$username])) {
    $background = $users[$username]['background'] ?? $background;
}

$data = @json_decode(file_get_contents('login/logins.json'), true);
if ($data && isset($data[$_SESSION['username']]['picture'])) {
    // Stel de afbeelding URL in
    $_SESSION['picture'] = 'http://naslambers.synology.me/yixboost/profile-pictures/' . $data[$_SESSION['username']]['picture'] . '.png';
}

// Controleer geldigheid van de gebruiker
function isValidUser($username) {
    $loginsFile = 'login/logins.json';
    if (file_exists($loginsFile)) {
        $loginsData = @json_decode(file_get_contents($loginsFile), true);
        return isset($loginsData[$username]);
    }
    return false;
}

// Laad spelgegevens
$jsonData = @file_get_contents('games/games.json');
$games = @json_decode($jsonData, true);

// Bezoekers tellen
$bestandsnaam = 'visitors/' . date('Y-m') . '.txt';

if (file_exists($bestandsnaam)) {
    $aantalBezoekers = (int) @file_get_contents($bestandsnaam);
} else {
    $aantalBezoekers = 0;
}

$aantalBezoekers++;
@file_put_contents($bestandsnaam, $aantalBezoekers);
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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/font-awesome-6-pro-main/css/all.css">
    <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"
      href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
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
<?php 
session_start();
error_reporting(0);

// Controleer of de sessie een afbeelding heeft
if (!isset($_SESSION['picture'])) {
    $_SESSION['picture'] = 'upload/user'; // Vervang door een standaardafbeelding indien nodig
}

// Maak de volledige URL voor de afbeelding
$profilePictureUrl = 'profile-pictures/' . $_SESSION['picture'] . '.png';

// Bepaal de knopnaam op basis van de sessie afbeelding
$buttonName = isset($_SESSION['picture']) ? 'Profile' : 'Login';

// Vervang %profile-picture% en %button-name% door de juiste waarden
$headerContent = file_get_contents('assets/html/header.html');
$headerContent = str_replace('%profile-picture%', $profilePictureUrl, $headerContent);
$headerContent = str_replace('%button-name%', $buttonName, $headerContent);

// Toon de gewijzigde header
echo $headerContent; 
?>
    <!-- ***** Header Area End ***** -->

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="page-content">

          <!-- ***** Featured Start ***** -->
          <div class="row">
            <div class="col-lg-12">
              <div class="feature-banner header-text">
                <div class="row">
                  <div class="col-lg-4">
                    <img src="assets/images/1.png" alt="" style="border-radius: 23px;">
                  </div>
                  <div class="col-lg-8">
                    <div class="thumb">
                      <img src="assets/images/youtube.webp" alt="" style="border-radius: 23px;">
                      <a href="https://www.youtube.com/watch?v=-HUYLz9_w84" target="_blank"><i class="fa fa-play"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         <br>
          <!-- ***** Featured End ***** -->


          <div class="game-details">
              <div class="col-lg-12">
                <div class="content" style="background-color: transparent;">
                  <div class="row">
    <div class="team-container">
        <div class="team-card">
            <div class="team-content">
                <img src="https://jonasvanleeuwen19.github.io/jonasvanleeuwen19.jpg" alt="Team member 1">
                <h2>Jonas van Leeuwen</h2>
                <h3>@jonasvanleeuwen19</h3>
                <div class="team-social-icons">
                    <a href="https://github.com/jonasvanleeuwen19" target='_blank'>Github</a>
                    <a href="https://jonasvanleeuwen19.github.io/" target='_blank'>Website</i></a>
                </div>
            </div>
        </div>

        <div class="team-card">
            <div class="team-content">
                <img src="https://valdtaniem.github.io/valdtaniem.png" alt="Team member 2">
                <h2>Levi Lambers</h2>
                <h3>@Valdtaniem</h3>
                <div class="team-social-icons">
                    <a href="https://github.com/valdtaniem" target='_blank'>Github</a>
                    <a href="https://valdtaniem.github.io/" target='_blank'>Website</a>
                </div>
            </div>
        </div>
    </div>
                    </div>
                  </div>
                </div>
              </div>
          <!-- ***** Details End ***** -->


          <!-- ***** Details Start ***** -->
          <div class="game-details">
            <div class="row">
              <div class="col-lg-12">
                <h2>About Yixboost Games</h2>
              </div>
              <div class="col-lg-12">
                <div class="content">
                  <div class="row">
                    <div class="col-lg-4">
                      <img src="assets/images/1.png" alt="" style="border-radius: 23px; margin-bottom: 30px;">
                    </div>
                    <div class="col-lg-4">
                      <img src="assets/images/2.png" alt="" style="border-radius: 23px; margin-bottom: 30px;">
                    </div>
                    <div class="col-lg-4">
                      <img src="assets/images/3.png" alt="" style="border-radius: 23px; margin-bottom: 30px;">
                    </div>
                    <div class="col-lg-12">
    <p>Welcome to Yixboost Games, the ultimate destination for free unblocked games! Our website, founded in 2023, offers a wide range of games that can be played anytime, anywhere, regardless of network restrictions. We are proud to provide players worldwide with a place to enjoy their favorite games without limitations.</p>
<br>
    <h3>Our History</h3>
    <p>Yixboost was originally founded in the Netherlands in 2020 under the name roboR6. In 2021, we changed our name to IceAric, and in 2022, we finally settled on Yixboost NL. Since then, we have focused on expanding and improving our game collection and user experience. As a Dutch company, we are committed to delivering quality and accessibility in the world of online gaming.</p>
<br>
    <h3>Our Mission</h3>
    <p>At Yixboost Games, we strive to offer a comprehensive and accessible collection of games that are available to everyone, no matter where they are. We aim to build a community where gamers come together to enjoy a wide variety of game genres without the limitations of network restrictions.</p>
<br>
    <h3>How You Can Contribute</h3>
    <p>We are always on the lookout for new and exciting games to add to our collection. If you have a game you'd like to see on our website, you can submit your suggestion through our special form: <a href="http://yixboost.nl.eu.org/yixboost/suggest-game/" target="_blank">Suggest Game</a>. We appreciate every contribution and look forward to your suggestions!</p>
<br>
    <h3>Join the Yixboost Community</h3>
    <p>Want to get the most out of Yixboost Games? Create an account! With an account, you can not only play but also track your progress and be part of our growing community. Registering is easy and can be done via this link: <a href="http://yixboost.nl.eu.org/yixboost/login/register.php" target="_blank">Create Account</a>. Join today and start playing your favorite unblocked games!</p>
<br>
    <h3>Leave a Review</h3>
    <p>Your feedback is important to us. If you enjoy our website and the games we offer, please leave a review to help others find their way to Yixboost Games. You can submit your review through this link: <a href="https://tinyurl.com/reviewyixboost" target="_blank">Review Yixboost</a>.</p>
<br>
    <h3>Stay Connected</h3>
    <p>Follow us on social media for the latest updates, news, and more!</p>
<br>
    <ul>
        <li><a href="https://www.youtube.com/@Yixboost" target="_blank">YouTube</a></li>
        <li><a href="https://www.instagram.com/yixboost/" target="_blank">Instagram</a></li>
    </ul>
<br>

    <p>For questions or more information, you can always reach us via email at <a href="mailto:yixboost@mail.com">yixboost@mail.com</a>.</p>

    <p>Thank you for visiting Yixboost Games. We hope you enjoy our unblocked games and become part of our vibrant and growing community!</p>
                    </div>
                    <div class="col-lg-12">
                      <div class="main-border-button">
                        <a href="index.php">Play for Free Now!</a>
                      </div>
                      <br>
                      <p>Created with ⚡ by <a href="https://jonasvanleeuwen19.github.io/" target='_blank'>Jonasvanleeuwen19</a> & <a href="https://valdtaniem.github.io/" target='_blank'>Valdtaniem</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Details End ***** -->
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
                  <p><a href='http://yixboost.nl.eu.org/yixboost/privacy'>Privacy Policy</a></p>
                </div>
              </div>
            </div>
          </footer>

          <!-- Scripts -->
          <?php echo file_get_contents('assets/html/scripts.html'); ?>
 
        </body>

      </html>
