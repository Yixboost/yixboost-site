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
    header("Location: /yixboost/login/");
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

    <meta charset="utf-8">
    <meta name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet">
    <title>Profile | Yixboost Games</title>
    <link rel="icon" href="assets/images/user.png" type="image/x-icon">
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

.table {
    border-collapse: separate;
    border-radius: 8px;
    overflow: hidden;
    color: white;
}

.table thead {
    background-color: #333;
    color: white;
}

.table tbody tr {
    background-color: #444;
}

/* Optioneel: Stijl voor tabelcellen */
.table th, .table td {
    border: 1px solid #555; /* Voeg hier een border toe als dat gewenst is */
}

/* Als je geen border-radius voor cellen wilt */
.table th, .table td {
    border-radius: 0; /* Verwijdert eventuele border-radius van cellen */
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
                <li><a href="index.php"><i class="fa-regular fa-home"></i> Home</a></li>
                <li><a
                    href="about.php"><i class="fa-solid fa-circle-info"></i> About</a></li>
                        <li><a href="https://www.youtube.com/@yixboost" target='_blank'><i class="fa-brands fa-youtube  "></i> Youtube</a></li>
                        <li><a href="https://discord.gg/tFSzDwGwZM" target='_blank'><i class="fa-brands fa-discord"></i> Discord</a></li>
                <li><a href="login/logout.php" class="active"><i
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
          
                      <!-- ***** Admin Banner Start ***** -->
<?php
session_start();

if(isset($_SESSION['username'])) {
    if($_SESSION['username'] === 'admin' || $_SESSION['username'] === 'jonas' || $_SESSION['username'] === 'levi_lambers') {
        ?>
        <div class="row">
              <div class="col-lg-12">
                <div class="main-profile ">
                  <div class="row">
<div class="col-lg-4">
    <img src="images/admin.png" alt="User Picture" style="border-radius: 23px;">
</div>
                    <div class="col-lg-4 align-self-center">
                      <div class="main-info header-text">
                        <span> <i class="fas fa-gears"></i> Admin Settings</span>
                        <h4>
                            Welcome, Developer!<p>
                        </h4>
                        <p><?php
                          echo ucfirst($_SESSION['username']);
                          ?></p>
                        <div class="main-border-button">
                          <a href="http://portal.yixboost.nl.eu.org/" target='_blank'><i class="fas fa-gears"></i> Portal</a>   <a href="http://files.yixboost.nl.eu.org/" target='_blank'><i class="fas fa-pencil"></i> Edit Site</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 align-self-center">
                      <ul>
                        <li><i class="fas fa-user"></i> Total Visitors <span><?php

                            $bestandsnaam = 'visitors/' . date('Y-m') . '.txt';
                            $lokaal_bestand = basename($bestandsnaam);
                            file_put_contents($lokaal_bestand, file_get_contents($bestandsnaam));

                            $aantal_bezoekers = file_exists($lokaal_bestand) ? file_get_contents($lokaal_bestand) : 0;

                            echo $aantal_bezoekers;

                            ?></span></li>
                        <li><i class="fa-solid fa-gamepad-modern  fa-bounce"></i> Total Games <span><?php

                            $url = 'games/games.json';
                            $data = json_decode(file_get_contents($url), true);

                            echo $data !== null ? count($data) : "Fout bij het decoderen van JSON-gegevens.";

                            ?></span></li>
                        <li><i class="fas fa-user"></i> Total Users <span><?php

                            $url = 'login/hotspot/logins.json';
                            $data = json_decode(file_get_contents($url), true);

                            echo $data !== null ? count($data) : "Fout bij het decoderen van JSON-gegevens.";

                            ?></span></li>
                        <li><i class="fas fa-sun"></i> Weather<span id="weather"></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <br>
        <script>
        const url = 'https://api.weatherapi.com/v1/forecast.json?key=8bfb7a00ad5c406e82b115016231311&q=Veenendaal&days=1';
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Kon de weerdata niet ophalen.');
                }
                return response.json();
            })
            .then(data => {
                if (data && data.current) {
                    const currentTempC = data.current.temp_c;
                    const currentCondition = data.current.condition.text;
                    document.getElementById('weather').innerHTML = `${currentCondition}, ${currentTempC}°C`;
                } else {
                    throw new Error('Kon de weerdata niet ophalen.');
                }
            })
            .catch(error => {
                document.getElementById('weather').textContent = error.message;
            });
    </script>
        <?php
    }
}
?>


            <!-- ***** Banner Start ***** -->
            <div class="row">
              <div class="col-lg-12">
                <div class="main-profile ">
                  <div class="row">
<div class="col-lg-4">
    <img src="profile-pictures/<?php echo $_SESSION['picture']; ?>.png" alt="User Picture" style="border-radius: 23px;">
</div>
                    <div class="col-lg-4 align-self-center">
                      <div class="main-info header-text">
                        <span><i class="fa-solid fa-user-alien  fa-bounce"></i> Your Profile</span>
                        <h4>
                          <?php
                          session_start();
                          echo ucfirst($_SESSION['username']);
                          ?>
                        </h4>
                        
                        <p><i class="fa-solid fa-circle-envelope"></i> <?php echo
                          $_SESSION['email']?></p>
                          <hr>
                          <div class="gtranslate_wrapper">
<select id='perfect' class="gt_selector notranslate" aria-label="Select Language"
    data-ddg-inputtype="unknown">
    <option value>Select Language</option>
    <option value="en|af">🇿🇦 Afrikaans</option>
    <option value="en|am">🇪🇹 አማርኛ</option>
    <option value="en|ar">🇸🇦 العربية</option>
    <option value="en|az">🇦🇿 Azərbaycan dili</option>
    <option value="en|eu">🇪🇸 Euskara</option>
    <option value="en|be">🇧🇾 Беларуская мова</option>
    <option value="en|bn">🇧🇩 বাংলা</option>
    <option value="en|bs">🇧🇦 Bosanski</option>
    <option value="en|bg">🇧🇬 Български</option>
    <option value="en|ca">🇪🇸 Català</option>
    <option value="en|ceb">🇵🇭 Cebuano</option>
    <option value="en|ny">🇲🇼 Chichewa</option>
    <option value="en|zh-CN">🇨🇳 简体中文</option>
    <option value="en|zh-TW">🇹🇼 繁體中文</option>
    <option value="en|co">🇫🇷 Corsu</option>
    <option value="en|hr">🇭🇷 Hrvatski</option>
    <option value="en|cs">🇨🇿 Čeština‎</option>
    <option value="en|da">🇩🇰 Dansk</option>
    <option value="en|nl">🇳🇱 Nederlands</option>
    <option value="en|en" selected>🇬🇧 English</option>
    <option value="en|eo">🌍 Esperanto</option>
    <option value="en|et">🇪🇪 Eesti</option>
    <option value="en|tl">🇵🇭 Filipino</option>
    <option value="en|fi">🇫🇮 Suomi</option>
    <option value="en|fr">🇫🇷 Français</option>
    <option value="en|fy">🇳🇱 Frysk</option>
    <option value="en|gl">🇪🇸 Galego</option>
    <option value="en|ka">🇬🇪 ქართული</option>
    <option value="en|de">🇩🇪 Deutsch</option>
    <option value="en|el">🇬🇷 Ελληνικά</option>
    <option value="en|gu">🇮🇳 ગુજરાતી</option>
    <option value="en|ht">🇭🇹 Kreyol ayisyen</option>
    <option value="en|ha">🇳🇬 Harshen Hausa</option>
    <option value="en|haw">🏝️ Ōlelo Hawaiʻi</option>
    <option value="en|iw">🇮🇱 עִבְרִית</option>
    <option value="en|hi">🇮🇳 हिन्दी</option>
    <option value="en|hmn">🌏 Hmong</option>
    <option value="en|hu">🇭🇺 Magyar</option>
    <option value="en|is">🇮🇸 Íslenska</option>
    <option value="en|ig">🇳🇬 Igbo</option>
    <option value="en|id">🇮🇩 Bahasa Indonesia</option>
    <option value="en|ga">🇮🇪 Gaeilge</option>
    <option value="en|it">🇮🇹 Italiano</option>
    <option value="en|ja">🇯🇵 日本語</option>
    <option value="en|jw">🇮🇩 Basa Jawa</option>
    <option value="en|kn">🇮🇳 ಕನ್ನಡ</option>
    <option value="en|kk">🇰🇿 Қазақ тілі</option>
    <option value="en|km">🇰🇭 ភាសាខ្មែរ</option>
    <option value="en|ko">🇰🇷 한국어</option>
    <option value="en|ku">🇮🇶 كوردی‎</option>
    <option value="en|ky">🇰🇬 Кыргызча</option>
    <option value="en|lo">🇱🇦 ພາສາລາວ</option>
    <option value="en|la">🏛️ Latin</option>
    <option value="en|lv">🇱🇻 Latviešu valoda</option>
    <option value="en|lt">🇱🇹 Lietuvių kalba</option>
    <option value="en|lb">🇱🇺 Lëtzebuergesch</option>
    <option value="en|mk">🇲🇰 Македонски јазик</option>
    <option value="en|mg">🇲🇬 Malagasy</option>
    <option value="en|ms">🇲🇾 Bahasa Melayu</option>
    <option value="en|ml">🇮🇳 മലയാളം</option>
    <option value="en|mt">🇲🇹 Maltese</option>
<option value="en|mi">🇳🇿 Te Reo Māori</option>
<option value="en|mr">🇮🇳 मराठी</option>
<option value="en|mn">🇲🇳 Монгол</option>
<option value="en|my">🇲🇲 ဗမာစာ</option>
<option value="en|ne">🇳🇵 नेपाली</option>
<option value="en|no">🇳🇴 Norsk bokmål</option>
<option value="en|ps">🇦🇫 پښتو</option>
<option value="en|fa">🇮🇷 فارسی</option>
<option value="en|pl">🇵🇱 Polski</option>
<option value="en|pt">🇵🇹 Português</option>
<option value="en|pa">🇮🇳 ਪੰਜਾਬੀ</option>
<option value="en|ro">🇷🇴 Română</option>
<option value="en|ru">🇷🇺 Русский</option>
<option value="en|sm">🇼🇸 Samoan</option>
<option value="en|gd">🏴 Gàidhlig</option>
<option value="en|sr">🇷🇸 Српски језик</option>
<option value="en|st">🇱🇸 Sesotho</option>
<option value="en|sn">🇿🇼 Shona</option>
<option value="en|sd">🇵🇰 سنڌي</option>
<option value="en|si">🇱🇰 සිංහල</option>
<option value="en|sk">🇸🇰 Slovenčina</option>
<option value="en|sl">🇸🇮 Slovenščina</option>
<option value="en|so">🇸🇴 Afsoomaali</option>
<option value="en|es">🇪🇸 Español</option>
<option value="en|su">🇮🇩 Basa Sunda</option>
<option value="en|sw">🇰🇪 Kiswahili</option>
<option value="en|sv">🇸🇪 Svenska</option>
<option value="en|tg">🇹🇯 Тоҷикӣ</option>
<option value="en|ta">🇮🇳 தமிழ்</option>
<option value="en|te">🇮🇳 తెలుగు</option>
<option value="en|th">🇹🇭 ไทย</option>
<option value="en|tr">🇹🇷 Türkçe</option>
<option value="en|uk">🇺🇦 Українська</option>
<option value="en|ur">🇵🇰 اردو</option>
<option value="en|uz">🇺🇿 O‘zbekcha</option>
<option value="en|vi">🇻🇳 Tiếng Việt</option>
<option value="en|cy">🏴 Cymraeg</option>
<option value="en|xh">🇿🇦 isiXhosa</option>
<option value="en|yi">🕍 יידיש</option>
<option value="en|yo">🇳🇬 Yorùbá</option>
<option value="en|zu">🇿🇦 Zulu</option>
</select>
</div>
                        <div class="main-border-button">
                          <a href="login/logout.php"><i
                              class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 align-self-center">
                      <ul>
                        <li><a href="login/newpassword.php"><i class="fa-thin fa-lock-keyhole"></i> Change Password</a></li>
                        <li><a href="login/newname.php"><i
                              class="fas fa-user"></i> Change Username</a></li>
                        <li><a href="login/newmail.php"><i class="fa-solid fa-square-envelope"></i> Change Email
                            Address</a></li>
                        <li><a href="background.php"><i class="fa-solid fa-image-landscape"></i></i> Change Background</a></li>
                        <li><a href="newimage.php"><i class="fa-thin fa-image-polaroid-user"></i> Change Profile Picture</a></li>
                      </ul>
                    </div>
<script src="https://cdn.gtranslate.net/widgets/latest/dropdown.js" defer></script>

                  </div>
                  </div>
                  <br>
                  
                              <!-- ***** Banner Start ***** -->
            <div class="row">
              <div class="col-lg-12">
                <div class="main-profile ">
                  <div class="row">
<?php

session_start();

$username = $_SESSION['username'] ?? null;
$notifications = [];

if ($username) {
    $jsonUrl = 'assets/PHP/notifications/notifications.json';
    // Ophalen van de inhoud van de JSON via een URL
    $jsonContent = file_get_contents($jsonUrl);
    
    if ($jsonContent !== false) {
        $allNotifications = json_decode($jsonContent, true);
        
        if (json_last_error() === JSON_ERROR_NONE) {
            // Filter notificaties voor de specifieke gebruiker
            $notifications = array_filter($allNotifications, function($notification) use ($username) {
                return $notification['username'] === $username;
            });
        } else {
            // JSON-decoding error
            echo "Er is een probleem met het JSON-bestand.";
        }
    } else {
        // Fout bij het ophalen van het bestand
        echo "Het JSON-bestand kon niet worden opgehaald.";
    }
}
?>

<div class="container mt-5">
<h2>Notification Center</h2>
<hr>
    <?php if ($username && !empty($notifications)): ?>
    <table class="table table-bordered" style="border-collapse: separate; border-radius: 8px; overflow: hidden; color: white;">
        <thead>
            <tr style="background-color: #333;">
                <th>Type</th>
                <th>Date and time</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($notifications as $notification): ?>
            <tr style="background-color: #444;">
                <td><?= htmlspecialchars($notification['type']) ?></td>
                <td><?= htmlspecialchars($notification['timestamp']) ?></td>
                <td><?= htmlspecialchars($notification['message']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No notifications available.</p>
    <?php endif; ?>
</div>




                    </div>

                  </div>

                  <!-- ***** Gaming Favorites Start ***** -->
                  <div class="gaming-library">
                    <div class="col-lg-12">
                      <div class="heading-section">
                        <h4><em>Your Gaming</em> Favorites</h4>
                      </div>
                      <div class="item">
                        <ul>
                          <li><img src="assets/images/game-01.jpg" alt
                              class="templatemo-item"></li>
                          <li><h4>Dota 2</h4><span>Sandbox</span></li>
                          <li><h4>Date Added</h4><span>24/08/2036</span></li>
                          <li><h4>Hours Played</h4><span>634 H 22
                              Mins</span></li>
                          <li><h4>Currently</h4><span>Downloaded</span></li>
                          <li><div
                              class="main-border-button border-no-active"><a
                                href="#">Donwloaded</a></div></li>
                        </ul>
                      </div>
                      <div class="item">
                        <ul>
                          <li><img src="assets/images/game-02.jpg" alt
                              class="templatemo-item"></li>
                          <li><h4>Fortnite</h4><span>Sandbox</span></li>
                          <li><h4>Date Added</h4><span>22/06/2036</span></li>
                          <li><h4>Hours Played</h4><span>740 H 52
                              Mins</span></li>
                          <li><h4>Currently</h4><span>Downloaded</span></li>
                          <li><div class="main-border-button"><a
                                href="#">Donwload</a></div></li>
                        </ul>
                      </div>
                      <div class="item last-item">
                        <ul>
                          <li><img src="assets/images/game-03.jpg" alt
                              class="templatemo-item"></li>
                          <li><h4>CS-GO</h4><span>Sandbox</span></li>
                          <li><h4>Date Added</h4><span>21/04/2036</span></li>
                          <li><h4>Hours Played</h4><span>892 H 14
                              Mins</span></li>
                          <li><h4>Currently</h4><span>Downloaded</span></li>
                          <li><div
                              class="main-border-button border-no-active"><a
                                href="#">Donwloaded</a></div></li>
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
                  <p><a
                      href='/yixboost/privacy'>Privacy
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
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/65149036b1aaa13b7a795156/1hbc56lq3';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
        </body>

      </html>
