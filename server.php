<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Info</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        .language {
            font-weight: bold;
            color: #007BFF;
        }

        .libraries {
            margin-left: 20px;
            color: #28A745;
        }

        i {
            color: #71299e;
        }
    </style>
</head>

<body>
    <h1>Server Information</h1>

    <?php
    // Check for Python
    $pythonInstalled = shell_exec('python --version 2>&1');
    ?>

    <?php if ($pythonInstalled): ?>
        <ul>
            <li><span class="language"><i class="fab fa-python"></i> Python:</span>
                <?= $pythonInstalled; ?>
            </li>
        </ul>
    <?php else: ?>
        <p><span class="language"><i class="fab fa-python"></i> Python</span> is not installed.</p>
    <?php endif; ?>

    <ul>
        <?php
        echo '<li><span class="language"><i class="fab fa-php"></i> PHP:</span> ' . phpversion() . '</li>';

        $nodejsInstalled = exec('command -v node 2>&1');
        if ($nodejsInstalled) {
            echo '<li><span class="language"><i class="fab fa-node-js"></i> Node.js:</span> ' . shell_exec('node -v 2>&1') . '</li>';
        } else {
            echo '<li><span class="language"><i class="fab fa-node-js"></i> Node.js:</span> Not installed.</li>';
        }

        $typescriptInstalled = exec('command -v tsc 2>&1');
        if ($typescriptInstalled) {
            echo '<li><span class="language"><i class="fab fa-js"></i> TypeScript:</span> ' . shell_exec('tsc -v 2>&1') . '</li>';
        } else {
            echo '<li><span class="language"><i class="fab fa-js"></i> TypeScript:</span> Not installed.</li>';
        }

        $rubyInstalled = exec('command -v ruby 2>&1');
        if ($rubyInstalled) {
            echo '<li><span class="language"><i class="fas fa-gem"></i> Ruby:</span> ' . shell_exec('ruby -v 2>&1') . '</li>';
        } else {
            echo '<li><span class="language"><i class="fas fa-gem"></i> Ruby:</span> Not installed.</li>';
        }

        $composerInstalled = exec('command -v composer 2>&1');
        if ($composerInstalled) {
            echo '<li><span class="language"><i class="fas fa-puzzle-piece"></i> Composer:</span> ' . shell_exec('composer -v 2>&1') . '</li>';
        } else {
            echo '<li><span class="language"><i class="fas fa-puzzle-piece"></i> Composer:</span> Not installed.</li>';
        }
        ?>
    </ul>

    <h2>Network Information</h2>

    <ul>
<?php
$serverName = php_uname('n');
$serverLocation = 'Netherlands';

echo '<li><span class="language"><i class="fas fa-server"></i> Server Name:</span> ' . $serverName . '</li>';
echo '<li><span class="language"><i class="fas fa-map-marker-alt"></i> Server Location:</span> ' . $serverLocation . '</li>';

$serverIp = $_SERVER['SERVER_ADDR'];
$serverDomain = $_SERVER['SERVER_NAME'];
$serverhttp = $_SERVER['HTTP_USER_AGENT'];

echo '<li><span class="language"><i class="fas fa-network-wired"></i> Server IP Address:</span> ' . $serverIp . '</li>';
echo '<li><span class="language"><i class="fas fa-globe"></i> Server Domain:</span> ' . $serverDomain . '</li>';
echo '<li><span class="language"><i class="fa-brands fa-firefox-browser"></i> User Browser:</span> ' . $serverhttp . '</li>';

$networkInfo = shell_exec('ifconfig');

echo '<li><span class="language"><i class="fas fa-network-wired"></i> Network Information:</span> <pre>' . htmlspecialchars($networkInfo) . '</pre></li>';

$serverOS = php_uname('s');
$serverOSVersion = php_uname('v');

echo '<li><span class="language"><i class="fas fa-laptop"></i> Operating System:</span> ' . $serverOS . ' ' . $serverOSVersion . '</li>';

// Get total and free disk space
$diskTotalSpace = disk_total_space('/');
$diskFreeSpace = disk_free_space('/');

echo '<li><span class="language"><i class="fas fa-hdd"></i> Total Disk Space:</span> ' . formatBytes($diskTotalSpace) . '</li>';
echo '<li><span class="language"><i class="fas fa-hdd"></i> Free Disk Space:</span> ' . formatBytes($diskFreeSpace) . '</li>';

// Function to format bytes into readable format
function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    return round($bytes, $precision) . ' ' . $units[$pow];
}
?>

    </ul>
    <h2>Installed Libraries</h2>
    <ul>
        <?php
        $pythonLibraries = shell_exec('python -m site 2>&1');
        if ($pythonInstalled && $pythonLibraries) {
            preg_match('/user site-packages: (.+)/', $pythonLibraries, $matches);
            $sitePackagesPath = isset($matches[1]) ? trim($matches[1]) : '';

            if ($sitePackagesPath) {
                $pythonLibraries = shell_exec('ls ' . $sitePackagesPath);
                echo '<li><span class="language"><i class="fab fa-python"></i> Python Libraries:</span> ' . $pythonLibraries . '</li>';
            } else {
                echo '<li><span class="language"><i class="fab fa-python"></i> Python Libraries:</span> No site-packages directory found.</li>';
            }
        }

        $phpLibraries = shell_exec('php -m 2>&1');
        if ($phpLibraries) {
            echo '<li><span class="language"><i class="fab fa-php"></i> PHP Libraries:</span> ' . $phpLibraries . '</li>';
        }

        $nodejsLibraries = shell_exec('npm list -g --depth=0 2>&1');
        if ($nodejsInstalled && $nodejsLibraries) {
            echo '<li><span class="language"><i class="fab fa-node-js"></i> Node.js Libraries:</span> ' . $nodejsLibraries . '</li>';
        }
        ?>
    </ul>
</body>

</html>