<?php
ini_set('display_errors', 0);
ini_set('log_errors', 1);

session_start();

$username = $_SESSION['username'] ?? null;
$jsonFilePath = 'data/json/logins.json';
$jsonData = file_get_contents($jsonFilePath);
$users = json_decode($jsonData, true);
$background = 'assets/images/backgrounds/2.png';

if ($users !== null && $username !== null && isset($users[$username])) {
    $background = $users[$username]['background'] ?? $background;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Yixboost Games | Free Unblocked Games</title>
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <meta property="og:title" content="Yixboost Games | Free Unblocked Games">
    <meta property="og:description" content="Play many Games for FREE on Yixboost Games! ">
    <meta property="og:image" content="http://yixboost.nl.eu.org/yixboost/yixboost-games-banner.png">
    <meta property="og:url" content="http://yixboost.nl.eu.org">
    <meta property="og:type" content="website">
    <meta name="description" content="Play many Games for FREE on Yixboost Games!">
    <meta name="keywords"
        content="Free Unblocked Games, Games, Gaming, Online Games, Unblocked Games, Free online Games">
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
    <link href="assets/cdn/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/cdn/fontawesome/all.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/cdn/swiper/swiper-bundle.min.css">

    <!-- Custom css for user theme -->
    <style>
        body {
            background-image: url(<?php echo htmlspecialchars($background); ?>);
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
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
                        <div class="search-input" style="display: none;">
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
                        if (isset($_GET['searchKeyword'])) {
                            $search = $_GET['searchKeyword'];
                            header("Location: search.php?q=$search");
                            exit();
                        }
                        ?>

                        <?php
                        if (isset($_GET['searchKeyword'])) {
                            $searchKeyword = $_GET['searchKeyword'];
                            $redirectUrl = "/search.php?q=" . urlencode($searchKeyword);
                            header("Location: $redirectUrl");
                            exit();
                        }
                        ?>

                        <ul class="nav">
                            <li><a href="index.php" class="active"><i class="fa-regular fa-home"></i> Home</a></li>
                            <li style="display: none;"><a href="/about.php"><i class="fa-solid fa-circle-info"></i> About</a></li>
                            <li><a href="https://www.youtube.com/@yixboost" target='_blank'><i
                                        class="fa-brands fa-youtube  "></i> Youtube</a></li>
                            <li><a href="https://discord.gg/tFSzDwGwZM" target='_blank'><i
                                        class="fa-brands fa-discord"></i> Discord</a></li>
                            <li style="display: none;"><a href="profile.php"><i class="ti-shift-left"></i>
                                    <?php
                                    if (isset($_SESSION['picture'])) {
                                        echo 'Profile';
                                    } else {
                                        echo 'Login';
                                    }
                                    ?>
                                    <img src="assets/images/profile-pictures/<?php
                                    if (isset($_SESSION['picture'])) {
                                        echo $_SESSION['picture'];
                                    } else {
                                        echo 'upload/user';
                                    }
                                    ?>
.png" alt="">
                                </a></li>
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
                    $bannersUrl = 'data/json/banners.json';
                    $bannersData = json_decode(file_get_contents($bannersUrl), true);
                    $randomBanner = $bannersData[array_rand($bannersData)];

                    $bannerBg = $randomBanner['background'] ?? '../assets/images/default-banner.jpg';
                    $bannerText1 = $randomBanner['text1'] ?? 'Welcome to Yixboost Games';
                    $bannerText2 = $randomBanner['text2'] ?? 'Discover More Fun!';
                    $bannerLink = $randomBanner['link'] ?? '#';
                    $bannerLinkText = $randomBanner['link_text'] ?? 'Learn More';
                    ?>

                    <div class="main-banner" id="banner1"
                        style="background-image: url(<?php echo $bannerBg; ?>); display: block;">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="header-text">
                                    <h6><?php echo $bannerText1; ?></h6>
                                    <h4><?php echo $bannerText2; ?></h4>
                                    <div class="main-button">
                                        <a href="<?php echo $bannerLink; ?>"
                                            target='_blank'><?php echo $bannerLinkText; ?></a>
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
                                <a href="profile.php" class="tile" target="_blank" style="display: none;">
                                    <div class="tile-content">
                                        <i class="fa-solid fa-user-ninja"></i>
                                        <span>Profile</span>
                                    </div>
                                </a>
                                <a href="background.php" class="tile" target="_blank" style="display: none;">
                                    <div class="tile-content">
                                        <i class="fa-solid fa-images"></i>
                                        <span>Background</span>
                                    </div>
                                </a>
                                <a href="p/focus-timer" class="tile" target="_blank" style="display: none;">
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
                        $jsonData = file_get_contents('data/json/games.json');
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

                                        $jsonData = file_get_contents('data/json/games.json');
                                        $games = json_decode($jsonData, true);
                                        $isAdmin = isset($_SESSION['username']) && $_SESSION['username'] === 'admin';

                                        if (!empty($games)) {
                                            uasort($games, function ($a, $b) {
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
                 <img src='{$gameImg}' alt='Game Image'>
                 <div class='hover-effect'>
                    <h6>{$gameDetails['views']} Views</h6>
                  </div>
              </div>
              <h4>{$gameDetails['name']}<br><span><i class='{$medalIcons[$gameCount]}'></i> #" . ($gameCount + 1) . "</span></h4>
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

                                    $jsonData = file_get_contents('data/json/games.json');
                                    $games = json_decode($jsonData, true);
                                    $isAdmin = isset($_SESSION['username']) && $_SESSION['username'] === 'admin';

                                    if (!empty($games)) {
                                        uasort($games, function ($a, $b) {
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
              <img src='{$gameImg}' alt='Game Image'>
              <h4>{$gameDetails['name']}<br><span><i class='{$medalIcons[$gameCount]}'></i> #" . ($gameCount + 1) . "</span></h4>
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
                                    ?>

                                    <!-- Suggest Game Banner -->
                                    <div class="container mt-4">
                                        <div class="banner-suggest-game" id="banner-suggest-game">
                                            <button class="banner-suggest-game-close-btn"
                                                onclick="closeBanner()">×</button>
                                            <img src="assets/images/controller.png" alt="Banner Image">
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

function formatViews($views)
{
    if ($views >= 1000) {
        $formattedViews = number_format($views / 1000, 1) . 'K';
    } else {
        $formattedViews = $views;
    }
    return $formattedViews;
}

$jsonData = file_get_contents('data/json/games.json');
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
        echo "<h2><i class='$iconClass'></i> {$category} <a href='{$moreUrl}' class='see-all-link' style='display:none;'>See all →</a></h2>";
        echo "<hr>";

        foreach ($games as $gameId => $game) {
            if ($game['cat'] == $category) {
                // Control of game is visible
                if (isset($game['visible']) && $game['visible'] == 0 && !$isAdmin) {
                    continue;
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
                                    <p>Created with ⚡ by <a href="https://jonasvanleeuwen19.github.io/"
                                            target='_blank'>Jonasvanleeuwen19</a> & <a
                                            href="https://valdtaniem.github.io/" target='_blank'>Valdtaniem</a></p>
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
                        <p style="display: none;"><a href='http://yixboost.nl.eu.org/yixboost/privacy'>Privacy Policy</a></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

        <!-- Scripts -->
        <!-- Bootstrap core JavaScript -->
        <script src="assets/cdn/jquery/jquery.min.js"></script>
        <script src="assets/cdn/bootstrap/js/bootstrap.min.js"></script>

        <!-- ScrollReveal -->
        <script src="assets/cdn/scrollreveal/scrollreveal.js"></script>

        <!-- Custom self-made JS scripts -->
        <script src="assets/js/fullscreen_banner.js"></script>
        <script src="assets/js/no_image.js"></script>
        <script src="assets/js/isotope.min.js"></script>
        <script src="assets/js/owl-carousel.js"></script>
        <script src="assets/js/tabs.js"></script>
        <script src="assets/js/popup.js"></script>
        <script src="assets/js/custom.js"></script>
        <script src="assets/js/scrolltotop_button.js"></script>
        <script src="assets/js/reload_css.js"></script>
        <script src="assets/js/suggest_game_banner.js"></script>

        <!-- Auto Translate Script -->
        <div class="gtranslate_wrapper"></div>
        <script>window.gtranslateSettings = { "default_language": "en", "native_language_names": true, "detect_browser_language": false, "languages": ["en", "nl", "fr", "de", "pt", "it", "es"], "wrapper_selector": ".gtranslate_wrapper" }</script>
        <script src="https://cdn.gtranslate.net/widgets/latest/lc.js" defer></script>
</body>

</html>