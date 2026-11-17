<?php
$title = "Klippdig.Nu";
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
                <a href="index.php" class="active">Index</a>
                <a href="frisor.php">Frisör</a>
                <a href="frisyr.php">Frisyr</a>
                <a href="tider.php">Tider</a>
                <a href="info.php">Info</a>
                <a href="boka.php">Boka</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <section class="hero">
            <div class="hero-text">
                <p class="eyebrow">Modern stil. Personlig service.</p>
                <h1>Klippdig.Nu</h1>
                <p>Frisörsalong för dig som vill känna dig både avslappnad och fantastisk efter ditt nästa klipp.</p>
                <div class="button-row">
                    <a href="boka.php" class="btn primary">Boka tid</a>
                    <a href="info.php" class="btn secondary">Läs mer</a>
                </div>
            </div>
            <img src="https://images.unsplash.com/photo-1517832606299-7ae9b720a186?auto=format&fit=crop&w=900&q=80" alt="Ung man med tapercut">
        </section>

        <section class="info-grid">
            <div class="info-card">
                <h3>Frisör</h3>
                <p>Erfarna stylister med fokus på skönhet, kvalitet och personlig smak.</p>
            </div>
            <div class="info-card">
                <h3>Frisyr</h3>
                <p>Trendiga looks, klassiska snitt och anpassade stylingar för varje person.</p>
            </div>
            <div class="info-card">
                <h3>Tider</h3>
                <p>Flexibla tider för både vardag och helg, enkelt att boka online.</p>
            </div>
        </section>

        <section class="reviews">
            <h2>Recensioner</h2>
            <div class="review-grid">
                <article class="review-card">
                    <p>“Jag älskar atmosfären och resultatet. Helt perfekt varje gång.”</p>
                    <strong>– Sofia</strong>
                </article>
                <article class="review-card">
                    <p>“Det bästa klippet jag har haft på länge. Personal och service var toppen.”</p>
                    <strong>– Emil</strong>
                </article>
                <article class="review-card">
                    <p>“Frisören lyssnade på exakt vad jag ville ha och resultatet blev perfekt.”</p>
                    <strong>– Lina</strong>
                </article>
            </div>
        </section>

        <section class="gallery">
            <h2>Vår salong</h2>
            <div class="gallery-grid">
                <img src="https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?auto=format&fit=crop&w=800&q=80" alt="Salong interiör">
                <img src="https://images.unsplash.com/photo-1517832606299-7ae9b720a186?auto=format&fit=crop&w=800&q=80" alt="Manlig salong för killar">
                <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=800&q=80" alt="Kund i salong">
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container footer-grid">
            <div>
                <h3>Klippdig.Nu</h3>
                <p>Din salong för skönhet, stil och självförtroende.</p>
            </div>
            <div>
                <h4>Kontakt</h4>
                <p>info@klippdig.nu</p>
                <p>+46 70 123 45 67</p>
            </div>
            <div>
                <h4>Support</h4>
                <p>Frågor och bokningar</p>
                <p>Mon–Fre 09:00–18:00</p>
            </div>
        </div>
        <p class="copyright">© 2026 Klippdig.Nu · All rights reserved</p>
    </footer>
</body>
</html>
