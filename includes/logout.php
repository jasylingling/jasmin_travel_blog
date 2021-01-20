<?php
session_start();

// cleanup variables data
$_SESSION = array();
session_unset();

// delete the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"],
        $params["domain"], $params["secure"], $params["httponly"]
    );
}

// destroy the session and redirect to login page
session_destroy();
header('Location: ../pages/login');
?>

