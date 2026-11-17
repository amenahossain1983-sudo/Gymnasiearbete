<?php
$title = "Frisyr - Klippdig.Nu";
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
                <a href="frisyr.php" class="active">Frisyr</a>
                <a href="tider.php">Tider</a>
                <a href="info.php">Info</a>
                <a href="boka.php">Boka</a>
            </nav>
        </div>
    </header>

    <main class="container page-body">
        <section class="page-header">
            <h1>Populära frisyrer</h1>
        </section>

        <section class="info-grid">
            <div class="info-card">
                <h3>Kort klipp</h3>
                <p>Städat, enkelt och kraftfullt med fokus på struktur och form.</p>
            </div>
            <div class="info-card">
                <h3>Långt hår</h3>
                <p>Elegant och lätt att stylinga med vågor, textur och volym.</p>
            </div>
            <div class="info-card">
                <h3>Blunt bob</h3>
                <p>Modern och trendig look som passar de flesta ansiktsformer.</p>
            </div>
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


