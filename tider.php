<?php
$title = "Tider - Klippdig.Nu";
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
            <a href="index.php" class="brand">Klippdig.Nu</a>
            <nav>
                <a href="index.php">Index</a>
                <a href="frisor.php">Frisör</a>
                <a href="frisyr.php">Frisyr</a>
                <a href="tider.php" class="active">Tider</a>
                <a href="info.php">Info</a>
                <a href="boka.php">Boka</a>
            </nav>
        </div>
    </header>

    <main class="container page-body">
        <section class="page-header">
            <h1>Bokningstider</h1>
        </section>

        <section class="page-card">
            <table>
                <tr><th>Dag</th><th>Tid</th></tr>
                <tr><td>Måndag</td><td>09:00–18:00</td></tr>
                <tr><td>Tisdag</td><td>09:00–18:00</td></tr>
                <tr><td>Onsdag</td><td>10:00–19:00</td></tr>
                <tr><td>Torsdag</td><td>09:00–18:00</td></tr>
                <tr><td>Fredag</td><td>09:00–17:00</td></tr>
                <tr><td>Lördag</td><td>10:00–15:00</td></tr>
            </table>
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
