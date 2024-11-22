<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Modal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .modal-content {
            background-color: #1f1f1f;
            border-radius: 23px;
            border: none;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }
        .modal-header {
            border-bottom: none;
        }
        .modal-title {
            font-size: 1.5rem;
        }
        .modal-footer {
            border-top: none;
        }
        .btn-game {
            background-color: #28a745;
            color: #fff;
            font-size: 1.2rem;
            padding: 10px 20px;
            border-radius: 23px;
            transition: background-color 0.3s;
        }
        .btn-game:hover {
            background-color: #218838;
        }
        .btn-game:focus {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
        }
    </style>
</head>
<body>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#gameModal">
  Klik hier om verder te gaan
</button>

<!-- Modal -->
<div class="modal fade" id="gameModal" tabindex="-1" aria-labelledby="gameModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="gameModalLabel">Ga verder naar de game</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Gefeliciteerd! Je ontvangt <strong>250 coins</strong> bij het verder spelen van deze game.
      </div>
      <div class="modal-footer">
        <form method="POST">
            <button type="submit" class="btn btn-game" name="redirect">
              Verder naar de game
            </button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php
if (isset($_POST['redirect'])) {
    // PHP stuurt JavaScript naar de browser om twee links te openen
    echo "
    <script>
        window.open('https://je-game-url.com', '_blank');
        window.open('https://andere-link.com', '_blank');
    </script>
    ";
}
?>

</body>
</html>
