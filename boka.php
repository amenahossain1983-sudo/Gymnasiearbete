<?php
$title = "Boka - Klippdig.Nu";
require_once 'assets/sessioncheck.php';
require_once 'assets/functions.php';

$stylists = ['Emma', 'Lucas', 'Sarah'];
$treatments = ['Klipp', 'Färg', 'Styling'];
$error = false;
$alreadyBooked = count(getUserBookings($_SESSION['username'])) > 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'] ?? '';
    $stylist = $_POST['stylist'] ?? '';
    $treatment = $_POST['behandling'] ?? '';
    $dateValue = DateTime::createFromFormat('Y-m-d', $date);

    if (
        $dateValue
        && $dateValue->format('Y-m-d') === $date
        && $date >= date('Y-m-d')
        && in_array($stylist, $stylists, true)
        && in_array($treatment, $treatments, true)
    ) {
        if (addBooking($_SESSION['username'], $date, $stylist, $treatment)) {
            header('Location: profil.php?bokad=1');
            exit();
        }

        $alreadyBooked = true;
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
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/forum.css">
</head>
<body>
    <header class="topbar">
        <div class="container nav">
            <div class="brand">Klippdig.Nu</div>
            <nav>
                <a href="index.php">Index</a>
                <a href="frisor.php">Frisör</a>
                <a href="frisyr.php">Frisyr</a>
                <a href="tider.php">Tider</a>
                <a href="info.php">Info</a>
                <a href="boka.php" class="active">Boka</a>
                <a href="profil.php">Min profil</a>
                <a href="logout.php">Logga ut</a>
            </nav>
        </div>
    </header>

    <main class="container page-body">
        <section class="page-header">
            <h1>Boka tid</h1>
        </section>

        <section class="page-card">
            <?php if ($error): ?>
                <p class="notice error">Kontrollera datum, frisör och behandling och försök igen.</p>
            <?php endif; ?>
            <?php if ($alreadyBooked): ?>
                <p class="notice">Det här kontot har redan bokat en tid. Du kan bara boka en tid per konto.</p>
                <p><a href="profil.php">Visa bokningen på din profil</a></p>
            <?php else: ?>
                <p>Bokningen sparas på ditt konto: <strong><?php echo htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8'); ?></strong></p>
                <form method="post" action="boka.php">
                    <p><label for="date">Datum:</label>
                        <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" required>
                    </p>
                    <p><label for="stylist">Frisör:</label>
                        <select id="stylist" name="stylist" required>
                            <option value="">Välj frisör</option>
                            <?php foreach ($stylists as $stylist): ?>
                                <option value="<?php echo htmlspecialchars($stylist, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($stylist, ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    <p><label for="behandling">Typ av behandling:</label>
                        <select id="behandling" name="behandling" required>
                            <?php foreach ($treatments as $treatment): ?>
                                <option value="<?php echo htmlspecialchars($treatment, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($treatment, ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    <p><button type="submit" class="btn primary">Skicka</button></p>
                </form>
            <?php endif; ?>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container footer-grid">
            <div>
                <h3>Klippdig.Nu</h3>
                <p>Din salong för skönhet och stil.</p>
            </div>
            <div>
                <h4>Kontakt</h4>
                <p>info@klippdig.nu</p>
                <p>+46 70 123 45 67</p>
            </div>
            <div>
                <h4>Support</h4>
                <p>Mon–Fre 09:00–18:00</p>
            </div>
        </div>
        <p class="copyright">© 2026 Klippdig.Nu · All rights reserved</p>
    </footer>
</body>
</html>
