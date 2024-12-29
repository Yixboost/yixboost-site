<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe Game Toevoegen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Nieuwe Game Toevoegen</h2>
    <form method="POST">
        <div class="form-group">
            <label for="key">Sleutel ID</label>
            <input type="text" class="form-control" id="key" name="key" required>
        </div>
        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="cat">Categorie</label>
            <input type="text" class="form-control" id="cat" name="cat" required>
        </div>
        <div class="form-group">
            <label for="iframe">Iframe URL (optioneel)</label>
            <input type="text" class="form-control" id="iframe" name="iframe">
        </div>
        <div class="form-group">
            <label for="image">Afbeeldings-URL (optioneel)</label>
            <input type="text" class="form-control" id="image" name="image">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="visible" name="visible">
            <label class="form-check-label" for="visible">Zichtbaar</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Toevoegen</button>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $key = $_POST['key'];
    $name = $_POST['name'];
    $cat = $_POST['cat'];
    $iframe = $_POST['iframe'] ?? '';
    $image = $_POST['image'] ?? '';
    $visibleChecked = isset($_POST['visible']);

    $newGame = [
        $key => [
            'name' => $name,
            'cat' => $cat,
            'new' => 0,
            'views' => 0
        ]
    ];

    if ($visibleChecked) {
        $newGame[$key]['visible'] = 0;
    }
    if (!empty($iframe)) {
        $newGame[$key]['iframe'] = $iframe;
    }
    if (!empty($image)) {
        $newGame[$key]['image'] = $image;
    }

    // Laad de huidige games
    $file = 'games.json';
    $games = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    
    // Voeg de nieuwe game toe
    $games = array_merge($games, $newGame);

    // Sla de games weer op met pretty print
    file_put_contents($file, json_encode($games, JSON_PRETTY_PRINT));
    
    echo "<div class='alert alert-success mt-3'>De game is succesvol toegevoegd!</div>";
}
?>
</body>
</html>
