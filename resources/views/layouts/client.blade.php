<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoiffeurPro – @yield('title', 'Espace Client')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --gold: #C9A84C;
            --gold-light: #E8C96A;
            --gold-dim: rgba(201, 168, 76, 0.1);
            --dark-bg: #0C0D0E;
            --dark-card: #16181D;
            --dark-border: rgba(255, 255, 255, 0.06);
            --text-main: #F0EFE9;
            --text-muted: #8E9196;
            --sidebar-w: 260px;
            --sidebar-c: 85px;
        }

        body {
            background-color: var(--dark-bg);
            color: var(--text-main);
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            display: flex;
            min-height: 100vh;
        }

        /* --- LOGIQUE SIDEBAR (SANS JS) --- */
        #sidebar-check { display: none; }

        .sidebar {
            width: var(--sidebar-w);
            background: var(--dark-card);
            border-right: 1px solid var(--dark-border);
            height: 100vh;
            position: fixed;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }

        /* État rétracté */
        #sidebar-check:checked ~ .sidebar { width: var(--sidebar-c); }
        #sidebar-check:checked ~ .sidebar .nav-text, 
        #sidebar-check:checked ~ .sidebar .brand-full { display: none; }

        .sidebar-header {
            padding: 2rem 1.5rem;
            height: 90px;
            display: flex;
            align-items: center;
        }

        .brand-logo {
            font-family: 'Playfair Display', serif;
            color: var(--gold);
            font-size: 1.4rem;
            text-decoration: none;
            font-weight: 900;
        }

        .nav-list {
            flex: 1;
            padding: 1rem 0.8rem;
            list-style: none;
            margin: 0;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.9rem 1rem;
            color: var(--text-muted);
            text-decoration: none;
            border-radius: 12px;
            transition: 0.2s;
            margin-bottom: 0.4rem;
        }

        .nav-link-custom:hover, .nav-link-custom.active {
            background: var(--gold-dim);
            color: var(--gold);
        }

        .nav-link-custom i { font-size: 1.3rem; }

        /* --- CONTENU PRINCIPAL --- */
        .main-wrapper {
            flex: 1;
            margin-left: var(--sidebar-w);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        #sidebar-check:checked ~ .main-wrapper { margin-left: var(--sidebar-c); }

        .top-nav {
            height: 90px;
            padding: 0 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(12, 13, 14, 0.8);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 900;
            border-bottom: 1px solid var(--dark-border);
        }

        .toggle-btn {
            cursor: pointer;
            color: var(--gold);
            font-size: 1.5rem;
        }

        .content-area { padding: 2.5rem; }

        /* --- COMPOSANTS UI --- */
        .card-luxe {
            background: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 20px;
            padding: 1.8rem;
            transition: 0.3s;
        }

        .card-luxe:hover { border-color: rgba(201, 168, 76, 0.3); }

        .btn-gold {
            background: var(--gold);
            color: #000;
            font-weight: 700;
            border-radius: 50px;
            padding: 0.7rem 1.8rem;
            border: none;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
        }

        @media (max-width: 992px) {
            .sidebar { left: -260px; }
            #sidebar-check:checked ~ .sidebar { left: 0; width: var(--sidebar-w); }
            .main-wrapper { margin-left: 0 !important; }
        }
    </style>
    @yield('extra_css')
</head>
<body>

    <input type="checkbox" id="sidebar-check">

    <aside class="sidebar">
        <div class="sidebar-header">
            <a href="#" class="brand-logo">
                ✦ <span class="brand-full">CoiffeurPro</span>
            </a>
        </div>

        <nav class="nav-list">
            <a href="#" class="nav-link-custom active">
                <i class="bi bi-grid-1x2"></i>
                <span class="nav-text">Dashboard</span>
            </a>
            <a href="#" class="nav-link-custom">
                <i class="bi bi-calendar3"></i>
                <span class="nav-text">Réservations</span>
            </a>
            <a href="#" class="nav-link-custom">
                <i class="bi bi-scissors"></i>
                <span class="nav-text">Prestations</span>
            </a>
            <a href="#" class="nav-link-custom">
                <i class="bi bi-person-circle"></i>
                <span class="nav-text">Mon Profil</span>
            </a>

            <div style="margin-top: auto; border-top: 1px solid var(--dark-border); padding-top: 1rem;">
                <a href="#" class="nav-link-custom text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-left"></i>
                    <span class="nav-text">Déconnexion</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </div>
        </nav>
    </aside>

    <div class="main-wrapper">
        <header class="top-nav">
            <div class="d-flex align-items-center gap-3">
                <label for="sidebar-check" class="toggle-btn">
                    <i class="bi bi-list"></i>
                </label>
                <h5 class="m-0 fw-bold d-none d-md-block">@yield('page_title', 'Tableau de bord')</h5>
            </div>

            <div class="d-flex align-items-center gap-4">
                <div class="position-relative">
                    <i class="bi bi-bell fs-5 text-muted"></i>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger rounded-circle"></span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <div class="text-end d-none d-sm-block">
                        <div class="fw-bold small">{{ Auth::user()->ferstname ?? 'Utilisateur' }}</div>
                        <div class="text-muted" style="font-size: 0.7rem;">Membre Gold</div>
                    </div>
                    <div style="width: 42px; height: 42px; background: var(--gold-dim); border: 1px solid var(--gold); border-radius: 12px; display: grid; place-items: center; color: var(--gold); font-weight: 800;">
                        {{ substr(Auth::user()->ferstname ?? 'U', 0, 1) }}
                    </div>
                </div>
            </div>
        </header>

        <main class="content-area">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('extra_js')
</body>
</html>