<?php
session_start();

$errMsg = "";

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validateDateOfBirth($dob) {
    $minAge = new DateTime('now - 6 years');
    $inputDate = new DateTime($dob);
    return $inputDate <= $minAge;
}

$cookieName = 'last_registration_date';
if (isset($_COOKIE[$cookieName])) {
    $lastRegistrationDate = strtotime($_COOKIE[$cookieName]);
    $today = strtotime(date("Y-m-d"));

    // Limit one registration per day (24 hours)
    if ($today - $lastRegistrationDate < 86400) { // 86400 seconds in a day
        $errMsg = "You can only create one account per day. Please try again tomorrow.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errMsg)) { // Proceed only if no cookie restriction or other error
    $username = sanitize($_POST["username"]);
    $password = sanitize($_POST["password"]);
    $confirmPassword = sanitize($_POST["confirm_password"]);
    $email = sanitize($_POST["email"]);
    $dob = sanitize($_POST["dob"]);

    if (!empty($username) && !empty($password) && !empty($confirmPassword) && !empty($email) && !empty($dob)) {
        if (validateEmail($email)) {
            if (validateDateOfBirth($dob)) {
                if ($password === $confirmPassword) {
                    $file = __DIR__ . '/../data/json/logins.json';
                    $current_data = file_get_contents($file);
                    $data = json_decode($current_data, true);

                    if (isset($data[$username])) {
                        $errMsg = "Username already exists. Please choose a different username.";
                    } else {
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $random_picture = rand(1, 200); // Random number between 1 and 200

                        $data[$username] = [
                            'hashed_password' => $hashed_password,
                            'email' => $email,
                            'picture' => $random_picture,
                            'created_at' => date("Y-m-d H:i:s") // Add the creation date and time
                        ];

                        // Write JSON data with pretty printing
                        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

                        header("Location: index.php");
                        exit(); // Stop further execution

                        // Set cookie to prevent same-day registration attempts
                        setcookie($cookieName, date("Y-m-d"), time() + 86400, '/'); // Expires after 24 hours
                    }
                } else {
                    $errMsg = "Passwords do not match.";
                }
            } else {
                $errMsg = "Invalid date of birth. You must be at least 6 years old.";
            }
        } else {
            $errMsg = "Invalid email address.";
        }
    } else {
        $errMsg = "All fields are required.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Intergalactic Sign-Up | Yixboost Account</title>
<link rel="stylesheet" href="/assets/css/register_styles.css">
</head>
<body>

<div class="terminal">
  <h1 class="title">Galactic Adventure Awaits</h1>
  <p>Prepare for initiation. Step into the cosmic unknown.</p>
  
  <div class="form-container">
    <form id="signupForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

      <div class="form-step active" id="step-1">
        <label>Identification Code:</label>
        <input type="text" name="username" placeholder="Enter your Username" required>
      </div>

      <div class="form-step" id="step-2">
        <label>Transmission Address (Email):</label>
        <input type="email" name="email" placeholder="Enter your Email" required>
      </div>

      <div class="form-step" id="step-3">
        <label>Access Key:</label>
        <input type="password" name="password" placeholder="Set a Password" required>
      </div>

      <div class="form-step" id="step-4">
        <label>Confirm Access Key:</label>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
      </div>

      <div class="form-step" id="step-5">
        <label>Star Date of Birth:</label>
        <input type="date" name="dob" required>
      </div>

      <button type="button" class="next-button" onclick="nextStep()">Next</button>

    </form>
  </div>
</div>

<script>
  let currentStep = 1;

  function nextStep() {
    const current = document.getElementById(`step-${currentStep}`);
    current.classList.remove('active');
    currentStep++;

    const next = document.getElementById(`step-${currentStep}`);
    if (next) {
      next.classList.add('active');
    } else {
      document.querySelector('.next-button').textContent = 'Launching...';
      setTimeout(() => {
        document.getElementById('signupForm').submit();
      }, 1000);
    }
  }

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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
      $(document).ready(function () {
          // Voeg een eventlistener toe aan de invoervelden om te reageren op het veranderen van de inhoud
          $('input[name="username"], input[name="password"], input[name="confirm_password"], input[name="email"], input[name="dob"]').on('input', function () {
              var username = $('input[name="username"]').val();
              var password = $('input[name="password"]').val();
              var confirmPassword = $('input[name="confirm_password"]').val();
              var email = $('input[name="email"]').val();
              var dob = $('input[name="dob"]').val();
  
              // Voer AJAX-verzoek uit om de invoervelden te valideren
              $.ajax({
                  url: 'validate.php', // Verander dit naar de URL van je validatiescript op de server
                  method: 'POST',
                  data: {
                      username: username,
                      password: password,
                      confirm_password: confirmPassword,
                      email: email,
                      dob: dob
                  },
                  success: function (response) {
                      // Update de foutmelding met de ontvangen feedback van de server
                      $('.error').html(response);
                  }
              });
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
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7KHGF44319" type="text/javascript"></script>
</body>
</html>
