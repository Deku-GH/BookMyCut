<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CoiffeurPro – @yield('title', 'Dashboard')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    
    <style>
        :root {
            --gold: #C9A84C; --gold-l: #e8c96a; --gold-dim: rgba(201, 168, 76, 0.12);
            --dark: #07080a; --dark2: #101216; --dark3: #181b21; --dark4: #21252d;
            --muted: #808694; --white: #fcfcfc; --green: #10b981; --red: #f43f5e;
            --blue: #3b82f6; 
            --border: rgba(201, 168, 76, 0.12);
            --glass: rgba(16, 18, 22, 0.75);
        }

        body { 
            background: var(--dark); 
            color: var(--white); 
            font-family: 'DM Sans', sans-serif; 
            min-height: 100vh; 
            display: flex; 
            overflow-x: hidden;
            letter-spacing: -0.01em;
        }

        /* --- Sidebar Improvements --- */
        .sidebar { 
            width: 270px; 
            background: var(--dark2); 
            border-right: 1px solid var(--border); 
            display: flex; 
            flex-direction: column; 
            position: fixed; 
            height: 100vh; 
            left: 0; top: 0; z-index: 200; 
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); 
        }
        .sidebar.collapsed { width: 85px; }
        
        /* Smooth fade for collapsed elements */
        .sidebar.collapsed .lbl, 
        .sidebar.collapsed .brand-tagline, 
        .sidebar.collapsed .u-info, 
        .sidebar.collapsed .sec-lbl { 
            opacity: 0; visibility: hidden; transition: 0.2s;
        }
        
        .sb-head { padding: 2rem 1.5rem; }
        .brand-logo { 
            font-family: 'Playfair Display', serif; 
            font-size: 1.5rem; 
            color: var(--gold); 
            display: flex; 
            align-items: center; 
            gap: 10px;
        }

        .sb-user { 
            padding: 1rem; margin: 0 1.2rem 1.5rem; border-radius: 16px; 
            background: linear-gradient(145deg, rgba(255,255,255,0.04), rgba(255,255,255,0.01)); 
            border: 1px solid var(--border);
            display: flex; align-items: center; gap: 0.8rem; 
        }
        
        /* --- Navigation Enhancements --- */
        .sec-lbl { 
            font-size: 0.65rem; text-transform: uppercase; 
            letter-spacing: 0.15em; color: var(--gold); 
            padding: 1.5rem 1.8rem 0.5rem; opacity: 0.6;
            font-weight: 700;
        }

        .ni { 
            display: flex; align-items: center; gap: 1.1rem; padding: 0.9rem 1.8rem; 
            color: var(--muted); font-size: 0.92rem; transition: 0.3s ease; 
            text-decoration: none; position: relative;
        }
        
        .ni i { font-size: 1.25rem; transition: 0.3s; }
        .ni:hover { color: var(--white); background: rgba(201, 168, 76, 0.04); }
        
        .ni.active { color: var(--gold); background: var(--gold-dim); }
        .ni.active::after {
            content: ""; position: absolute; right: 0; top: 20%; height: 60%;
            width: 3px; background: var(--gold); border-radius: 4px 0 0 4px;
        }
        .ni.active i { color: var(--gold); transform: scale(1.1); }

        /* --- Main Wrapper & Topbar --- */
        .main-wrapper { flex: 1; margin-left: 270px; transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
        .main-wrapper.expanded { margin-left: 85px; }
        
        .topbar { 
            background: var(--glass); backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border); padding: 1.2rem 2.5rem; 
            position: sticky; top: 0; z-index: 100; 
        }

        /* --- UI Components Refresh --- */
        .sc { /* Stat Card */
            background: var(--dark2); border: 1px solid var(--border);
            padding: 1.8rem; border-radius: 20px; transition: 0.4s;
            position: relative; overflow: hidden;
        }
        .sc::before {
            content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: radial-gradient(circle at top right, rgba(201, 168, 76, 0.05), transparent);
        }
        .sc:hover { transform: translateY(-7px); border-color: rgba(201, 168, 76, 0.3); box-shadow: 0 20px 40px rgba(0,0,0,0.4); }

        .tc { /* Table Card */
            background: var(--dark2); border: 1px solid var(--border);
            border-radius: 20px; box-shadow: var(--card-shadow);
        }
        
        .tt th { 
            background: rgba(255,255,255,0.01); 
            color: var(--gold); 
            font-weight: 600; 
            border-bottom: 1px solid var(--border);
        }

        .btn-col { 
            background: var(--dark3); border: 1px solid var(--border); 
            color: var(--gold); border-radius: 10px; width: 45px; height: 45px;
            display: flex; align-items: center; justify-content: center;
            margin: 1rem auto; transition: 0.3s;
        }

        /* Style du lien de navigation */
.nav-link-custom {
    display: flex;
    align-items: center;
    padding: 12px 18px;
    margin: 8px 15px;
    border-radius: 15px;
    text-decoration: none;
    color: rgba(255, 255, 255, 0.7);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid transparent;
}

.nav-link-custom:hover, .nav-link-custom.active {
    background: var(--dark3);
    color: var(--white);
    border-color: var(--border);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

/* Wrapper de l'icône/avatar */
.nav-icon-wrapper {
    width: 32px;
    height: 32px;
    margin-right: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Style de l'avatar circulaire */
.nav-avatar-img, .nav-avatar-placeholder {
    width: 100%;
    height: 100%;
    border-radius: 10px; /* Style carré arrondi comme tes cartes */
    object-fit: cover;
    border: 1.5px solid var(--gold);
}
.sidebar {
    height: 100vh;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
}
.nav-avatar-placeholder {
    background: var(--gold-dim);
    color: var(--gold);
    font-weight: 800;
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Playfair Display', serif;
}

/* Animation de la flèche au survol */
.nav-arrow {
    transition: transform 0.3s ease;
    font-size: 0.7rem;
}

.nav-link-custom:hover .nav-arrow {
    transform: translateX(3px);
    color: var(--gold);
}

.nav-link-custom.active .nav-text {
    font-weight: 600;
}


        .btn-col:hover { background: var(--gold); color: var(--dark); }
        /* === PROFILE PAGE FIX (match dashboard UI) === */

/* Card luxe aligned with dashboard cards */
.card-luxe {
    background: var(--dark2);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 1.8rem;
    transition: 0.4s;
    position: relative;
    overflow: hidden;
}



/* Typography fixes */
.font-playfair {
    font-family: 'Playfair Display', serif;
}

.text-gold {
    color: var(--gold) !important;
}

/* Buttons */
.btn-gold {
    background: linear-gradient(135deg, var(--gold), var(--gold-l));
    border: none;
    color: #000;
    font-weight: 600;
    border-radius: 12px;
    transition: 0.3s;
}

.btn-gold:hover {
    background: var(--gold-l);
    transform: translateY(-1px);
}

/* Status badges */
.status-badge {
    padding: 6px 12px;
    border-radius: 999px;
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.03em;
}

.st-confirm {
    background: rgba(16,185,129,0.15);
    color: var(--green);
}

.st-upcoming {
    background: rgba(59,130,246,0.15);
    color: var(--blue);
}

.st-done {
    background: rgba(16,185,129,0.15);
    color: var(--green);
}

.st-cancel {
    background: rgba(244,63,94,0.15);
    color: var(--red);
}

/* Inputs */
.form-control {
    background: var(--dark3) !important;
    border: 1px solid var(--border) !important;
    color: var(--white) !important;
    border-radius: 12px;
    transition: 0.3s;
}

.form-control:focus {
    border-color: var(--gold) !important;
    box-shadow: 0 0 0 2px rgba(201,168,76,0.15);
    background: var(--dark3);
    color: var(--white);
}

/* Alerts */
.alert-err {
    background: rgba(244,63,94,0.08);
    border: 1px solid rgba(244,63,94,0.25);
    color: #fda4af;
    padding: 1rem 1.2rem;
    border-radius: 14px;
}

/* Action button (eye icon etc.) */
.btn-action {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: var(--dark3);
    border: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--gold);
    transition: 0.3s;
}

.btn-action:hover {
    background: var(--gold);
    color: #000;
}

/* Fix small text inconsistencies */
.small {
    color: var(--muted);
}

/* Danger card */
.border-danger {
    border-color: rgba(244,63,94,0.25) !important;
}

    </style>
</head>
<body>
    

    <aside class="sidebar" id="sb">
        <div class="sb-head">
            <div class="brand-logo">
                <i class="bi bi-stars"></i>
                <span class="lbl">CoiffeurPro</span>
            </div>
            <span class="brand-tagline" style="font-size: 0.6rem; letter-spacing: 2px; margin-left: 32px;">MAESTRO DASHBOARD</span>
        </div>

        <div class="sb-user">
            <div class="u-av">
                {{ strtoupper(substr(Auth::user()->firstname, 0, 1) . substr(Auth::user()->lastname, 0, 1)) }}
            </div>
            <div class="u-info">
                <div class="u-role" style="font-size: 0.75rem; color: var(--gold); opacity: 0.8;">{{ Auth::user()->ferstname}}-{{  Auth::user()->lastname}}</div>
            </div>
        </div>

        <nav class="sb-nav" style="flex: 1;">
            <div class="sec-lbl">Principal</div>
            <a class="ni {{ request()->routeIs('barber.dashboard') ? 'active' : '' }}" href="{{ route('barber.dashboard') }}">
                <i class="bi bi-grid-1x2"></i><span class="lbl">Vue d'ensemble</span>
            </a>
            
            <div class="sec-lbl">Atelier</div>
            <a class="ni {{ request()->routeIs('create.services') ? 'active' : '' }}" href="{{ route('create.services') }}">
                <i class="bi bi-scissors"></i><span class="lbl">Services & Prix</span>
            </a>
            <a class="ni {{ request()->routeIs('barber.planning.*') ? 'active' : '' }}" href="{{ route('barber.planning') }}">
                <i class="bi bi-calendar-range"></i><span class="lbl">Planning</span>
            </a>
              <a href="{{ route('barber.profile') }}"
                class="nav-link-custom {{ request()->routeIs('barber.profile') ? 'active' : '' }}">
                <span class="nav-text">Mon Profil</span>
                <i class="bi bi-chevron-right ms-auto small opacity-50 nav-arrow"></i>
            </a>

            <div class="sec-lbl">Système</div>
            <a class="ni text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-door-open"></i><span class="lbl">Déconnexion</span>
            </a>
        </nav>

        
    </aside>

    <div class="main-wrapper" id="main-content">
        <header class="topbar">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h4 mb-0 fw-bold" style="font-family: 'Playfair Display', serif; letter-spacing: 0.5px;">@yield('page-title')</h1>
                    <p class="text-muted small mb-0">Gestion de votre établissement en temps réel</p>
                </div>
                <div class="topbar-actions d-flex align-items-center gap-3">
                    @yield('topbar-actions')
                    <div class="position-relative" style="cursor: pointer;">
                        <i class="bi bi-bell" style="font-size: 1.3rem; color: var(--muted);"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.5rem;">3</span>
                    </div>
                    <div class="u-av" style="width: 38px; height: 38px; cursor: pointer; border: 2px solid var(--border);">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
            </div>
        </header>

        <main class="content px-4 py-4">
            @yield('content')
        </main>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>

    <script>
        const sb = document.getElementById('sb');
        const main = document.getElementById('main-content');
        const btn = document.getElementById('toggleBtn');
        const icon = document.getElementById('toggleIcon');

        btn.addEventListener('click', () => {
            sb.classList.toggle('collapsed');
            main.classList.toggle('expanded');
            
            // Animation de l'icône de toggle
            if(sb.classList.contains('collapsed')) {
                icon.classList.replace('bi-chevron-left', 'bi-chevron-right');
            } else {
                icon.classList.replace('bi-chevron-right', 'bi-chevron-left');
            }
        });
    </script>
    @stack('scripts')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>