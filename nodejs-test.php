<?php
// Controleer of 'node' command beschikbaar is
$nodeVersion = shell_exec("node -v 2>&1");

if (strpos($nodeVersion, 'v') === 0) {
    echo "Node.js is geïnstalleerd. Versie: " . $nodeVersion;
} else {
    echo "Node.js is niet geïnstalleerd of het pad is niet ingesteld.<br>";
    echo "Je kunt Node.js installeren door de volgende commando's uit te voeren:<br><br>";
    echo "<pre>
    1. Log in op je Synology NAS via SSH.
    2. Voer het volgende commando uit om Node.js te installeren via Synology Package Center:
       sudo synopkg install Node.js-v14
    3. Controleer de installatie door 'node -v' uit te voeren.
    </pre>";
}
?>
