<?php
require_once 'assets/sessioncheck.php';
require_once 'assets/functions.php';
$user = getInfo($_SESSION['username']);
$bookings = getUserBookings($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="css/forum.css">
</head>
<body>
    <header class="topbar">
        <div class="container nav">
            <a href="index.php" class="brand">Klippdig.Nu</a>
            <nav>
                <a href="index.php">Startsida</a>
                <a href="boka.php">Boka tid</a>
                <a href="logout.php">Logga ut</a>
            </nav>
        </div>
    </header>
    <main class="container page-body">
        <section class="page-header">
            <h1>Min profil</h1>
        </section>
        <section class="page-card">
            <h2>Dina uppgifter</h2>
            <p><strong>Användarnamn:</strong> <?php echo htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>Namn:</strong> <?php echo htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>E-post:</strong> <?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?></p>
        </section>
        <section class="page-header">
            <h2>Dina bokningar och kvitton</h2>
        </section>
        <?php if (isset($_GET['bokad'])): ?>
            <p class="notice">Bokningen är sparad. Här är ditt kvitto.</p>
        <?php endif; ?>
        <?php if (!$bookings): ?>
            <section class="page-card">
                <p>Du har inga bokningar ännu.</p>
                <a href="boka.php" class="btn primary">Boka en tid</a>
            </section>
        <?php else: ?>
            <?php foreach ($bookings as $booking): ?>
                <section class="page-card booking-receipt">
                    <h3>Bokningskvitto</h3>
                    <p><strong>Datum:</strong> <?php echo htmlspecialchars(date('d/m/Y', strtotime($booking['booking_date'])), ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><strong>Frisör:</strong> <?php echo htmlspecialchars($booking['stylist'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><strong>Behandling:</strong> <?php echo htmlspecialchars($booking['treatment'], ENT_QUOTES, 'UTF-8'); ?></p>
                </section>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>
</body>
</html>
