<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <meta name="theme-color" content="#0341fc"> 
    <meta name="apple-mobile-web-app-title" content="Yixboost Games"> 
    <meta name="application-name" content="Yixboost Games"> 
    <meta name="msapplication-TileColor" content="#0341fc"> 
    <meta name="msapplication-TileImage" content="http://yixboost.nl.eu.org/yixboost/images/logo.png"> 
    <meta name="msapplication-config" content="http://yixboost.nl.eu.org/yixboost/browserconfig.xml">
    <link rel="apple-touch-icon" href="http://yixboost.nl.eu.org/yixboost/images/logo.png"> 
    <link rel="manifest" href="manifest.json">

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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/font-awesome-6-pro-main/css/all.css">
    <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <script src="https://ads.holid.io/auto/yixboost.nl.eu.org/holid.js" defer="defer"></script>

    <!-- Custom css for Background user theme -->
    <style>
    body {
        background: linear-gradient(0deg,#071A8C,#4CAAC1);
        background-image: url(<?php echo htmlspecialchars($background); ?>);
        background-repeat: no-repeat;
        background-size: cover;    
        background-attachment: fixed;
    }
    </style>
    
    <!-- ScrollReveal -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ScrollReveal().reveal('.item', {
                duration: 500,
                scale: 0.8,
                easing: 'ease-in-out',
                interval: 100,
                reset: true
            });
        });
    </script>
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
    $redirectUrl = "/search.php?q=" . urlencode($searchKeyword);
    header("Location: $redirectUrl");
    exit();
}
?>

                                                <ul class="nav">
                <li><a href="index.php" class="active"><i class="fa-regular fa-home"></i> Home</a></li>
                <li><a
                    href="/about.php" ><i class="fa-solid fa-circle-info"></i> About</a></li>
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
<?php
$bannersUrl = 'banners.json';
$bannersData = json_decode(file_get_contents($bannersUrl), true);
$randomBanner = $bannersData[array_rand($bannersData)];

$bannerBg = $randomBanner['background'] ?? '../assets/images/default-banner.jpg';
$bannerText1 = $randomBanner['text1'] ?? 'Welcome to Yixboost Games';
$bannerText2 = $randomBanner['text2'] ?? 'Discover More Fun!';
$bannerLink = $randomBanner['link'] ?? '#';
$bannerLinkText = $randomBanner['link_text'] ?? 'Learn More';
?>

<div class="main-banner" id="banner1" style="background-image: url(<?php echo $bannerBg; ?>); display: block;">
  <div class="row">
    <div class="col-lg-7">
      <div class="header-text">
        <h6><?php echo $bannerText1; ?></h6>
        <h4><?php echo $bannerText2; ?></h4>
        <div class="main-button">
          <a href="<?php echo $bannerLink; ?>" target='_blank'><?php echo $bannerLinkText; ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ***** Banners End ***** -->
          
          <!-- ***** All Games Start 🎮 ***** -->
          <div class="most-popular">
          <div class="container mt-4">
            <!-- Tiles for cool pages and settings ✨-->
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
<!-- Scroll to category urls -->
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
                    $iconClass = 'fa-solid fa-person-falling';
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

                if ($category === 'Funny') {
                    $iconClass = 'fa-sharp fa-solid fa-face-grin-squint-tears';
                }
                
                if ($category === 'Idle') {
                    $iconClass = 'fa-sharp fa-solid fa-trophy';
                }
                
                if ($category === 'Shooter') {
                    $iconClass = 'fa-sharp-duotone fa-solid fa-gun-squirt';
                }
                
                if ($category === '2 Player') {
                    $iconClass = 'fa-sharp fa-solid fa-circle-2';
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
              <div class="col-12" style="display: none;">
                <div class="featured-games header-text">
                  <div class="heading-section">
                    <h4><i class='fa-solid fa-fire'></i> <em>Popular</em> Games</h4>
                  </div>
                  <div class="owl-features owl-carousel">
                  <?php
session_start();

$jsonData = file_get_contents('games/games.json');
$games = json_decode($jsonData, true);
$isAdmin = isset($_SESSION['username']) && $_SESSION['username'] === 'admin';

if (!empty($games)) {
    uasort($games, function($a, $b) {
        return $b['views'] - $a['views'];
    });

    $gameCount = 0;
    $medalIcons = ['fa-solid fa-medal gold', 'fa-solid fa-medal silver', 'fa-solid fa-medal bronze', 'fa-solid fa-medal fourth'];

    foreach ($games as $gameId => $gameDetails) {
        if (isset($gameDetails['visible']) && $gameDetails['visible'] == 0 && !$isAdmin) {
            continue; 
        }

        if ($gameCount >= 15) {
            break;
        }
      
        $gameUrl = "games/game.php?id=" . urlencode($gameId);

        if (isset($gameDetails['image'])) {
            $gameImg = $gameDetails['image'];
        } else {
            $gameImg = "games/" . urlencode($gameId) . "/" . urlencode($gameId) . ".png";
        }

        echo "
          <a href='{$gameUrl}'>
            <div class='item'>
              <div class='thumb'>
                 <img src='{$gameImg}' alt='Game Image' onerror=\"this.onerror=null;this.src='assets/images/default-image.png';\">
                 <div class='hover-effect'>
                    <h6>{$gameDetails['views']} Views</h6>
                  </div>
              </div>
              <h4>{$gameDetails['name']}<br><span><i class='{$medalIcons[$gameCount]}'></i> #".($gameCount + 1)."</span></h4>
              <ul>
                <li><i class='fa-regular fa-gamepad-modern'></i> {$gameDetails['views']}</li>
              </ul>
            </div>
          </a>
        ";

        $gameCount++;
    }

} else {
    echo "No games found.";
}
?>
                  </div>
                </div>
              </div>
              <!-- ***** Popular Games End ***** -->

              <div class="col-lg-12">
                <div class="heading-section">
                </div>
                <div class="row">
<?php
//Popular Games
session_start(); 

$jsonData = file_get_contents('games/games.json');
$games = json_decode($jsonData, true);
$isAdmin = isset($_SESSION['username']) && $_SESSION['username'] === 'admin';

if (!empty($games)) {
    uasort($games, function($a, $b) {
        return $b['views'] - $a['views'];
    });

    echo "<div id='popular-games' class='section'></div>";
    echo "<h2><i class='fa-solid fa-fire'></i> Popular Games</h2>";
    echo "<hr>";

    $gameCount = 0;
    $medalIcons = ['fa-solid fa-medal gold', 'fa-solid fa-medal silver', 'fa-solid fa-medal bronze', 'fa-solid fa-medal fourth'];

    foreach ($games as $gameId => $gameDetails) {
        if (isset($gameDetails['visible']) && $gameDetails['visible'] == 0 && !$isAdmin) {
            continue;
        }

        if ($gameCount >= 4) {
            break;
        }

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
              <img src='{$gameImg}' alt='Game Image' onerror=\"this.onerror=null;this.src='games/default-image.png';\">
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

$plusImg = "assets/images/edit-favorite.png";

echo "
<div class='col-lg-3 col-sm-6'>
    <div class='item' data-bs-toggle='modal' data-bs-target='#gameModal'>
        <img src='{$plusImg}' alt='Add Game'>
    </div>
</div>
";

//Favorite Games
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
  <!-- Suggest Game Banner -->
<div class="container mt-4">
    <div class="banner-suggest-game" id="banner-suggest-game">
        <button class="banner-suggest-game-close-btn" onclick="closeBanner()">×</button>
        <img src="https://cdn-icons-png.flaticon.com/512/5930/5930147.png" alt="Banner Image">
        <div class="banner-suggest-game-content">
            <h2>Can't find the game you're looking for?</h2>
            <a href='/suggest-game' class="btn btn-suggest-game">Suggest Game</a>
        </div>
    </div>
</div>
 <!-- Suggest Game Banner End -->
<p>&nbsp;</p>
<!-- All Games Sorted in Categories -->
<?php
session_start();

function formatViews($views) {
    if ($views >= 1000) {
        $formattedViews = number_format($views / 1000, 1) . 'K';
    } else {
        $formattedViews = $views;
    }
    return $formattedViews;
}

$jsonData = file_get_contents('games/games.json');
$games = json_decode($jsonData, true);
$categories = array_unique(array_column($games, 'cat'));
$isAdmin = isset($_SESSION['username']) && $_SESSION['username'] === 'admin';

if (!empty($categories)) {
    foreach ($categories as $category) {
        // Icons for Categories
        $iconClass = '';
        if ($category === 'Platformer') {
            $iconClass = 'fas fa-gamepad';
        } elseif ($category === 'Running' || $category === 'Stickman') {
            $iconClass = 'fa-solid fa-person-falling';
        } elseif ($category === 'Car') {
            $iconClass = 'fa-solid fa-truck-monster';
        } elseif ($category === 'Racing') {
            $iconClass = 'fa-solid fa-car-bump';
        } elseif ($category === 'Arcade') {
            $iconClass = 'fa-solid fa-ghost';
        } elseif ($category === 'IO Game') {
            $iconClass = 'fa-duotone fa-snake';
        } elseif ($category === 'Puzzle') {
            $iconClass = 'fa-solid fa-puzzle-piece';
        } elseif ($category === 'Building') {
            $iconClass = 'fa-solid fa-city';
        } elseif ($category === 'Kids') {
            $iconClass = 'fa-regular fa-heart';
        } elseif ($category === 'Battle') {
            $iconClass = 'fa-solid fa-axe-battle';
        } elseif ($category === 'Sport') {
            $iconClass = 'fa-solid fa-basketball';
        } elseif ($category === 'Emulator') {
            $iconClass = 'fa-regular fa-game-console-handheld';
        } elseif ($category === 'Idle') {
            $iconClass = 'fa-sharp fa-solid fa-trophy';
        } elseif ($category === 'Shooter') {
            $iconClass = 'fa-sharp-duotone fa-solid fa-gun-squirt';
        } elseif ($category === '2 Player') {
            $iconClass = 'fa-sharp fa-solid fa-circle-2';
        } elseif ($category === 'Funny') {
            $iconClass = 'fa-sharp fa-solid fa-face-grin-squint-tears';
        }

        // URL for Category Page
        $moreUrl = "category.php?id=" . urlencode($category);

        echo "<div id='{$category}' class='section'>";
        echo "</div>";
        echo "<h2><i class='$iconClass'></i> {$category} <a href='{$moreUrl}' class='see-all-link'>See all →</a></h2>";
        echo "<hr>";

        $gameCount = 0;
        foreach ($games as $gameId => $game) {
            if ($game['cat'] == $category) {
                // Control of game is visible
                if (isset($game['visible']) && $game['visible'] == 0 && !$isAdmin) {
                    continue; 
                }

                if ($gameCount >= 4) {
                    break;
                }

                // Game Page URL
                $gameUrl = "games/game.php?id=" . urlencode($gameId);

                // Check of the 'image' key exists for the Game
                if (isset($game['image'])) {
                    $gameImg = $game['image'];
                } else {
                    $gameImg = "games/" . urlencode($gameId) . "/" . urlencode($gameId) . ".png";
                }
              
                $formattedViews = formatViews($game['views']);

              //Print Game Tile HTML
                echo "
                <div class='col-lg-3 col-sm-6'>
                  <a href='{$gameUrl}'>
                    <div class='item'>
                      <img src='{$gameImg}' alt='{$game['name']}'>
                      <h4>{$game['name']}<br><span><i class='$iconClass'></i> {$category}</span></h4>
                       <ul>
                         <li><i class='fa-regular fa-gamepad-modern'></i> {$formattedViews}</li>
                       </ul>
                    </div>
                  </a>
                </div>
                ";

                $gameCount++;
            }
        }
    }
} else {
    echo "No categories found.";
}
?>
<!-- All Games Sorted in Categories End -->
<br>
<!-- Main Content Footer with Authors or something else -->
<p>Created with ⚡ by <a href="https://jonasvanleeuwen19.github.io/" target='_blank'>Jonasvanleeuwen19</a> & <a href="https://valdtaniem.github.io/" target='_blank'>Valdtaniem</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Main Content Container End -->

    <!-- ScrolltoTop Button -->
  <button id="scrollToTopButton">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Footer Section start -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © <?php echo date("Y"); ?> Yixboost. All rights reserved. </p>
          <p><a href='http://yixboost.nl.eu.org/yixboost/privacy'>Privacy Policy</a></p>
          <!-- Random Starwars Bullshit -->
<p>
  <i class="fa-solid fa-starfighter-twin-ion-engine-advanced" style="margin-right: 10px;"></i>
  <i class="fa-solid fa-starfighter fa-shake" style="margin-right: 10px;"></i>
  <i class="fa-solid fa-starship-freighter"></i>
</p>

        </div>
      </div>
    </div>
  </footer>
    <!-- Footer Section End -->

<!-- Toast Notifications 🍞-->
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

    <!-- Toast Notifications End -->

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

    <!-- ScrolltoTop Button Script -->
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

<!-- Favorite Games Edit Modal -->
<div class="modal fade" id="gameModal" tabindex="-1" aria-labelledby="gameModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header sticky-header">
            </div>
            <div class="modal-body">
                <form id="gameForm" action="process_games.php" method="POST">
                    <?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $data_directory = 'data';
    $user_file = $data_directory . '/' . $username . '.txt';

    $user_selected_games = [];
    if (file_exists($user_file)) {
        $user_selected_games = explode(', ', file_get_contents($user_file));
    }

    $json_url = "games/games.json";
    $json_data = file_get_contents($json_url);
    $games = json_decode($json_data, true);

    uasort($games, function ($a, $b) {
        return strcmp($a['name'], $b['name']);
    });

    $grouped_games = [];
    foreach ($games as $gameid => $game) {
        $first_letter = strtoupper($game['name'][0]);
        $grouped_games[$first_letter][$gameid] = $game;
    }

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

    foreach ($grouped_games as $letter => $games_in_group) {
        echo '<div id="letter-' . $letter . '" class="letter-section">';
        echo '<div class="letter-heading">' . $letter . '</div>';
        echo '<div class="game-list">';
        echo '<ul class="list-group">';

        foreach ($games_in_group as $gameid => $game) {
            $is_checked = in_array($gameid, $user_selected_games) ? 'checked' : ''; 

            echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
            echo '<div class="form-check">';
            echo '<input class="form-check-input game-checkbox" type="checkbox" name="selected_games[]" value="' . $gameid . '" id="game-' . $gameid . '" ' . $is_checked . '>';
            echo '<label class="form-check-label" for="game-' . $gameid . '">' . $game['name'] . '</label>';
            echo '</div>';

            $image_url = isset($game['image']) ? $game['image'] : "http://yixboost.nl.eu.org/yixboost/games/$gameid/$gameid.png";

            echo '<img src="' . $image_url . '" alt="' . $game['name'] . '" class="game-image">';
            echo '</li>';
        }

        echo '</ul>';
        echo '</div>'; 
        echo '</div>';
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
<!-- Custom JS for Modal Game Favorites ⭐ -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.game-checkbox');
        const selectedCount = document.getElementById('selected-count');
        const unselectAllButton = document.getElementById('unselect-all');

        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                const selected = document.querySelectorAll('.game-checkbox:checked').length;
                selectedCount.textContent = selected;
            });
        });

        unselectAllButton.addEventListener('click', function () {
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = false;
            });
            selectedCount.textContent = '0';
        });

        document.querySelectorAll('.list-group-item').forEach(function (item) {
            item.addEventListener('click', function () {
                const checkbox = item.querySelector('.form-check-input');
                checkbox.checked = !checkbox.checked;
                checkbox.dispatchEvent(new Event('change'));
            });
        });
    });
</script>

    <!-- Reload CSS Script -->
<script>
function reloadCSS() {
    const links = [
        "http://yixboost.nl.eu.org/yixboost/assets/font-awesome-6-pro-main/css/all.css",
        "assets/css/templatemo-cyborg-gaming.css",
        "assets/css/owl.css",
        "assets/css/animate.css",
        "https://unpkg.com/swiper@7/swiper-bundle.min.css"
    ];

    links.forEach(function(link) {
        const newLink = document.createElement("link");
        newLink.rel = "stylesheet";
        newLink.href = link + "?v=" + new Date().getTime(); 
        document.head.appendChild(newLink);
    });

    const styleTags = document.querySelectorAll("style");
    styleTags.forEach(function(styleTag) {
        const newStyle = document.createElement("style");
        newStyle.innerHTML = styleTag.innerHTML; 
        document.head.appendChild(newStyle);
        styleTag.remove();
    });
}

window.onload = reloadCSS; 

</script>

    <!-- Suggest Game Banner Script -->
<script>
    function closeBanner() {
        document.getElementById('banner-suggest-game').style.display = 'none';
        localStorage.setItem('bannerClosedAt', new Date().getTime());
    }
  
    function shouldShowBanner() {
        const bannerClosedAt = localStorage.getItem('bannerClosedAt');
        const fiveMinutes = 5 * 60 * 1000; // 5 minutes in milliseconds

        if (!bannerClosedAt || (new Date().getTime() - bannerClosedAt) > fiveMinutes) {
            document.getElementById('banner-suggest-game').style.display = 'flex';
        } else {
            document.getElementById('banner-suggest-game').style.display = 'none';
        }
    }

    window.onload = shouldShowBanner;
</script>
<!-- Fullscreen settings for banners -->
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
  </body>

</html>
