<?php
// GET Game information
$gameid = $_GET['id'];
$json_file = __DIR__ . '/../data/json/games.json';
$jsonData = file_get_contents($json_file);
$games = json_decode($jsonData, true);

if (array_key_exists($gameid, $games)) {
  $game = $games[$gameid];
  $cat = $game['cat'];
  $name = $game['name'];


  if (isset($game['iframe'])) {
    $iframe = $game['iframe'];
  } else {
    $iframe = $gameid . "/";
  }
} else {
  echo "Game not found";
}
?>
<?php
//Update game views counter
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

<!DOCTYPE html>
<html>

<head>
  <link rel="icon" href="http://yixboost.nl.eu.org/yixboost/games/<?php echo $gameid; ?>/<?php echo $gameid; ?>.png"
    type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://kit.fontawesome.com/6948f435f5.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/assets/cdn/bootstrap/css/bootstrap.min.css">

  <title><?php echo $name; ?> Unblocked | Yixboost Games</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    .game-container {
      position: relative;
      width: 100%;
      height: calc(100vh - 50px);
    }

    .game-iframe {
      width: 100%;
      height: 100%;
      border: none;
    }

    .bottom-bar {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 50px;
      background-color: black;
      color: white;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 10px;
      border-top: 1px solid white;
    }

    .logo img {
      height: 40px;
      width: auto;
    }

    .icons {
      display: flex;
      gap: 10px;
      margin-right: 20px;
    }

    .icons i {
      font-size: 20px;
    }

    .icons i:hover {
      transform: rotate(10deg);
      transition: transform 0.2s ease;
    }

    h2 {
      color: #ffffff;
      text-align: center;
      margin-top: 40px;
    }

    button,
    .modal-content,
    a {
      border-radius: 23px !important;
    }

    .modal-content {
      background-color: #1b1b1b;
      border: none;
    }

    .modal-header {
      background-color: #1f1f1f;
      color: #ffffff;
      border-bottom: none;
    }

    .modal-footer {
      border-top: none;
    }

    .close {
      color: #ffffff;
      opacity: 0.8;
    }

    .close:hover {
      opacity: 1;
    }

    .modal-body {
      padding: 20px;
    }

    .share-btn {
      font-size: 18px;
      margin: 10px 0;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 15px;
      color: white;
      border-radius: 23px;
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      border: none;
      width: 100%;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    }

    .share-btn i {
      margin-right: 12px;
      font-size: 20px;
    }

    .share-btn:hover {
      opacity: 0.9;
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.4);
    }

    .share-copy {
      background-color: #505050;
    }

    .share-whatsapp {
      background-color: #25d366;
    }

    .share-teams {
      background-color: #6264a7;
    }

    .share-qr {
      background-color: #343a40;
    }

    .share-snapchat {
      background-color: #fffc00;
      color: #000;
    }

    .copied {
      background-color: #28a745 !important;
      transition: background-color 0.2s ease;
    }

    #copyInput {
      position: absolute;
      left: -9999px;
    }

    button,
    .btn {
      background-color: #333333;
      color: #ffffff;
      padding: 10px 20px;
      border: none;
      text-decoration: none;
      display: inline-block;
      transition: background-color 0.3s ease;
      font-size: 16px;
      cursor: pointer;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
      border-radius: 23px;
    }

    .btn-secondary {
      background-color: #444444;
    }

    .btn-secondary:hover {
      background-color: #555555;
    }

    #qrCodeImage {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
      max-width: 100%;
    }

    @media (max-width: 768px) {

      .modal-content,
      .share-btn {
        border-radius: 23px;
      }
    }
  </style>
</head>

<body>
  <div class="game-container">
    <iframe class="game-iframe" src="<?php echo $iframe; ?>"></iframe>
  </div>
  <div class="bottom-bar">
    <div class="logo"><a href='http://yixboost.nl.eu.org/yixboost/' target='_blank'><img
          src='images/game-page-logo.png'></a></div>
    <div class="icons">
      <i class="fas fa-rotate-right" id="reloadIcon"></i>
      <i class="fas fa-share-alt" data-toggle="modal" data-target="#shareModal"></i>
      <i class="fas fa-expand" id="expandButton"></i>
    </div>
  </div>

  <!-- Share Modal -->
  <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="shareModalLabel">Share this Game</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <button class="share-btn share-copy" id="shareCopy"><i class="fas fa-copy"></i> Copy Link</button>
          <button class="share-btn share-whatsapp" id="shareWhatsApp"><i class="fab fa-whatsapp"></i> Share on
            WhatsApp</button>
          <button class="share-btn share-teams" id="shareTeams"><i class="fab fa-microsoft-teams"></i> Share on
            Microsoft Teams</button>
          <button class="share-btn share-qr" id="shareQRCode"><i class="fas fa-qrcode"></i> QR Code</button>
          <button class="share-btn share-snapchat" id="shareSnapchat"><i class="fab fa-snapchat"></i> Share on
            Snapchat</button>
          <input type="text" id="copyInput" value="http://yixboost.nl.eu.org/yixboost/games/<?php echo $gameid; ?>" />
        </div>
      </div>
    </div>
  </div>

  <!-- QR Code Modal -->
  <div class="modal fade" id="qrCodeModal" tabindex="-1" role="dialog" aria-labelledby="qrCodeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="qrCodeModalLabel">QR Code for this Game</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img id="qrCodeImage" src="" alt="QR Code">
        </div>
      </div>
    </div>
  </div>

  <!-- Ads Modal -->
  <div class="modal fade" id="epicModal" tabindex="-1" aria-labelledby="epicModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title cool-text" id="epicModalLabel">Support Our Site!</h5>
        </div>
        <div class="modal-body">
          <h2 class="cool-text mb-4">help keep this site running!</h2>
          <p>To help keep this site running and free, please take a moment to click on the skip button that
            opens an ad page. Thank you for your patience and support!</p>
          <div class="text-center">
            <p id="countdown" class="fw-bold" style="font-size: 1.5em;">This will close in 30 seconds...</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary cool-text" onclick="skipAndOpen()">Skip and open and
            ad</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.addEventListener('contextmenu', function (e) {
      e.preventDefault();
      var contextMenu = document.getElementById('contextmenu');
      contextMenu.style.top = e.clientY + 'px';
      contextMenu.style.left = e.clientX + 'px';
      contextMenu.style.visibility = 'visible';
    });

    document.addEventListener('click', function () {
      var contextMenu = document.getElementById('contextmenu');
      contextMenu.style.visibility = 'hidden';
    });

    document.getElementById('reloadIcon').addEventListener('click', function () {
      location.reload();
    });

    document.getElementById('expandButton').addEventListener('click', function () {
      var gameIframe = document.querySelector('.game-iframe');
      if (gameIframe.requestFullscreen) {
        gameIframe.requestFullscreen();
      } else if (gameIframe.mozRequestFullScreen) { /* Firefox */
        gameIframe.mozRequestFullScreen();
      } else if (gameIframe.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
        gameIframe.webkitRequestFullscreen();
      } else if (gameIframe.msRequestFullscreen) { /* IE/Edge */
        gameIframe.msRequestFullscreen();
      }
    });

    document.getElementById('shareCopy').addEventListener('click', function () {
      var copyInput = document.getElementById('copyInput');
      copyInput.select();
      document.execCommand('copy');
      this.classList.add('copied');
      setTimeout(() => this.classList.remove('copied'), 2000);
    });

    document.getElementById('shareWhatsApp').addEventListener('click', function () {
      var gameURL = document.getElementById('copyInput').value;
      var whatsappURL = `https://api.whatsapp.com/send?text=${encodeURIComponent(gameURL)}`;
      window.open(whatsappURL, '_blank');
    });

    document.getElementById('shareTeams').addEventListener('click', function () {
      var gameURL = document.getElementById('copyInput').value;
      var teamsURL = `https://teams.microsoft.com/l/meetup-join/19%3ameetup-join%3a${encodeURIComponent(gameURL)}`;
      window.open(teamsURL, '_blank');
    });

    document.getElementById('shareSnapchat').addEventListener('click', function () {
      var gameURL = document.getElementById('copyInput').value;
      var snapchatURL = `https://www.snapchat.com/scan?attachment=${encodeURIComponent(gameURL)}`;
      window.open(snapchatURL, '_blank');
    });

    document.getElementById('shareQRCode').addEventListener('click', function () {
      $('#qrCodeModal').modal('show');
      var qrCodeURL = document.getElementById('copyInput').value;
      document.getElementById('qrCodeImage').src = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${encodeURIComponent(qrCodeURL)}`;
    });
  </script>
</body>

</html>