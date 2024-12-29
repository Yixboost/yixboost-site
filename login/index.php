<?php
session_start();

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitize($_POST["username"]);
    $password = sanitize($_POST["password"]);
    $file = __DIR__ . '/../data/json/logins.json';

    if (file_exists($file) && is_readable($file)) {
        $current_data = file_get_contents($file);
        $data = json_decode($current_data, true);

        if (json_last_error() === JSON_ERROR_NONE) {
            if (isset($data[$username])) {
                if ($data[$username]['hashed_password'] === $password || password_verify($password, $data[$username]['hashed_password'])) {
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $data[$username]['email'];
                    $_SESSION['picture'] = $data[$username]['picture'];

                    $redirect = "succes.php";
                    header("Location: $redirect");
                    exit();
                } else {
                    $login_error = "Ongeldig wachtwoord. Probeer het opnieuw.";
                }
            } else {
                $login_error = "Gebruikersnaam niet gevonden. Probeer het opnieuw.";
                echo "<p>Username: $username</p>";
                echo "<p>Password: $password</p>";
            }
        } else {
            $login_error = "Fout bij het decoderen van JSON-gegevens.";
        }
    } else {
        $login_error = "Login-gegevensbestand niet gevonden of niet leesbaar.";
    }
}

if (isset($login_error)) {
    echo "<p>$login_error</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Intergalactic Login | Yixboost Account</title>
<link rel="stylesheet" href="/assets/css/login_styles.css">
</head>
<body>

<div class="terminal">
  <h1 class="title">Intergalactic Login</h1>
  <p>Welcome back, Traveler. Access the cosmic gateway.</p>
  
  <div class="form-container">
    <form id="loginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

      <div class="form-step">
        <label>Identification Code (Username):</label>
        <input type="text" name="username" placeholder="Enter your Username" required>
      </div>

      <div class="form-step">
        <label>Access Key (Password):</label>
        <input type="password" name="password" placeholder="Enter your Password" required>
      </div>

      <button type="submit" class="login-button">Log In</button>

    </form>
  </div>
</div>

<script>
  // Generate Particle Effect
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
