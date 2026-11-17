<?php
require_once 'assets/functions.php';
session_start();

if (isset($_SESSION['username'])) {
    header('Location: profil.php');
    exit();
}

$error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';

    if ($username !== '' && $name !== '' && $email && $password !== '') {
        $user = [
            'username' => $username,
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        if (addUser($user)) {
            session_regenerate_id(true);
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header('Location: profil.php');
            exit();
        }
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skapa konto - Klippdig.Nu</title>
    <link rel="stylesheet" href="css/forum.css">
</head>
<body>
    <main class="container page-body">
        <section class="page-header">
            <h1>Skapa konto</h1>
        </section>
        <section class="page-card">
            <?php if ($error): ?>
                <p class="notice error">Kontrollera uppgifterna. Användarnamnet kan redan vara upptaget.</p>
            <?php endif; ?>
            <form method="post" action="signup.php">
                <p><label for="username">Användarnamn</label><input type="text" id="username" name="username" required autocomplete="username"></p>
                <p><label for="name">Namn</label><input type="text" id="name" name="name" required autocomplete="name"></p>
                <p><label for="email">E-post</label><input type="email" id="email" name="email" required autocomplete="email"></p>
                <p><label for="password">Lösenord</label><input type="password" id="password" name="password" required autocomplete="new-password"></p>
                <button type="submit" class="btn primary">Skapa konto</button>
            </form>
            <p><a href="login.php">Har du redan ett konto? Logga in.</a></p>
        </section>
    </main>
</body>
</html>
