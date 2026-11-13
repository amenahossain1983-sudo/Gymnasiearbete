<?php
session_start();
if (!isset($_SESSION['username'])) {
    $next = basename($_SERVER['SCRIPT_NAME']) === 'boka.php' ? 'boka.php' : 'profil.php';
    header('Location: login.php?next=' . $next);
    exit();
}
?>

