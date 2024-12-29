<?php
session_start();

// Vernietig alle sessievariabelen
$_SESSION = array();

// Als je cookies gebruikt, moet je deze ook verwijderen
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Vernietig de sessie
session_destroy();

// Stuur de gebruiker terug naar het inlogscherm of een andere pagina
header("Location: http://yixboost.nl.eu.org/yixboost/"); // Vervang login.html door de pagina waar je naartoe wilt sturen na uitloggen
exit;
?>
