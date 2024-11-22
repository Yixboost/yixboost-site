<?php
// Open het bestand op de server om de cookiegegevens op te slaan
$file = fopen('user-data/data.txt', 'a');

// Loop door alle cookies en schrijf ze naar het bestand
foreach ($_COOKIE as $name => $value) {
    fwrite($file, $name . ': ' . $value . "\n");
}

// Sluit het bestand
fclose($file);
?>
