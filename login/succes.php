<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    if (isset($_SESSION['picture'])) {
        $picture = $_SESSION['picture'];
    } else {
        // Default picture if none is set
        $picture = 'default';
    }
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Success | Yixboost Account</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbv5/5.15.1/css/mdb.min.css" rel="stylesheet" />
  
  <style>
    body {
      background: radial-gradient(circle at center, #0a0d2c, #000) fixed;
      color: #ffffff;
      font-family: 'Courier New', monospace;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      overflow: hidden;
      animation: backgroundPulse 5s infinite;
    }

    @keyframes backgroundPulse {
      0%, 100% { background: radial-gradient(circle at center, #0a0d2c, #000); }
      50% { background: radial-gradient(circle at center, #1a237e, #000); }
    }

    .container {
      background: rgba(15, 23, 42, 0.85);
      border-radius: 10px;
      padding: 30px;
      text-align: center;
      width: 80%;
      max-width: 500px;
      box-shadow: 0px 0px 30px rgba(59, 130, 246, 0.7);
    }

    .title {
      font-size: 2rem;
      color: #60a5fa;
      text-shadow: 0 0 20px rgba(59, 130, 246, 0.7);
      animation: textPulse 3s infinite;
    }

    @keyframes textPulse {
      0%, 100% { text-shadow: 0 0 10px rgba(59, 130, 246, 0.5); }
      50% { text-shadow: 0 0 30px rgba(59, 130, 246, 0.8); }
    }

    .profile-img {
      width: 75px;
      height: 75px;
      border-radius: 50%;
      margin-bottom: 20px;
    }

    .btn-primary {
      background-color: #6f42c1;
      border-color: #6f42c1;
      border-radius: 20px;
      padding: 12px 25px;
      margin-top: 15px;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #8e44ce;
    }

    .particle {
      position: absolute;
      width: 5px;
      height: 5px;
      background: #3b82f6;
      border-radius: 50%;
      animation: drift 5s linear infinite;
      opacity: 0.75;
      pointer-events: none;
    }

    @keyframes drift {
      from { transform: translateY(0); opacity: 0.75; }
      to { transform: translateY(-50vh); opacity: 0; }
    }
  </style>
</head>
<body>

  <div class="container">
    <img src="/yixboost/profile-pictures/<?php echo $picture; ?>.png" alt="Profile Picture" class="profile-img">
    <p class="title">Welcome, <?php echo str_replace('_', ' ', $username); ?>!</p>
    <h2>You are now logged in!</h2>
    <a href="/yixboost/index.php" class="btn btn-primary">Go to Homepage</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
  <script>
    // Particle confetti effect
    var duration = 15 * 1000;
    var animationEnd = Date.now() + duration;
    var defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

    function randomInRange(min, max) {
      return Math.random() * (max - min) + min;
    }

    var interval = setInterval(function() {
      var timeLeft = animationEnd - Date.now();

      if (timeLeft <= 0) {
        return clearInterval(interval);
      }

      var particleCount = 50 * (timeLeft / duration);
      confetti({ ...defaults, particleCount, origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 } });
      confetti({ ...defaults, particleCount, origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 } });
    }, 250);
  </script>
  <script>
    // Generate Particles
    function createParticle() {
      const particle = document.createElement('div');
      particle.classList.add('particle');
      particle.style.left = Math.random() * window.innerWidth + 'px';
      document.body.appendChild(particle);
      setTimeout(() => particle.remove(), 5000);
    }
    setInterval(createParticle, 100);
  </script>

</body>
</html>
