<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CoiffeurPro – @yield('title', 'Administration')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />

    <style>
        :root {
            --gold: #D4AF37;
            --gold-glow: rgba(212, 175, 55, 0.3);
            --bg-deep: #0f1115;
            --bg-card: #1a1d23;
            --text-main: #f8f9fa;
            --text-muted: #8e95a2;
            --border-thin: rgba(255, 255, 255, 0.05);
        }

        body {
            background-color: var(--bg-deep);
            color: var(--text-main);
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
        }

        /* --- SIDEBAR REFINED --- */
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #16191e 0%, #0f1115 100%);
            border-right: 1px solid var(--border-thin);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            z-index: 1000;
        }

        .sb-head {
            padding: 2rem 1.5rem;
            text-align: center;
        }

        .brand-logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--gold);
            letter-spacing: -0.5px;
            text-shadow: 0 0 15px var(--gold-glow);
        }

        .sb-user {
            margin: 0 1.2rem 1.5rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            border: 1px solid var(--border-thin);
        }

        .u-av {
            width: 40px;
            height: 40px;
            background: var(--gold);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--bg-deep);
            font-size: 1.2rem;
        }

        .ni {
            margin: 4px 15px;
            padding: 12px 16px;
            color: var(--text-muted);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 10px;
            transition: 0.3s ease;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .ni i {
            font-size: 1.1rem;
        }

        .ni:hover {
            background: rgba(255, 255, 255, 0.05);
            color: var(--white);
        }

        .ni.active {
            background: var(--gold-glow);
            color: var(--gold);
            box-shadow: inset 0 0 10px rgba(212, 175, 55, 0.1);
        }

        .sec-lbl {
            padding: 1.5rem 1.8rem 0.5rem;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--text-muted);
            opacity: 0.6;
        }

        /* --- MAIN LAYOUT --- */
        .main {
            flex: 1;
            margin-left: 260px;
            padding: 0;
            background-image: radial-gradient(circle at top right, rgba(212, 175, 55, 0.05), transparent);
        }

        .topbar {
            height: 80px;
            padding: 0 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(15, 17, 21, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-thin);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .t-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 700;
        }

        .t-sub {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .content {
            padding: 2.5rem;
        }

        /* --- UI COMPONENTS --- */
        .tc {
            background: var(--bg-card);
            border-radius: 16px;
            border: 1px solid var(--border-thin);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .th {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-thin);
        }

        .btn-g {
            background: var(--gold);
            color: #000;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.85rem;
            transition: 0.3s;
        }

        .btn-g:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px var(--gold-glow);
            background: #e5be47;
        }

        .pill {
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.05);
        }

        /* Stats Card Styling */
        .sc {
            background: var(--bg-card);
            border: 1px solid var(--border-thin);
            border-radius: 16px;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .sc:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.3);
            border-color: rgba(212, 175, 55, 0.2);
        }

        .sc .accent {
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
        }

        .sc-ico {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        /* Glassy Icon Colors */
        .sc-ico.g {
            background: rgba(212, 175, 55, 0.1);
            color: var(--gold);
        }

        .sc-ico.p {
            background: rgba(168, 85, 247, 0.1);
            color: #a855f7;
        }

        .sc-ico.b {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
        }

        .sc-ico.gr {
            background: rgba(34, 197, 94, 0.1);
            color: #22c55e;
        }

        .sc-ico.o {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }

        .sc-ico.r {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        .sc-val {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-main);
            line-height: 1;
            margin-bottom: 0.3rem;
        }

        .sc-lbl {
            font-size: 0.75rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        /* Alerts */
        .alert-ok,
        .alert-err {
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
        }

        .alert-ok {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #22c55e;
        }

        .alert-err {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #ef4444;
        }

        /* Table Styles */
        .tt {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .tt thead th {
            background: rgba(255, 255, 255, 0.02);
            padding: 1.2rem 1.5rem;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border-thin);
            font-weight: 600;
        }

        .tt tbody td {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border-thin);
            vertical-align: middle;
            font-size: 0.9rem;
            transition: 0.2s ease;
        }

        .tt tbody tr:hover td {
            background: rgba(255, 255, 255, 0.01);
        }

        /* User Avatar Initials */
        .user-init {
            width: 35px;
            height: 35px;
            background: var(--bg-deep);
            border: 1px solid var(--border-thin);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            color: var(--gold);
            font-weight: 700;
            text-shadow: 0 0 5px var(--gold-glow);
        }

        /* Pill Colors for the new UI */
        .pill.pp {
            background: rgba(168, 85, 247, 0.1);
            color: #a855f7;
            border: 1px solid rgba(168, 85, 247, 0.2);
        }

        .pill.po {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .pill.pb {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .pill.pg {
            background: rgba(34, 197, 94, 0.1);
            color: #22c55e;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        /* Progress Bars for Stats */
        .prog {
            height: 6px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        .prog-f {
            height: 100%;
            background: linear-gradient(90deg, var(--gold), #e5be47);
            border-radius: 10px;
            box-shadow: 0 0 10px var(--gold-glow);
        }

        /* Action Buttons */
        .btn-sm {
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            border: 1px solid transparent;
            transition: 0.2s;
            background: transparent;
        }

        .eg {
            color: var(--gold);
            border-color: rgba(212, 175, 55, 0.2);
        }

        .eg:hover {
            background: var(--gold);
            color: #000;
        }

        .er {
            color: #ef4444;
            border-color: rgba(239, 68, 68, 0.2);
        }

        .er:hover {
            background: #ef4444;
            color: #fff;
        }

        /* Modal Styling */
        .modal-content {
            background: var(--bg-card);
            border: 1px solid var(--border-thin);
            border-radius: 16px;
            color: var(--text-main);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-thin);
        }

        .modal-footer {
            border-top: 1px solid var(--border-thin);
        }

        .form-control {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid var(--border-thin);
            color: #fff;
        }

        .form-control:focus {
            background: rgba(0, 0, 0, 0.3);
            border-color: var(--gold);
            box-shadow: 0 0 0 0.25rem var(--gold-glow);
            color: #fff;
        }
        /* Modal Glassmorphism Effect */
.modal-content {
    background: var(--bg-card) !important;
    border: 1px solid rgba(212, 175, 55, 0.15) !important;
    box-shadow: 0 20px 40px rgba(0,0,0,0.4) !important;
    border-radius: 20px !important;
}

.modal-header {
    border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
    padding: 1.5rem !important;
}

/* Custom Input Styling */
.form-control {
    background: rgba(255, 255, 255, 0.03) !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    color: var(--text-main) !important;
    border-radius: 10px !important;
    padding: 12px 15px !important;
    transition: all 0.3s ease;
}

.form-control:focus {
    background: rgba(255, 255, 255, 0.05) !important;
    border-color: var(--gold) !important;
    box-shadow: 0 0 10px var(--gold-glow) !important;
}

/* Label Spacing */
.tracking-wider {
    font-size: 0.65rem !important;
}

/* Button link color */
.btn-link:hover {
    color: var(--white) !important;
}/* Amélioration de la ligne du tableau */
.tt tbody tr {
    border-bottom: 1px solid rgba(255, 255, 255, 0.03);
    transition: background 0.2s;
}

.tt tbody tr:hover {
    background: rgba(255, 255, 255, 0.01);
}

/* Boîte d'icône dorée */
.icon-box-gold {
    width: 40px; 
    height: 40px; 
    background: rgba(212, 175, 55, 0.1); 
    border: 1px solid rgba(212, 175, 55, 0.2); 
    border-radius: 10px; 
    display: flex; 
    align-items: center; 
    justify-content: center;
    color: var(--gold);
    font-size: 1.1rem;
}

/* Boutons d'action minimalistes */
.btn-action {
    background: none;
    border: none;
    font-size: 1.2rem;
    transition: transform 0.2s;
    padding: 0;
}

.btn-action.edit { color: var(--gold); opacity: 0.7; }
.btn-action.delete { color: #ff4d4d; opacity: 0.7; }
.btn-action:hover { transform: scale(1.2); opacity: 1; }

/* Modal Inputs */
.form-control {
    background: rgba(255, 255, 255, 0.03) !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    padding: 12px 15px !important;
    border-radius: 10px !important;
    color: white !important;
}

.tracking-wider {
    letter-spacing: 1px;
    font-weight: 700;
    font-size: 0.7rem !important;
}
/* --- Variables & Fonts --- */
.font-playfair { font-family: 'Playfair Display', serif; }
.tiny { font-size: 0.75rem; }

/* --- Layout --- */
.luxury-container {
    display: flex;
    justify-content: center;
    padding: 2rem 0;
}

.luxury-card {
    background: #16181D; /* Noir mat luxe */
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    width: 100%;
    max-width: 800px;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    overflow: hidden;
}

/* --- Header --- */
.luxury-header {
    padding: 2rem;
    background: linear-gradient(to right, rgba(201, 168, 76, 0.05), transparent);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.icon-circle-gold {
    width: 45px;
    height: 45px;
    background: rgba(201, 168, 76, 0.1);
    color: #C9A84C;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.btn-back {
    color: rgba(255, 255, 255, 0.4);
    text-decoration: none;
    font-size: 0.85rem;
    transition: 0.3s;
}
.btn-back:hover { color: #C9A84C; }

/* --- Form --- */
.luxury-body { padding: 2.5rem; }

.luxury-label {
    display: block;
    color: rgba(255, 255, 255, 0.5);
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    font-weight: 700;
    margin-bottom: 0.8rem;
}

.input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.input-wrapper i {
    position: absolute;
    left: 1rem;
    color: #C9A84C;
}

.input-wrapper input, .luxury-body textarea {
    width: 100%;
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 12px;
    padding: 0.8rem 1rem 0.8rem 2.8rem;
    color: #fff;
    transition: all 0.3s ease;
}

.luxury-body textarea { padding-left: 1rem; }

.input-wrapper input:focus, .luxury-body textarea:focus {
    outline: none;
    border-color: #C9A84C;
    background: rgba(255, 255, 255, 0.05);
    box-shadow: 0 0 15px rgba(201, 168, 76, 0.1);
}

/* --- Info Box --- */
.luxury-info-box {
    background: rgba(255, 255, 255, 0.02);
    border: 1px dashed rgba(201, 168, 76, 0.2);
    padding: 1rem 1.5rem;
    border-radius: 12px;
}

/* --- Buttons --- */
.btn-gold-luxury {
    background: #C9A84C;
    color: #000;
    border: none;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 700;
    font-size: 0.85rem;
    flex-grow: 1;
    transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.btn-gold-luxury:hover {
    background: #e2c065;
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(201, 168, 76, 0.2);
}

.btn-outline-luxury {
    background: transparent;
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: rgba(255, 255, 255, 0.6);
    padding: 1rem 2rem;
    border-radius: 50px;
    text-decoration: none;
    font-size: 0.85rem;
    transition: 0.3s;
}

.btn-outline-luxury:hover {
    background: rgba(255, 255, 255, 0.05);
    color: #fff;
}

.error-text { color: #ef4444; font-size: 0.75rem; margin-top: 0.5rem; display: block; }
/* --- Card & Header --- */
.admin-card {
    background: #16181D;
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 16px;
    overflow: hidden;
}

.admin-card-header {
    padding: 1.5rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.btn-link-gold {
    color: var(--gold);
    text-decoration: none;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* --- Table Styles --- */
.table-minimal {
    width: 100%;
    border-collapse: collapse;
}

.table-minimal th {
    padding: 1rem 1.5rem;
    font-size: 0.65rem;
    text-transform: uppercase;
    color: rgba(255,255,255,0.3);
    letter-spacing: 1px;
}

.table-minimal td {
    padding: 1rem 1.5rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.03);
    vertical-align: middle;
}

.table-minimal tr:last-child td { border-bottom: none; }

/* --- Elements --- */
.avatar-sm {
    width: 32px;
    height: 32px;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 8px;
    display: grid;
    place-items: center;
    font-size: 0.75rem;
    font-weight: bold;
    color: var(--gold);
}

.role-text {
    font-size: 0.75rem;
    font-weight: 600;
}

.tiny { font-size: 0.7rem; }
    </style>

    @stack('styles')
</head>

<body>

    <aside class="sidebar">
        <div class="sb-head">
            <div class="brand-logo">COIFFEUR PRO</div>
            <div style="font-size: 0.6rem; letter-spacing: 4px; color: var(--text-muted); margin-top: 5px;">EST. 2026
            </div>
        </div>

        <div class="sb-user">
            <div class="u-av"><i class="bi bi-person-badge"></i></div>
            <div class="user-info">
                <div class="u-name">{{ Auth::user()->ferstname   }} {{ Auth::user()->lastname   }}</div>
                <div style="font-size: 0.65rem; color: var(--gold); font-weight: 700; text-transform: uppercase;">
                    Administrateur</div>
            </div>
        </div>

        <nav class="sb-nav">
            <div class="sec-lbl">Menu Principal</div>
            <a href="{{ route('admin.dashboard') }}"
                class="ni {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-columns-gap"></i><span>Tableau de bord</span>
            </a>

            <div class="sec-lbl">Management</div>
            <a href="{{ route('admin.users') }}" class="ni {{ request()->is('admin/users*') ? 'active' : '' }}">
                <i class="bi bi-people"></i><span>Clients & Staff</span>
            </a>
            <a href="{{ route('admin.categories') }}"
                class="ni {{ request()->is('admin/categories*') ? 'active' : '' }}">
                <i class="bi bi-layers"></i><span>Catégories</span>
            </a>

            <div class="sec-lbl">Compte</div>
            <a class="ni" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                style="color: var(--red); opacity: 0.8;">
                <i class="bi bi-power"></i><span>Déconnexion</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </nav>
    </aside>

    <div class="main">
        <header class="topbar">
            <div>
                <div class="t-title">@yield('page-title')</div>
                <div class="t-sub">{{ now()->translatedFormat('l d F Y') }}</div>
            </div>

            <div class="d-flex align-items-center gap-3">
                <button
                    style="background: none; border: 1px solid var(--border-thin); color: var(--text-muted); border-radius: 8px; width: 40px; height: 40px;">
                    <i class="bi bi-bell"></i>
                </button>
            </div>
        </header>

        <main class="content">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>