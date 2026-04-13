<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CoiffeurPro – Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Plus+Jakarta+Sans:wght@300;400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />

    <style>
        :root {
            --primary-gold: #D4AF37;
            --bg-deep: #0A0A0B;
            --glass: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.08);
            --text-muted: #88888E;
        }

        body {
            background-color: var(--bg-deep);
            color: #ffffff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-image: 
                radial-gradient(circle at 80% 20%, rgba(212, 175, 55, 0.06) 0%, transparent 50%),
                radial-gradient(circle at 20% 80%, rgba(212, 175, 55, 0.04) 0%, transparent 50%);
        }

        /* NAVBAR */
        .navbar {
            padding: 1.5rem 0;
            background: transparent;
        }

        .brand-logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--primary-gold);
            text-decoration: none;
            font-weight: 700;
        }

        /* LAYOUT MAIN */
        .main-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            padding: 2rem 0;
        }

        /* PREVIEW SECTION (Visible sur Desktop) */
        .preview-side {
            padding-right: 4rem;
        }

        .eyebrow {
            font-size: 0.75rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--primary-gold);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .glass-preview {
            background: var(--glass);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 1.5rem;
            max-width: 350px;
            margin-top: 2rem;
        }

        /* AUTH CARD */
        .auth-card {
            background: var(--glass);
            backdrop-filter: blur(25px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
        }

        .form-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .form-sub {
            color: var(--text-muted);
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }

        /* INPUTS */
        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #bbb;
        }

        .input-group-custom {
            position: relative;
            margin-bottom: 1.2rem;
        }

        .input-group-custom i {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-gold);
            opacity: 0.7;
            z-index: 5;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            padding: 0.8rem 1rem 0.8rem 3rem;
            color: white !important;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary-gold);
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.1);
        }

        /* BUTTONS */
        .btn-submit {
            background: var(--primary-gold);
            color: #000;
            border: none;
            border-radius: 12px;
            padding: 1rem;
            font-weight: 700;
            width: 100%;
            margin-top: 1rem;
            transition: 0.3s;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(212, 175, 55, 0.3);
        }

        .btn-social {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            color: white;
            padding: 0.7rem;
            border-radius: 12px;
            font-size: 0.85rem;
            flex: 1;
            transition: 0.3s;
        }

        .btn-social:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 2rem 0;
            color: var(--text-muted);
            font-size: 0.8rem;
        }

        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid var(--glass-border);
        }

        .divider:not(:empty)::before { margin-right: 1rem; }
        .divider:not(:empty)::after { margin-left: 1rem; }

        .footer-link {
            text-align: center;
            margin-top: 2rem;
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        .footer-link a {
            color: var(--primary-gold);
            text-decoration: none;
            font-weight: 600;
        }

        .toggle-pw {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="container">
            <a class="brand-logo" href="/">✦ COIFFEURPRO</a>
            <a href="register.html" class="btn btn-outline-light btn-sm rounded-pill px-4" style="border-color: var(--glass-border)">S'inscrire</a>
        </div>
    </nav>

    <div class="main-wrapper">
        <div class="container">
            <div class="row align-items-center">
                
                <div class="col-lg-6 d-none d-lg-block preview-side">
                    <p class="eyebrow">✦ Content de vous revoir</p>
                    <h1 class="hero-title">Votre style<br><span style="color: var(--primary-gold)">vous attend.</span></h1>
                    <p class="text-secondary w-75">Connectez-vous pour gérer vos rendez-vous et découvrir les dernières disponibilités de vos barbiers préférés.</p>
                    
                    <div class="glass-preview">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div style="width: 45px; height: 45px; background: var(--primary-gold); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: black;">
                                <i class="bi bi-person-fill fs-5"></i>
                            </div>
                            <div>
                                <div class="fw-bold">Youssef El Idrissi</div>
                                <div class="small text-muted">Client Fidèle</div>
                            </div>
                        </div>
                        <div class="small mb-2 text-uppercase letter-spacing-1" style="font-size: 0.65rem; color: var(--primary-gold)">Prochain RDV</div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small">Coupe + Barbe Tradition</span>
                            <span class="badge rounded-pill" style="background: rgba(212, 175, 55, 0.2); color: var(--primary-gold)">Demain 10h</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 offset-lg-1">
                    <div class="auth-card">
                        <h2 class="form-title">Connexion</h2>
                        <p class="form-sub">Ravis de vous revoir parmi nous.</p>

                        @if ($errors->any())
                            <div class="alert alert-danger py-2 small bg-transparent border-danger text-danger mb-4">
                                @foreach ($errors->all() as $error)
                                    <div><i class="bi bi-exclamation-circle me-2"></i>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <label class="form-label">Email</label>
                            <div class="input-group-custom">
                                <i class="bi bi-envelope"></i>
                                <input type="email" name="email" class="form-control" placeholder="votre@email.ma" required>
                            </div>

                            <div class="d-flex justify-content-between align-items-end">
                                <label class="form-label">Mot de passe</label>
                                <a href="#" class="small mb-1 text-decoration-none" style="color: var(--primary-gold)">Oublié ?</a>
                            </div>
                            <div class="input-group-custom">
                                <i class="bi bi-shield-lock"></i>
                                <input type="password" name="password" id="loginPw" class="form-control" placeholder="••••••••" required>
                                <button type="button" class="toggle-pw" onclick="togglePassword()">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label small text-secondary" for="remember">
                                    Rester connecté
                                </label>
                            </div>

                            <button type="submit" class="btn btn-submit">Se connecter</button>
                        </form>

                        <div class="divider">OU</div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-social"><i class="bi bi-google me-2"></i>Google</button>
                            <button class="btn btn-social"><i class="bi bi-facebook me-2"></i>Facebook</button>
                        </div>

                        <div class="footer-link">
                            Nouveau ici ? <a href="register.html">S'inscrire gratuitement</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const pwField = document.getElementById('loginPw');
            const icon = event.currentTarget.querySelector('i');
            if (pwField.type === "password") {
                pwField.type = "text";
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                pwField.type = "password";
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>
</body>
</html>