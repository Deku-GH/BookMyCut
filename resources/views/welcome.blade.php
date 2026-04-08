<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CoiffeurPro – Réservez en ligne</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <style>
        :root {
            --gold: #C9A84C;
            --gold-light: #e8c96a;
            --dark: #111214;
            --dark2: #1a1c20;
            --dark3: #22252b;
            --muted: #8a8d94;
            --white: #f5f4f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--dark);
            color: var(--white);
            font-family: 'DM Sans', sans-serif;
            overflow-x: hidden;
        }

        /* NAVBAR */
        .navbar {
            background: rgba(17, 18, 20, 0.97);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(201, 168, 76, 0.15);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .brand-logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            color: var(--gold);
            letter-spacing: 1px;
        }

        .brand-tagline {
            font-size: 0.65rem;
            color: var(--muted);
            letter-spacing: 3px;
            text-transform: uppercase;
            display: block;
            margin-top: -4px;
        }

        .nav-link {
            color: #ccc !important;
            font-size: 0.9rem;
            transition: color 0.2s;
            padding: 0.4rem 1rem !important;
        }

        .nav-link:hover {
            color: var(--gold) !important;
        }

        .btn-nav {
            background: var(--gold);
            color: var(--dark) !important;
            font-weight: 600;
            border-radius: 3px;
            padding: 0.45rem 1.3rem !important;
            font-size: 0.88rem;
        }

        .btn-nav:hover {
            background: var(--gold-light);
        }

        /* HERO */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #0d0d0e 0%, #1a1410 60%, #0d0d0e 100%);
        }

        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 70% 60% at 70% 50%, rgba(201, 168, 76, 0.07), transparent 70%);
            pointer-events: none;
        }

        .hero-bg-icon {
            position: absolute;
            right: -60px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 30rem;
            color: rgba(201, 168, 76, 0.03);
            pointer-events: none;
        }

        .eyebrow {
            font-size: 0.75rem;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 500;
            margin-bottom: 1.2rem;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.8rem, 6vw, 5rem);
            line-height: 1.08;
            margin-bottom: 1.5rem;
        }

        .hero h1 em {
            color: var(--gold);
            font-style: normal;
        }

        .hero .lead {
            color: #a5a8ae;
            font-size: 1.1rem;
            max-width: 500px;
            line-height: 1.75;
            margin-bottom: 2.4rem;
            font-weight: 300;
        }

        .btn-gold {
            background: var(--gold);
            color: var(--dark);
            border: none;
            border-radius: 3px;
            font-weight: 600;
            padding: 0.85rem 2.2rem;
            transition: all 0.25s;
            box-shadow: 0 4px 24px rgba(201, 168, 76, 0.25);
        }

        .btn-gold:hover {
            background: var(--gold-light);
            transform: translateY(-1px);
            color: var(--dark);
        }

        .btn-outline-gold {
            background: transparent;
            color: var(--gold);
            border: 1px solid var(--gold);
            border-radius: 3px;
            font-weight: 500;
            padding: 0.85rem 2.2rem;
            transition: all 0.25s;
        }

        .btn-outline-gold:hover {
            background: rgba(201, 168, 76, 0.1);
            color: var(--gold);
        }

        .stats {
            display: flex;
            gap: 2.5rem;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.07);
        }

        .stat-num {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--gold);
            font-weight: 700;
        }

        .stat-label {
            font-size: 0.78rem;
            color: var(--muted);
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-top: 2px;
        }

        .mock-card {
            background: rgba(26, 28, 32, 0.95);
            border: 1px solid rgba(201, 168, 76, 0.2);
            border-radius: 10px;
            padding: 1rem 1.4rem;
            backdrop-filter: blur(8px);
        }

        .float-top {
            position: absolute;
            top: 8%;
            right: -10px;
            min-width: 200px;
            animation: floatY 4s ease-in-out infinite;
        }

        .float-bot {
            position: absolute;
            bottom: 12%;
            left: -20px;
            min-width: 180px;
            animation: floatY 4s ease-in-out infinite reverse;
        }

        @keyframes floatY {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-10px)
            }
        }

        .hero-placeholder {
            width: 100%;
            height: 520px;
            border-radius: 12px;
            background: linear-gradient(145deg, #1e2025, #2a2d34);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            border: 1px solid rgba(201, 168, 76, 0.15);
        }

        .hero-placeholder i {
            font-size: 5rem;
            color: rgba(201, 168, 76, 0.3);
        }

        /* GOLD BAR */
        .gold-bar {
            background: var(--gold);
            padding: 0.85rem 0;
        }

        .gold-bar span {
            color: var(--dark);
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        /* SECTIONS */
        .section {
            padding: 5.5rem 0;
        }

        .sec-label {
            font-size: 0.72rem;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 500;
            margin-bottom: 0.7rem;
        }

        .sec-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.9rem, 4vw, 2.9rem);
            line-height: 1.15;
        }

        .sec-title em {
            color: var(--gold);
            font-style: normal;
        }

        /* STEPS */
        .step-card {
            background: var(--dark2);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 2rem;
            transition: border-color 0.3s, transform 0.3s;
            height: 100%;
        }

        .step-card:hover {
            border-color: rgba(201, 168, 76, 0.3);
            transform: translateY(-4px);
        }

        .step-num {
            font-family: 'Playfair Display', serif;
            font-size: 4.5rem;
            color: rgba(201, 168, 76, 0.1);
            font-weight: 900;
            line-height: 1;
            margin-bottom: -0.8rem;
        }

        .step-icon {
            width: 50px;
            height: 50px;
            background: rgba(201, 168, 76, 0.12);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .step-icon i {
            font-size: 1.3rem;
            color: var(--gold);
        }

        .step-card h5 {
            font-family: 'Playfair Display', serif;
            color: var(--white);
            margin-bottom: 0.5rem;
        }

        .step-card p {
            color: var(--muted);
            font-size: 0.9rem;
            line-height: 1.7;
            margin: 0;
        }

        /* SERVICES */
        .services-bg {
            background: var(--dark2);
        }

        .svc-card {
            background: var(--dark3);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 1.6rem;
            display: flex;
            align-items: center;
            gap: 1.2rem;
            transition: all 0.25s;
        }

        .svc-card:hover {
            border-color: rgba(201, 168, 76, 0.35);
            background: rgba(201, 168, 76, 0.03);
        }

        .svc-icon {
            width: 54px;
            height: 54px;
            border-radius: 10px;
            background: rgba(201, 168, 76, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .svc-icon i {
            font-size: 1.5rem;
            color: var(--gold);
        }

        .svc-card h6 {
            font-family: 'Playfair Display', serif;
            color: var(--white);
            margin-bottom: 0.2rem;
        }

        .svc-card p {
            color: var(--muted);
            font-size: 0.83rem;
            margin: 0;
        }

        .svc-price {
            margin-left: auto;
            font-family: 'Playfair Display', serif;
            color: var(--gold);
            font-size: 1.1rem;
            font-weight: 700;
            flex-shrink: 0;
        }

        /* WHY */
        .why-card {
            background: var(--dark2);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            transition: all 0.25s;
            height: 100%;
        }

        .why-card:hover {
            border-color: rgba(201, 168, 76, 0.25);
            transform: translateY(-3px);
        }

        .why-card i {
            font-size: 2.2rem;
            color: var(--gold);
            margin-bottom: 1rem;
            display: block;
        }

        .why-card h6 {
            font-family: 'Playfair Display', serif;
            color: var(--white);
            margin-bottom: 0.5rem;
        }

        .why-card p {
            color: var(--muted);
            font-size: 0.87rem;
            line-height: 1.7;
            margin: 0;
        }

        /* TESTIMONIALS */
        .testi-bg {
            background: var(--dark3);
        }

        .testi-card {
            background: var(--dark2);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 2rem;
            height: 100%;
        }

        .testi-stars {
            color: var(--gold);
            font-size: 0.85rem;
            margin-bottom: 0.8rem;
        }

        .testi-text {
            color: #c0c3ca;
            font-size: 0.93rem;
            line-height: 1.75;
            font-style: italic;
            margin-bottom: 1.2rem;
        }

        .testi-quote {
            font-size: 3.5rem;
            color: rgba(201, 168, 76, 0.12);
            font-family: 'Playfair Display', serif;
            line-height: 1;
        }

        .testi-author {
            font-weight: 600;
            color: var(--white);
            font-size: 0.9rem;
        }

        .testi-role {
            color: var(--muted);
            font-size: 0.79rem;
        }

        /* CTA */
        .cta-bg {
            background: linear-gradient(135deg, #1a1410 0%, var(--dark) 100%);
            position: relative;
            overflow: hidden;
        }

        .cta-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 80% 80% at 50% 50%, rgba(201, 168, 76, 0.06), transparent 70%);
        }

        /* FOOTER */
        footer {
            background: #0a0b0c;
            border-top: 1px solid rgba(201, 168, 76, 0.12);
            padding: 3rem 0 1.5rem;
        }

        .footer-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            color: var(--gold);
        }

        .footer-desc {
            color: var(--muted);
            font-size: 0.87rem;
            line-height: 1.7;
            margin-top: 0.5rem;
            max-width: 260px;
        }

        footer h6 {
            color: var(--white);
            font-size: 0.77rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 1.2rem;
            font-weight: 500;
        }

        footer a {
            color: var(--muted);
            font-size: 0.88rem;
            text-decoration: none;
            display: block;
            margin-bottom: 0.6rem;
            transition: color 0.2s;
        }

        footer a:hover {
            color: var(--gold);
        }

        .social-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 6px;
            color: var(--muted) !important;
            font-size: 1rem;
            transition: all 0.2s;
            margin-right: 0.4rem;
        }

        .social-btn:hover {
            background: rgba(201, 168, 76, 0.15);
            border-color: var(--gold);
            color: var(--gold) !important;
        }

        hr.fdivider {
            border-color: rgba(255, 255, 255, 0.06);
            margin: 2rem 0 1rem;
        }

        .foot-copy {
            color: var(--muted);
            font-size: 0.8rem;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <span class="brand-logo">✦ BookMyCut</span>
                <span class="brand-tagline">Réservation en ligne</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#nav"
                style="color:var(--gold)">
                <i class="bi bi-list fs-4"></i>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav ms-auto align-items-center gap-1">
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#how">Comment ça marche</a></li>
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
                        <button class="nav-link btn-nav" >Log out</button>

                        </form>
                      
                    </li>
                     @endauth

                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <span class="hero-bg-icon"><i class="bi bi-scissors"></i></span>
        <div class="container py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <p class="eyebrow">✦ Plateforme de réservation digitale</p>
                    <h1>Votre style,<br /><em>sans attente.</em><br />Réservez maintenant.</h1>
                    <p class="lead">Fini les longues files d'attente. Réservez votre coiffeur en ligne en quelques
                        secondes — choisissez votre service, votre créneau, et profitez.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="register.html" class="btn btn-gold">Prendre rendez-vous <i
                                class="bi bi-arrow-right ms-1"></i></a>
                        <a href="#how" class="btn btn-outline-gold">Comment ça marche</a>
                    </div>
                    <div class="stats">
                        <div>
                            <div class="stat-num">500+</div>
                            <div class="stat-label">Clients satisfaits</div>
                        </div>
                        <div>
                            <div class="stat-num">12+</div>
                            <div class="stat-label">Services proposés</div>
                        </div>
                        <div>
                            <div class="stat-num">4.9★</div>
                            <div class="stat-label">Note moyenne</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                        <div class="hero-placeholder">
                            <i class="bi bi-scissors"></i>
                            <span
                                style="color:var(--muted);font-size:0.85rem;letter-spacing:2px;text-transform:uppercase">Salon
                                CoiffeurPro</span>
                            <span style="font-size:0.75rem;color:rgba(201,168,76,0.5)">Marrakech, Maroc</span>
                        </div>
                        <!-- Floating cards -->
                        <div class="mock-card float-top">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span
                                    style="width:8px;height:8px;background:#4ade80;border-radius:50%;display:inline-block"></span>
                                <small style="color:#4ade80;font-size:0.75rem;font-weight:600">Disponible
                                    maintenant</small>
                            </div>
                            <div style="font-size:0.88rem;color:var(--white);font-weight:500">Coupe + Barbe</div>
                            <div style="font-size:0.78rem;color:var(--muted)">Prochain créneau : 14h30</div>
                        </div>
                        <div class="mock-card float-bot">
                            <div class="d-flex align-items-center gap-2">
                                <div
                                    style="width:36px;height:36px;background:rgba(201,168,76,0.15);border-radius:6px;display:flex;align-items:center;justify-content:center">
                                    <i class="bi bi-check2-circle" style="color:var(--gold)"></i>
                                </div>
                                <div>
                                    <div style="font-size:0.82rem;color:var(--white);font-weight:600">Réservation
                                        confirmée</div>
                                    <div style="font-size:0.74rem;color:var(--muted)">Demain à 10h00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GOLD BAR -->
    <div class="gold-bar">
        <div class="container">
            <div class="d-flex gap-4 align-items-center justify-content-center flex-wrap py-1">
                <span><i class="bi bi-check-circle-fill me-2"></i>Réservation 24h/24</span>
                <span><i class="bi bi-check-circle-fill me-2"></i>Confirmation instantanée</span>
                <span><i class="bi bi-check-circle-fill me-2"></i>Annulation gratuite</span>
                <span><i class="bi bi-check-circle-fill me-2"></i>Zéro file d'attente</span>
            </div>
        </div>
    </div>

    <!-- HOW IT WORKS -->
    <section class="section" id="how">
        <div class="container">
            <div class="text-center mb-5">
                <p class="sec-label">Processus simple</p>
                <h2 class="sec-title">Réservez en <em>3 étapes</em></h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="step-num">01</div>
                        <div class="step-icon"><i class="bi bi-person-plus"></i></div>
                        <h5>Créez votre compte</h5>
                        <p>Inscrivez-vous gratuitement. Votre espace personnel vous permet de gérer toutes vos
                            réservations depuis un seul endroit.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="step-num">02</div>
                        <div class="step-icon"><i class="bi bi-calendar3"></i></div>
                        <h5>Choisissez votre créneau</h5>
                        <p>Consultez les disponibilités en temps réel. Sélectionnez le service, la date et l'heure qui
                            vous conviennent.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="step-num">03</div>
                        <div class="step-icon"><i class="bi bi-patch-check"></i></div>
                        <h5>Confirmez & profitez</h5>
                        <p>Recevez une confirmation instantanée. Arrivez à l'heure exacte et passez directement sans
                            attendre.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES -->
    <section class="section services-bg" id="services">
        <div class="container">
            <div class="row align-items-end mb-5">
                <div class="col-lg-6">
                    <p class="sec-label">Ce que nous proposons</p>
                    <h2 class="sec-title">Nos <em>services</em></h2>
                </div>
                <div class="col-lg-6 text-lg-end mt-3 mt-lg-0">
                    <a href="register.html" class="btn btn-outline-gold">Réserver un service <i
                            class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="svc-card">
                        <div class="svc-icon"><i class="bi bi-scissors"></i></div>
                        <div>
                            <h6>Coupe de cheveux</h6>
                            <p>Coupe classique, dégradé ou tendance selon vos préférences</p>
                        </div>
                        <div class="svc-price">50 MAD</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="svc-card">
                        <div class="svc-icon"><i class="bi bi-stars"></i></div>
                        <div>
                            <h6>Taille de barbe</h6>
                            <p>Barbe design, droite ou rasage soigné — résultat impeccable</p>
                        </div>
                        <div class="svc-price">30 MAD</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="svc-card">
                        <div class="svc-icon"><i class="bi bi-gem"></i></div>
                        <div>
                            <h6>Coupe + Barbe</h6>
                            <p>Le combo complet pour un look soigné de la tête aux pieds</p>
                        </div>
                        <div class="svc-price">70 MAD</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="svc-card">
                        <div class="svc-icon"><i class="bi bi-droplet-half"></i></div>
                        <div>
                            <h6>Soin & Shampoing</h6>
                            <p>Traitement capillaire professionnel pour des cheveux en bonne santé</p>
                        </div>
                        <div class="svc-price">40 MAD</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="svc-card">
                        <div class="svc-icon"><i class="bi bi-brush"></i></div>
                        <div>
                            <h6>Coloration</h6>
                            <p>Teintes naturelles ou tendances avec des produits de haute qualité</p>
                        </div>
                        <div class="svc-price">120 MAD</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="svc-card">
                        <div class="svc-icon"><i class="bi bi-award"></i></div>
                        <div>
                            <h6>Forfait Premium</h6>
                            <p>Coupe + Barbe + Soin — l'expérience coiffeur la plus complète</p>
                        </div>
                        <div class="svc-price">100 MAD</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WHY US -->
    <section class="section" id="about">
        <div class="container">
            <div class="text-center mb-5">
                <p class="sec-label">Pourquoi nous choisir</p>
                <h2 class="sec-title">La <em>différence</em> CoiffeurPro</h2>
            </div>
            <div class="row g-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="why-card">
                        <i class="bi bi-lightning-charge-fill"></i>
                        <h6>Réservation rapide</h6>
                        <p>Prenez rendez-vous en moins de 2 minutes depuis votre téléphone, à n'importe quelle heure.
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="why-card">
                        <i class="bi bi-clock-fill"></i>
                        <h6>Zéro attente</h6>
                        <p>Votre créneau est réservé. Arrivez à l'heure exacte et passez directement sans file
                            d'attente.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="why-card">
                        <i class="bi bi-bell-fill"></i>
                        <h6>Confirmation instantanée</h6>
                        <p>Recevez une confirmation immédiate dès la réservation. Votre rendez-vous est garanti.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="why-card">
                        <i class="bi bi-shield-check-fill"></i>
                        <h6>Annulation facile</h6>
                        <p>Modifiez ou annulez gratuitement si votre emploi du temps change. Restez flexible.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="section testi-bg">
        <div class="container">
            <div class="text-center mb-5">
                <p class="sec-label">Avis clients</p>
                <h2 class="sec-title">Ils nous font <em>confiance</em></h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testi-card">
                        <div class="testi-quote">"</div>
                        <div class="testi-stars">★★★★★</div>
                        <p class="testi-text">Enfin une app qui résout le vrai problème ! J'arrivais toujours et le
                            coiffeur était occupé. Maintenant je réserve en 1 minute et j'arrive à l'heure pile.</p>
                        <div class="testi-author">Youssef El Idrissi</div>
                        <div class="testi-role">Client fidèle — Marrakech</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testi-card">
                        <div class="testi-quote">"</div>
                        <div class="testi-stars">★★★★★</div>
                        <p class="testi-text">Grâce à CoiffeurPro, mon salon est beaucoup mieux organisé. Je gère les
                            créneaux facilement et mes clients sont nettement plus satisfaits. Indispensable.</p>
                        <div class="testi-author">Hassan Benali</div>
                        <div class="testi-role">Gérant de salon — Marrakech</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testi-card">
                        <div class="testi-quote">"</div>
                        <div class="testi-stars">★★★★★</div>
                        <p class="testi-text">Simple, rapide et efficace. La confirmation instantanée est vraiment
                            rassurante. Je recommande à tous ceux qui n'ont pas de temps à perdre.</p>
                        <div class="testi-author">Karim Tahiri</div>
                        <div class="testi-role">Client — Marrakech</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="section cta-bg text-center">
        <div class="container position-relative" style="z-index:1">
            <p class="sec-label">Commencez maintenant</p>
            <h2 class="sec-title mb-3">Prêt à réserver votre <em>prochaine coupe</em> ?</h2>
            <p style="color:var(--muted);max-width:480px;margin:0 auto 2.5rem;line-height:1.75">Créez votre compte
                gratuitement et réservez votre premier rendez-vous en moins de 2 minutes. Sans attente, sans stress.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="register.html" class="btn btn-gold btn-lg">Créer un compte gratuit</a>
                <a href="login.html" class="btn btn-outline-gold btn-lg">Déjà membre ? Connexion</a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="footer-brand">✦ CoiffeurPro</div>
                    <p class="footer-desc">La plateforme de réservation de coiffeur en ligne qui élimine les temps
                        d'attente et simplifie la gestion des salons.</p>
                    <div class="mt-3">
                        <a href="#" class="social-btn"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-btn"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-2 offset-lg-1">
                    <h6>Navigation</h6>
                    <a href="index.html">Accueil</a>
                    <a href="#services">Services</a>
                    <a href="#how">Comment ça marche</a>
                    <a href="#about">À propos</a>
                </div>
                <div class="col-sm-4 col-lg-2">
                    <h6>Compte</h6>
                    <a href="register.html">S'inscrire</a>
                    <a href="login.html">Se connecter</a>
                    <a href="#">Mon espace</a>
                    <a href="#">Mes réservations</a>
                </div>
                <div class="col-sm-4 col-lg-3">
                    <h6>Contact</h6>
                    <a href="#"><i class="bi bi-geo-alt me-2"></i>Marrakech, Maroc</a>
                    <a href="#"><i class="bi bi-envelope me-2"></i>contact@coiffeurpro.ma</a>
                    <a href="#"><i class="bi bi-telephone me-2"></i>+212 6 00 00 00 00</a>
                    <a href="#"><i class="bi bi-clock me-2"></i>7j/7 — 8h à 21h</a>
                </div>
            </div>
            <hr class="fdivider" />
            <div class="d-flex justify-content-between flex-wrap gap-2 foot-copy">
                <span>© 2024 CoiffeurPro. Tous droits réservés.</span>
                <span>Fait avec ✦ à Marrakech</span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>