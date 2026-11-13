<?php
$title = "Frisör - Klippdig.Nu";
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
                <a href="frisor.php" class="active">Frisör</a>
                <a href="frisyr.php">Frisyr</a>
                <a href="tider.php">Tider</a>
                <a href="info.php">Info</a>
                <a href="boka.php">Boka</a>
            </nav>
        </div>
    </header>

    <main class="container page-body">
        <section class="page-header">
            <h1>Våra frisörer</h1>
        </section>

        <section class="page-card">
            <p>Vårt team består av kreativa och erfarna stylister som alltid strävar efter ett naturligt, vackert och personligt resultat.</p>
            <ul class="simple-list">
                <li><strong>Emma</strong> – Klipp och färg | Tillgängliga tider: Måndag 10:00–16:00, Onsdag 13:00–18:00</li>
                <li><strong>Lucas</strong> – Trendiga snitt | Tillgängliga tider: Tisdag 09:00–15:00, Fredag 11:00–17:00</li>
                <li><strong>Sarah</strong> – Styling och specialeffekter | Tillgängliga tider: Torsdag 12:00–18:00, Lördag 10:00–14:00</li>
            </ul>
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



