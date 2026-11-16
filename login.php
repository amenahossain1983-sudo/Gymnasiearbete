<?php
require_once 'assets/functions.php';
session_start();
if (isset($_SESSION['username'])) {
    header('Location: profil.php');
    exit();
}

$error = false;
$next = isset($_GET['next']) && in_array($_GET['next'], ['boka.php', 'profil.php'], true)
    ? $_GET['next']
    : 'profil.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (login($username, $password)) {
        $user = getInfo($username);
        session_regenerate_id(true);
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        header('Location: ' . $next);
        exit();
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logga in - Klippdig.Nu</title>
    <link rel="stylesheet" href="css/forum.css">
</head>
<body>
    <main class="container page-body">
        <section class="page-header">
            <h1>Logga in</h1>
            <p>Logga in för att se din profil och dina bokningar.</p>
        </section>
        <section class="page-card">
            <?php if ($error): ?>
                <p class="notice error">Fel användarnamn eller lösenord. Försök igen.</p>
            <?php endif; ?>
            <form method="post" action="login.php?next=<?php echo htmlspecialchars($next, ENT_QUOTES, 'UTF-8'); ?>">
                <p>
                    <label for="username">Användarnamn</label>
                    <input type="text" id="username" name="username" required autocomplete="username">
                </p>
                <p>
                    <label for="password">Lösenord</label>
                    <input type="password" id="password" name="password" required autocomplete="current-password">
                </p>
                <button type="submit" class="btn primary">Logga in</button>
            </form>
            <p><a href="signup.php">Saknar du konto? Skapa ett här.</a></p>
        </section>
    </main>
</body>
</html>