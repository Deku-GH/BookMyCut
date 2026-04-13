<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoiffeurPro | Excellence & Style</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary-gold: #D4AF37;
            --dark-obsidian: #0F0F0F;
            --soft-gray: #1E1E1E;
            --text-light: #F5F5F5;
            --accent-gradient: linear-gradient(135deg, #D4AF37 0%, #F1D27B 100%);
        }

        body {
            background-color: var(--dark-obsidian);
            color: var(--text-light);
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
        }

        h1,
        h2,
        h6,
        .footer-brand {
            font-family: 'Playfair Display', serif;
        }

        /* --- NAVIGATION MODERNE --- */
        .navbar {
            background: rgba(15, 15, 15, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
            padding: 1.2rem 0;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: var(--primary-gold) !important;
            font-size: 1.6rem;
        }

        .nav-link {
            color: var(--text-light) !important;
            font-weight: 500;
            margin: 0 1rem;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: var(--primary-gold) !important;
        }

        /* --- HERO SECTION --- */
        .hero-section {
            padding: 160px 0 100px;
            background: radial-gradient(circle at top right, rgba(212, 175, 55, 0.05), transparent);
        }

        .btn-gold {
            background: var(--accent-gradient);
            color: var(--dark-obsidian);
            font-weight: 700;
            padding: 12px 30px;
            border-radius: 50px;
            border: none;
            transition: transform 0.3s ease;
        }

        .btn-gold:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(212, 175, 55, 0.2);
        }

        /* --- FOOTER REDÉSIGNÉ --- */
        footer {
            background-color: #080808;
            padding: 80px 0 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .footer-brand {
            font-size: 2rem;
            color: var(--primary-gold);
            margin-bottom: 1.5rem;
        }

        .footer-desc {
            color: #888;
            line-height: 1.8;
            font-size: 0.95rem;
        }

        h6 {
            color: var(--primary-gold);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        footer a {
            display: block;
            color: #bbb;
            text-decoration: none;
            margin-bottom: 0.8rem;
            transition: 0.3s;
            font-size: 0.9rem;
        }

        footer a:hover {
            color: var(--primary-gold);
            padding-left: 5px;
        }

        .social-btn {
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: var(--soft-gray);
            border-radius: 50%;
            margin-right: 10px;
            color: var(--primary-gold);
        }

        .social-btn:hover {
            background: var(--primary-gold);
            color: var(--dark-obsidian);
            padding-left: 0;
            /* Reset hover padding */
        }

        .fdivider {
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            margin: 40px 0 20px;
        }

        .foot-copy {
            color: #555;
            font-size: 0.85rem;
        }

        /* Contact icons fix */
        .contact-info i {
            color: var(--primary-gold);
            width: 25px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">✦ CoiffeurPro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">À propos</a></li>
                    @guest
                        <li class="nav-item ms-2">
                            <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                        </li>
                        <li class="nav-item ms-1">
                            <a class="nav-link btn-nav" href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item ms-1">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="nav-link btn-nav">Log out</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-3 fw-bold mb-4">L'Art de la Coupe,<br><span style="color: var(--primary-gold)">Réinventé
                    à Marrakech</span></h1>
            <p class="lead mb-5 text-secondary">Réservez votre séance en quelques clics et profitez d'une expertise
                unique sans attente.</p>
            <div class="d-flex justify-content-center gap-3">
                <button class="btn btn-gold">Prendre RDV</button>
                <button class="btn btn-outline-light rounded-pill px-4">Nos Salons</button>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="footer-brand">✦ CoiffeurPro</div>
                    <p class="footer-desc">
                        Nous connectons les meilleurs talents de la coiffure avec une clientèle exigeante.
                        Une gestion simplifiée pour les pros, une expérience fluide pour vous.
                    </p>
                    <div class="mt-4">
                        <a href="#" class="social-btn"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-2 offset-lg-1">
                    <h6>Explorez</h6>
                    <a href="index.html">Accueil</a>
                    <a href="#services">Services</a>
                    <a href="#how">Concept</a>
                    <a href="#about">Notre Histoire</a>
                </div>

                <div class="col-sm-4 col-lg-2">
                    <h6>Espace Client</h6>
                    <a href="register.html">Créer un compte</a>
                    <a href="login.html">Connexion</a>
                    <a href="#">Support Client</a>
                    <a href="#">FAQ</a>
                </div>

                <div class="col-sm-4 col-lg-3 contact-info">
                    <h6>Contact Direct</h6>
                    <a href="#"><i class="bi bi-geo-alt"></i> Gueliz, Marrakech</a>
                    <a href="mailto:contact@coiffeurpro.ma"><i class="bi bi-envelope"></i> contact@coiffeurpro.ma</a>
                    <a href="tel:+212600000000"><i class="bi bi-telephone"></i> +212 6 00 00 00 00</a>
                    <a href="#"><i class="bi bi-clock"></i> Lun — Dim : 8h - 21h</a>
                </div>
            </div>

            <hr class="fdivider" />

            <div class="d-flex justify-content-between flex-wrap gap-2 foot-copy">
                <span>© 2026 CoiffeurPro. Excellence Garantie.</span>
                <span>Conçu avec passion à Marrakech ✦</span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>