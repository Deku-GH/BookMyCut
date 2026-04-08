<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CoiffeurPro – Espace Coiffeur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <style>
        :root {
            --gold: #C9A84C;
            --gold-l: #e8c96a;
            --gold-dim: rgba(201, 168, 76, 0.12);
            --dark: #0f1012;
            --dark2: #15181e;
            --dark3: #1c1f27;
            --dark4: #242830;
            --muted: #6e7280;
            --white: #eeede8;
            --green: #22c55e;
            --red: #ef4444;
            --blue: #3b82f6;
            --orange: #f59e0b;
            --teal: #14b8a6;
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
            min-height: 100vh;
            display: flex;
        }

        /* SIDEBAR */
        .sidebar {
            width: 242px;
            background: var(--dark2);
            border-right: 1px solid rgba(201, 168, 76, 0.09);
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 200;
            transition: width 0.25s;
        }

        .sidebar.col {
            width: 60px;
        }

        .sidebar.col .lbl,
        .sidebar.col .brand-tagline,
        .sidebar.col .u-info,
        .sidebar.col .sec-lbl,
        .sidebar.col .barber-badge {
            display: none;
        }

        .sb-head {
            padding: 1.2rem 1.1rem;
            border-bottom: 1px solid rgba(201, 168, 76, 0.07);
            display: flex;
            align-items: center;
            gap: 0.7rem;
        }

        .brand-logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            color: var(--gold);
            white-space: nowrap;
            overflow: hidden;
        }

        .brand-tagline {
            font-size: 0.58rem;
            color: var(--muted);
            letter-spacing: 3px;
            text-transform: uppercase;
            display: block;
            margin-top: -2px;
        }

        .barber-badge {
            background: var(--gold-dim);
            color: var(--gold);
            font-size: 0.63rem;
            font-weight: 700;
            padding: 0.15rem 0.5rem;
            border-radius: 4px;
            letter-spacing: 1px;
            text-transform: uppercase;
            flex-shrink: 0;
        }

        .sb-user {
            padding: 0.9rem 1.1rem;
            border-bottom: 1px solid rgba(201, 168, 76, 0.07);
            display: flex;
            align-items: center;
            gap: 0.7rem;
        }

        .u-av {
            width: 38px;
            height: 38px;
            background: var(--gold-dim);
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-family: 'Playfair Display', serif;
            font-size: 0.88rem;
            color: var(--gold);
            font-weight: 700;
        }

        .u-name {
            color: var(--white);
            font-size: 0.86rem;
            font-weight: 600;
        }

        .u-role {
            color: var(--gold);
            font-size: 0.7rem;
            font-weight: 500;
        }

        .u-score {
            color: var(--muted);
            font-size: 0.7rem;
            margin-top: 1px;
        }

        .sb-nav {
            flex: 1;
            padding: 0.6rem 0;
            overflow-y: auto;
        }

        .sec-lbl {
            font-size: 0.63rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--muted);
            padding: 0.8rem 1.1rem 0.25rem;
            font-weight: 500;
        }

        .ni {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.6rem 1.1rem;
            color: var(--muted);
            font-size: 0.86rem;
            cursor: pointer;
            transition: all 0.18s;
            border-left: 2px solid transparent;
            white-space: nowrap;
            text-decoration: none;
        }

        .ni i {
            font-size: 1rem;
            flex-shrink: 0;
            width: 18px;
            text-align: center;
        }

        .ni:hover {
            color: var(--white);
            background: rgba(255, 255, 255, 0.04);
        }

        .ni.active {
            color: var(--gold);
            background: var(--gold-dim);
            border-left-color: var(--gold);
        }

        .ni.danger {
            color: var(--red);
        }

        .sb-foot {
            padding: 0.9rem 1.1rem;
            border-top: 1px solid rgba(201, 168, 76, 0.07);
        }

        .btn-col {
            background: none;
            border: 1px solid rgba(255, 255, 255, 0.07);
            color: var(--muted);
            border-radius: 5px;
            padding: 0.35rem 0.6rem;
            font-size: 0.78rem;
            cursor: pointer;
            width: 100%;
            transition: all 0.2s;
        }

        .btn-col:hover {
            color: var(--white);
        }

        /* MAIN */
        .main {
            flex: 1;
            margin-left: 242px;
            transition: margin-left 0.25s;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main.ex {
            margin-left: 60px;
        }

        .topbar {
            background: var(--dark2);
            border-bottom: 1px solid rgba(201, 168, 76, 0.07);
            padding: 0.85rem 1.6rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .t-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            color: var(--white);
        }

        .t-sub {
            font-size: 0.76rem;
            color: var(--muted);
            margin-top: 1px;
        }

        .t-right {
            display: flex;
            align-items: center;
            gap: 0.7rem;
        }

        .ib {
            width: 34px;
            height: 34px;
            background: var(--dark3);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--muted);
            transition: all 0.2s;
            position: relative;
        }

        .ib:hover {
            color: var(--gold);
            border-color: rgba(201, 168, 76, 0.3);
        }

        .ndot {
            position: absolute;
            top: 4px;
            right: 4px;
            width: 7px;
            height: 7px;
            background: var(--gold);
            border-radius: 50%;
            border: 1px solid var(--dark2);
        }

        .content {
            padding: 1.6rem;
            flex: 1;
        }

        /* STAT CARDS */
        .sc {
            background: var(--dark2);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 1.3rem;
            transition: all 0.22s;
            position: relative;
            overflow: hidden;
        }

        .sc:hover {
            border-color: rgba(201, 168, 76, 0.2);
            transform: translateY(-2px);
        }

        .sc-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            opacity: 0;
            transition: opacity 0.22s;
        }

        .sc:hover .sc-bar {
            opacity: 1;
        }

        .sc-ico {
            width: 42px;
            height: 42px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.85rem;
        }

        .sc-ico i {
            font-size: 1.15rem;
        }

        .sc-ico.g {
            background: var(--gold-dim);
        }

        .sc-ico.g i {
            color: var(--gold);
        }

        .sc-ico.gr {
            background: rgba(34, 197, 94, 0.1);
        }

        .sc-ico.gr i {
            color: var(--green);
        }

        .sc-ico.b {
            background: rgba(59, 130, 246, 0.1);
        }

        .sc-ico.b i {
            color: var(--blue);
        }

        .sc-ico.o {
            background: rgba(245, 158, 11, 0.1);
        }

        .sc-ico.o i {
            color: var(--orange);
        }

        .sc-ico.t {
            background: rgba(20, 184, 166, 0.1);
        }

        .sc-ico.t i {
            color: var(--teal);
        }

        .sc-val {
            font-family: 'Playfair Display', serif;
            font-size: 1.85rem;
            color: var(--white);
            font-weight: 700;
            line-height: 1;
        }

        .sc-lbl {
            font-size: 0.78rem;
            color: var(--muted);
            margin-top: 0.25rem;
        }

        .trend {
            display: inline-flex;
            align-items: center;
            font-size: 0.71rem;
            padding: 0.12rem 0.48rem;
            border-radius: 20px;
            font-weight: 600;
            margin-top: 0.45rem;
        }

        .up {
            background: rgba(34, 197, 94, 0.1);
            color: var(--green);
        }

        .dn {
            background: rgba(239, 68, 68, 0.1);
            color: var(--red);
        }

        /* TABLE CARD */
        .tc {
            background: var(--dark2);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            overflow: hidden;
        }

        .th {
            padding: 1.1rem 1.3rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .th h6 {
            font-family: 'Playfair Display', serif;
            color: var(--white);
            font-size: 0.97rem;
            margin: 0;
        }

        table.tt {
            width: 100%;
            border-collapse: collapse;
        }

        table.tt th {
            font-size: 0.7rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--muted);
            padding: 0.7rem 1.3rem;
            font-weight: 500;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        table.tt td {
            padding: 0.8rem 1.3rem;
            font-size: 0.85rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            color: #bbbec7;
            vertical-align: middle;
        }

        table.tt tr:last-child td {
            border-bottom: none;
        }

        table.tt tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 0.28rem;
            padding: 0.17rem 0.65rem;
            border-radius: 20px;
            font-size: 0.72rem;
            font-weight: 600;
        }

        .pill::before {
            content: '';
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: currentColor;
        }

        .pg {
            background: rgba(34, 197, 94, 0.1);
            color: var(--green);
        }

        .po {
            background: var(--gold-dim);
            color: var(--gold);
        }

        .pr {
            background: rgba(239, 68, 68, 0.1);
            color: var(--red);
        }

        .pb {
            background: rgba(59, 130, 246, 0.1);
            color: var(--blue);
        }

        .pt {
            background: rgba(20, 184, 166, 0.1);
            color: var(--teal);
        }

        /* BUTTONS */
        .btn-g {
            background: var(--gold);
            color: var(--dark);
            border: none;
            border-radius: 6px;
            font-weight: 600;
            padding: 0.5rem 1.1rem;
            font-size: 0.83rem;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .btn-g:hover {
            background: var(--gold-l);
            color: var(--dark);
        }

        .btn-do {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.09);
            color: var(--muted);
            border-radius: 6px;
            padding: 0.5rem 1rem;
            font-size: 0.83rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-do:hover {
            color: var(--white);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .btn-sm {
            border: none;
            border-radius: 5px;
            padding: 0.2rem 0.58rem;
            font-size: 0.74rem;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.18s;
        }

        .btn-sm.eg {
            background: var(--gold-dim);
            color: var(--gold);
            border: 1px solid rgba(201, 168, 76, 0.2);
        }

        .btn-sm.eg:hover {
            background: rgba(201, 168, 76, 0.22);
        }

        .btn-sm.er {
            background: rgba(239, 68, 68, 0.1);
            color: #fca5a5;
            border: 1px solid rgba(239, 68, 68, 0.15);
        }

        .btn-sm.et {
            background: rgba(20, 184, 166, 0.1);
            color: var(--teal);
            border: 1px solid rgba(20, 184, 166, 0.15);
        }

        /* FORM */
        .form-control,
        .form-select {
            background: var(--dark3);
            border: 1px solid rgba(255, 255, 255, 0.07);
            color: var(--white);
            border-radius: 6px;
            font-size: 0.87rem;
        }

        .form-control:focus,
        .form-select:focus {
            background: var(--dark3);
            color: var(--white);
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(201, 168, 76, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: rgba(110, 114, 128, 0.6);
        }

        .form-select option {
            background: var(--dark3);
        }

        .form-label {
            color: #b8bbc4;
            font-size: 0.83rem;
            margin-bottom: 0.35rem;
        }

        /* MODAL */
        .modal-content {
            background: var(--dark2);
            border: 1px solid rgba(201, 168, 76, 0.18);
            border-radius: 14px;
        }

        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            padding: 1.1rem 1.4rem;
        }

        .modal-title {
            font-family: 'Playfair Display', serif;
            color: var(--white);
            font-size: 1.1rem;
        }

        .modal-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            padding: 0.9rem 1.4rem;
        }

        .btn-close {
            filter: invert(1) opacity(0.4);
        }

        /* SCHEDULE */
        .sched-item {
            background: var(--dark3);
            border-left: 3px solid var(--gold);
            border-radius: 0 9px 9px 0;
            padding: 0.85rem 1rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.2s;
        }

        .sched-item:hover {
            background: var(--dark4);
        }

        .sched-item.done {
            border-left-color: var(--green);
            opacity: 0.7;
        }

        .sched-item.current {
            border-left-color: var(--gold);
            background: rgba(201, 168, 76, 0.06);
            box-shadow: 0 0 0 1px rgba(201, 168, 76, 0.15);
        }

        .sched-item.waiting {
            border-left-color: var(--blue);
        }

        .sched-time {
            font-family: 'Playfair Display', serif;
            font-size: 0.95rem;
            color: var(--gold);
            min-width: 50px;
            flex-shrink: 0;
        }

        .sched-info {
            flex: 1;
        }

        .sched-client {
            color: var(--white);
            font-size: 0.87rem;
            font-weight: 600;
        }

        .sched-svc {
            color: var(--muted);
            font-size: 0.77rem;
            margin-top: 2px;
        }

        .sched-dur {
            color: var(--muted);
            font-size: 0.75rem;
            flex-shrink: 0;
        }

        /* CALENDAR SLOT GRID */
        .slot-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.4rem;
        }

        .slot-it {
            background: var(--dark3);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 7px;
            padding: 0.5rem;
            text-align: center;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .slot-it.open {
            border-color: rgba(34, 197, 94, 0.2);
            color: var(--green);
        }

        .slot-it.taken {
            border-color: rgba(239, 68, 68, 0.15);
            color: var(--red);
            opacity: 0.6;
            cursor: not-allowed;
        }

        .slot-it.partial {
            border-color: rgba(245, 158, 11, 0.2);
            color: var(--orange);
        }

        .slot-it .cap {
            font-size: 0.68rem;
            color: var(--muted);
            margin-top: 2px;
        }

        /* PROGRESS */
        .prog {
            height: 5px;
            background: rgba(255, 255, 255, 0.06);
            border-radius: 3px;
            overflow: hidden;
        }

        .prog-f {
            height: 100%;
            border-radius: 3px;
            background: var(--gold);
        }

        /* NEXT APPT CARD */
        .next-card {
            background: linear-gradient(135deg, #1a1610 0%, var(--dark3) 100%);
            border: 1px solid rgba(201, 168, 76, 0.2);
            border-radius: 14px;
            padding: 1.4rem;
            position: relative;
            overflow: hidden;
        }

        .next-card::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(201, 168, 76, 0.05), transparent 70%);
        }

        /* PAGES */
        .ps {
            display: none;
        }

        .ps.active {
            display: block;
        }

        /* AVAILABILITY TOGGLE */
        .avail-wrap {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.7rem 1.1rem;
            background: var(--dark3);
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .avail-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            flex-shrink: 0;
            transition: background 0.3s;
        }

        .avail-dot.on {
            background: var(--green);
            box-shadow: 0 0 6px rgba(34, 197, 94, 0.5);
        }

        .avail-dot.off {
            background: var(--red);
        }
    </style>
</head>

<body>

    <!-- ======================== SIDEBAR ======================== -->
    <aside class="sidebar" id="sb">
        <div class="sb-head">
            <div>
                <div class="brand-logo">✦ CoiffeurPro</div>
                <span class="brand-tagline">Espace coiffeur</span>
            </div>
            <span class="barber-badge lbl">Coiffeur</span>
        </div>
        <div class="sb-user">
            <div class="u-av">KA</div>
            <div class="u-info">
                <div class="u-name">{{ Auth()->user()->firstname }} {{ Auth()->user()->lastname }}</div>
                <div class="u-role">Coiffeur · Spécialiste Coupe</div>
                <div class="u-score">⭐ 4.9 · 38 RDV ce mois</div>
            </div>
        </div>
        <nav class="sb-nav">
            <a class="ni" onclick="sp('services',this)"><i class="bi bi-list-stars"></i><span
                    class="lbl">Services</span></a>

            <div class="sec-lbl">Tableau de bord</div>
            <a class="ni active" onclick="sp('today',this)"><i class="bi bi-sun"></i><span class="lbl">Mon
                    planning</span></a>
            <a class="ni" onclick="sp('rdvs',this)"><i class="bi bi-calendar3"></i><span class="lbl">Mes
                    réservations</span></a>

            <div class="sec-lbl">Gestion</div>
            <a class="ni" onclick="sp('slots',this)"><i class="bi bi-clock"></i><span class="lbl">Mes
                    créneaux</span></a>
            <a class="ni" onclick="sp('clients',this)"><i class="bi bi-people"></i><span class="lbl">Mes
                    clients</span></a>

            <div class="sec-lbl">Performance</div>
            <a class="ni" onclick="sp('stats',this)"><i class="bi bi-bar-chart-line"></i><span class="lbl">Mes
                    statistiques</span></a>

            <div class="sec-lbl">Compte</div>
            <a class="ni" onclick="sp('profil',this)"><i class="bi bi-person"></i><span class="lbl">Mon
                    profil</span></a>
            <a class="ni danger" href="login.html"><i class="bi bi-box-arrow-left"></i><span
                    class="lbl">Déconnexion</span></a>
        </nav>
        <div class="sb-foot">
            <button class="btn-col" onclick="tc()"><i class="bi bi-chevron-double-left" id="ci"></i><span
                    class="lbl ms-1">Réduire</span></button>
        </div>
    </aside>

    <!-- ======================== MAIN ======================== -->
    <div class="main" id="mn">
        <div class="topbar">
            <div>
                <div class="t-title" id="pt">Mon planning</div>
                <div class="t-sub">Vendredi 3 Janvier 2025 · Bonjour Karim 👋</div>
            </div>
            <div class="t-right">
                <!-- Availability toggle -->
                <div class="avail-wrap" id="availWrap" onclick="toggleAvail()">
                    <span class="avail-dot on" id="availDot"></span>
                    <span style="font-size:0.82rem;font-weight:500;color:var(--white)" id="availText">Disponible</span>
                </div>
                <div class="ib" title="Notifications"><i class="bi bi-bell"></i><span class="ndot"></span></div>
            </div>
        </div>

        <div class="content">

            <!-- ===== TODAY'S PLANNING ===== -->
            <div class="ps active" id="p-today">
                <!-- KPIs -->
                <div class="row g-3 mb-4">
                    <div class="col-6 col-xl-3">
                        <div class="sc">
                            <div class="sc-bar" style="background:var(--gold)"></div>
                            <div class="sc-ico g"><i class="bi bi-calendar-day"></i></div>
                            <div class="sc-val">7</div>
                            <div class="sc-lbl">RDV aujourd'hui</div>
                            <div class="trend up">3 restants</div>
                        </div>
                    </div>
                    <div class="col-6 col-xl-3">
                        <div class="sc">
                            <div class="sc-bar" style="background:var(--teal)"></div>
                            <div class="sc-ico t"><i class="bi bi-check2-circle"></i></div>
                            <div class="sc-val">4</div>
                            <div class="sc-lbl">Terminés</div>
                            <div class="trend up"><i class="bi bi-check2"></i> 57%</div>
                        </div>
                    </div>
                    <div class="col-6 col-xl-3">
                        <div class="sc">
                            <div class="sc-bar" style="background:var(--orange)"></div>
                            <div class="sc-ico o"><i class="bi bi-cash-coin"></i></div>
                            <div class="sc-val">580</div>
                            <div class="sc-lbl">Revenus auj. (MAD)</div>
                            <div class="trend up">+120 à venir</div>
                        </div>
                    </div>
                    <div class="col-6 col-xl-3">
                        <div class="sc">
                            <div class="sc-bar" style="background:var(--blue)"></div>
                            <div class="sc-ico b"><i class="bi bi-clock"></i></div>
                            <div class="sc-val">14h00</div>
                            <div class="sc-lbl">Prochain client</div>
                            <div class="trend pb" style="background:rgba(59,130,246,0.1);color:var(--blue)">dans 1h30
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <!-- Schedule timeline -->
                    <div class="col-lg-6">
                        <div class="tc">
                            <div class="th">
                                <h6>Planning du jour — 3 Janvier</h6>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="pill pg">Ouvert</span>
                                    <span style="font-size:0.77rem;color:var(--muted)">8h–20h</span>
                                </div>
                            </div>
                            <div class="p-3">
                                <div class="sched-item done">
                                    <div class="sched-time">08h30</div>
                                    <div class="sched-info">
                                        <div class="sched-client">Omar Bensaid</div>
                                        <div class="sched-svc">Coupe de cheveux · 30min</div>
                                    </div>
                                    <span class="pill pg">Terminé</span>
                                </div>
                                <div class="sched-item done">
                                    <div class="sched-time">09h00</div>
                                    <div class="sched-info">
                                        <div class="sched-client">Nabil Fassi</div>
                                        <div class="sched-svc">Taille de barbe · 20min</div>
                                    </div>
                                    <span class="pill pg">Terminé</span>
                                </div>
                                <div class="sched-item done">
                                    <div class="sched-time">09h30</div>
                                    <div class="sched-info">
                                        <div class="sched-client">Rachid Ouali</div>
                                        <div class="sched-svc">Coupe + Barbe · 45min</div>
                                    </div>
                                    <span class="pill pg">Terminé</span>
                                </div>
                                <div class="sched-item done">
                                    <div class="sched-time">10h30</div>
                                    <div class="sched-info">
                                        <div class="sched-client">Hamid Zouiten</div>
                                        <div class="sched-svc">Coupe de cheveux · 30min</div>
                                    </div>
                                    <span class="pill pg">Terminé</span>
                                </div>
                                <!-- Current -->
                                <div class="sched-item current">
                                    <div class="sched-time">12h30</div>
                                    <div class="sched-info">
                                        <div class="sched-client">Youssef El Idrissi</div>
                                        <div class="sched-svc">Coupe + Barbe · 45min</div>
                                    </div>
                                    <button class="btn-sm et"
                                        onclick="alert('✦ Rendez-vous marqué comme terminé !')">Terminer</button>
                                </div>
                                <!-- Upcoming -->
                                <div class="sched-item waiting">
                                    <div class="sched-time">14h00</div>
                                    <div class="sched-info">
                                        <div class="sched-client">Said Moussaoui</div>
                                        <div class="sched-svc">Soin & Shampoing · 30min</div>
                                    </div>
                                    <span class="pill pb">En attente</span>
                                </div>
                                <div class="sched-item waiting">
                                    <div class="sched-time">15h00</div>
                                    <div class="sched-info">
                                        <div class="sched-client">Mehdi Alami</div>
                                        <div class="sched-svc">Forfait Premium · 75min</div>
                                    </div>
                                    <span class="pill pb">En attente</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right col -->
                    <div class="col-lg-6 d-flex flex-column gap-4">
                        <!-- Next client highlight -->
                        <div class="next-card">
                            <div
                                style="font-size:0.68rem;letter-spacing:3px;text-transform:uppercase;color:var(--gold);font-weight:500;margin-bottom:0.7rem">
                                ✦ Client en cours</div>
                            <div
                                style="font-family:'Playfair Display',serif;font-size:1.5rem;color:var(--white);margin-bottom:0.5rem">
                                Youssef El Idrissi</div>
                            <div
                                style="display:flex;align-items:center;gap:0.5rem;font-size:0.88rem;color:#c0c3ca;margin-bottom:0.4rem">
                                <i class="bi bi-scissors" style="color:var(--gold)"></i>Coupe + Barbe — 45 min
                            </div>
                            <div
                                style="display:flex;align-items:center;gap:0.5rem;font-size:0.88rem;color:#c0c3ca;margin-bottom:1.2rem">
                                <i class="bi bi-clock" style="color:var(--gold)"></i>Commencé à 12h30 · fin prévue 13h15
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn-sm et"
                                    onclick="alert('✦ Service terminé ! Client suivant : Said Moussaoui à 14h00')"><i
                                        class="bi bi-check2-circle me-1"></i>Terminer le service</button>
                                <button class="btn-sm er" onclick="alert('Rendez-vous signalé.')"><i
                                        class="bi bi-flag me-1"></i>Signaler</button>
                            </div>
                        </div>

                        <!-- Occupancy today -->
                        <div class="tc">
                            <div class="th">
                                <h6>Créneaux aujourd'hui</h6>
                            </div>
                            <div class="p-3">
                                <div class="slot-grid">
                                    <div class="slot-it taken">08h30<div class="cap">Passé</div>
                                    </div>
                                    <div class="slot-it taken">09h00<div class="cap">Passé</div>
                                    </div>
                                    <div class="slot-it taken">09h30<div class="cap">Passé</div>
                                    </div>
                                    <div class="slot-it taken">10h30<div class="cap">Passé</div>
                                    </div>
                                    <div class="slot-it" style="border-color:rgba(201,168,76,0.3);color:var(--gold)">
                                        12h30<div class="cap">En cours</div>
                                    </div>
                                    <div class="slot-it partial">14h00<div class="cap">Réservé</div>
                                    </div>
                                    <div class="slot-it partial">15h00<div class="cap">Réservé</div>
                                    </div>
                                    <div class="slot-it open">16h30<div class="cap">Libre</div>
                                    </div>
                                    <div class="slot-it open">17h00<div class="cap">Libre</div>
                                    </div>
                                    <div class="slot-it open">17h30<div class="cap">Libre</div>
                                    </div>
                                    <div class="slot-it open">18h00<div class="cap">Libre</div>
                                    </div>
                                    <div class="slot-it open">18h30<div class="cap">Libre</div>
                                    </div>
                                </div>
                                <div class="d-flex gap-3 mt-3 flex-wrap">
                                    <div class="d-flex align-items-center gap-1"><span
                                            style="width:8px;height:8px;border-radius:50%;background:var(--green);display:inline-block"></span><span
                                            style="font-size:0.75rem;color:var(--muted)">Libre</span></div>
                                    <div class="d-flex align-items-center gap-1"><span
                                            style="width:8px;height:8px;border-radius:50%;background:var(--gold);display:inline-block"></span><span
                                            style="font-size:0.75rem;color:var(--muted)">En cours</span></div>
                                    <div class="d-flex align-items-center gap-1"><span
                                            style="width:8px;height:8px;border-radius:50%;background:var(--orange);display:inline-block"></span><span
                                            style="font-size:0.75rem;color:var(--muted)">Réservé</span></div>
                                    <div class="d-flex align-items-center gap-1"><span
                                            style="width:8px;height:8px;border-radius:50%;background:var(--red);display:inline-block"></span><span
                                            style="font-size:0.75rem;color:var(--muted)">Passé</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== RESERVATIONS ===== -->
            <div class="ps" id="p-rdvs">
                <div class="tc">
                    <div class="th">
                        <h6>Mes réservations</h6>
                        <div class="d-flex gap-2 flex-wrap">
                            <input type="date" class="form-control form-control-sm" style="width:auto" />
                            <select class="form-select form-select-sm" style="width:auto">
                                <option>Tous</option>
                                <option>En attente</option>
                                <option>En cours</option>
                                <option>Terminé</option>
                                <option>Annulé</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="tt">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <th>Service</th>
                                    <th>Date</th>
                                    <th>Heure</th>
                                    <th>Durée</th>
                                    <th>Montant</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="color:var(--muted)">#124</td>
                                    <td>Youssef El I.</td>
                                    <td>Coupe+Barbe</td>
                                    <td>3 Jan</td>
                                    <td>12h30</td>
                                    <td>45min</td>
                                    <td style="color:var(--gold)">70</td>
                                    <td><span class="pill po">En cours</span></td>
                                    <td><button class="btn-sm et">Terminer</button></td>
                                </tr>
                                <tr>
                                    <td style="color:var(--muted)">#123</td>
                                    <td>Said Moussa</td>
                                    <td>Soin</td>
                                    <td>3 Jan</td>
                                    <td>14h00</td>
                                    <td>30min</td>
                                    <td style="color:var(--gold)">40</td>
                                    <td><span class="pill pb">En attente</span></td>
                                    <td><button class="btn-sm eg">Détails</button></td>
                                </tr>
                                <tr>
                                    <td style="color:var(--muted)">#122</td>
                                    <td>Mehdi Alami</td>
                                    <td>Forfait Premium</td>
                                    <td>3 Jan</td>
                                    <td>15h00</td>
                                    <td>75min</td>
                                    <td style="color:var(--gold)">100</td>
                                    <td><span class="pill pb">En attente</span></td>
                                    <td><button class="btn-sm eg">Détails</button></td>
                                </tr>
                                <tr>
                                    <td style="color:var(--muted)">#121</td>
                                    <td>Hamid Z.</td>
                                    <td>Coupe</td>
                                    <td>3 Jan</td>
                                    <td>10h30</td>
                                    <td>30min</td>
                                    <td style="color:var(--gold)">50</td>
                                    <td><span class="pill pg">Terminé</span></td>
                                    <td>—</td>
                                </tr>
                                <tr>
                                    <td style="color:var(--muted)">#120</td>
                                    <td>Rachid O.</td>
                                    <td>Coupe+Barbe</td>
                                    <td>3 Jan</td>
                                    <td>09h30</td>
                                    <td>45min</td>
                                    <td style="color:var(--gold)">70</td>
                                    <td><span class="pill pg">Terminé</span></td>
                                    <td>—</td>
                                </tr>
                                <tr>
                                    <td style="color:var(--muted)">#119</td>
                                    <td>Nabil Fassi</td>
                                    <td>Barbe</td>
                                    <td>3 Jan</td>
                                    <td>09h00</td>
                                    <td>20min</td>
                                    <td style="color:var(--gold)">30</td>
                                    <td><span class="pill pg">Terminé</span></td>
                                    <td>—</td>
                                </tr>
                                <tr>
                                    <td style="color:var(--muted)">#118</td>
                                    <td>Omar Bensaid</td>
                                    <td>Coupe</td>
                                    <td>3 Jan</td>
                                    <td>08h30</td>
                                    <td>30min</td>
                                    <td style="color:var(--gold)">50</td>
                                    <td><span class="pill pg">Terminé</span></td>
                                    <td>—</td>
                                </tr>
                                <tr>
                                    <td style="color:var(--muted)">#115</td>
                                    <td>Karim Tahiri</td>
                                    <td>Coloration</td>
                                    <td>2 Jan</td>
                                    <td>14h30</td>
                                    <td>60min</td>
                                    <td style="color:var(--gold)">120</td>
                                    <td><span class="pill pr">Annulé</span></td>
                                    <td>—</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ===== SLOTS ===== -->
            <div class="ps" id="p-slots">
                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="tc">
                            <div class="th">
                                <h6>Mes créneaux disponibles</h6>
                                <div class="d-flex gap-2">
                                    <input type="date" class="form-control form-control-sm" style="width:auto" />
                                    <button class="btn-g" style="padding:0.4rem 0.9rem;font-size:0.8rem"
                                        data-bs-toggle="modal" data-bs-target="#addSlotModal"><i
                                            class="bi bi-plus"></i>Ajouter</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="tt">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Heure début</th>
                                            <th>Heure fin</th>
                                            <th>Capacité</th>
                                            <th>Réservés</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>3 Jan</td>
                                            <td>08h30</td>
                                            <td>09h00</td>
                                            <td>3</td>
                                            <td style="color:var(--red)">3</td>
                                            <td><span class="pill pr">Complet</span></td>
                                            <td>—</td>
                                        </tr>
                                        <tr>
                                            <td>3 Jan</td>
                                            <td>12h30</td>
                                            <td>13h15</td>
                                            <td>3</td>
                                            <td style="color:var(--gold)">1</td>
                                            <td><span class="pill po">En cours</span></td>
                                            <td>—</td>
                                        </tr>
                                        <tr>
                                            <td>3 Jan</td>
                                            <td>16h30</td>
                                            <td>17h00</td>
                                            <td>3</td>
                                            <td style="color:var(--green)">0</td>
                                            <td><span class="pill pg">Libre</span></td>
                                            <td><button class="btn-sm er">Supprimer</button></td>
                                        </tr>
                                        <tr>
                                            <td>4 Jan</td>
                                            <td>09h00</td>
                                            <td>09h30</td>
                                            <td>3</td>
                                            <td style="color:var(--green)">0</td>
                                            <td><span class="pill pg">Libre</span></td>
                                            <td><button class="btn-sm er">Supprimer</button></td>
                                        </tr>
                                        <tr>
                                            <td>4 Jan</td>
                                            <td>10h00</td>
                                            <td>10h45</td>
                                            <td>3</td>
                                            <td style="color:var(--green)">1</td>
                                            <td><span class="pill pb">Partiel</span></td>
                                            <td><button class="btn-sm eg">Éditer</button></td>
                                        </tr>
                                        <tr>
                                            <td>5 Jan</td>
                                            <td>14h00</td>
                                            <td>15h00</td>
                                            <td>3</td>
                                            <td style="color:var(--green)">0</td>
                                            <td><span class="pill pg">Libre</span></td>
                                            <td><button class="btn-sm er">Supprimer</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="tc">
                            <div class="th">
                                <h6>Ajouter un créneau</h6>
                            </div>
                            <div class="p-4">
                                <div class="mb-3"><label class="form-label">Date</label><input type="date"
                                        class="form-control" /></div>
                                <div class="row g-2 mb-3">
                                    <div class="col-6"><label class="form-label">Début</label><input type="time"
                                            class="form-control" value="09:00" /></div>
                                    <div class="col-6"><label class="form-label">Fin</label><input type="time"
                                            class="form-control" value="10:00" /></div>
                                </div>
                                <div class="mb-3"><label class="form-label">Capacité max (clients)</label><input
                                        type="number" class="form-control" value="3" min="1" max="10" /></div>
                                <div class="mb-4"><label class="form-label">Répéter</label><select class="form-select">
                                        <option>Ne pas répéter</option>
                                        <option>Tous les jours cette semaine</option>
                                        <option>Toutes les semaines</option>
                                    </select></div>
                                <button class="btn-g w-100" onclick="alert('✦ Créneau ajouté avec succès !')"><i
                                        class="bi bi-plus-circle me-1"></i>Créer le créneau</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== CLIENTS ===== -->
            <div class="ps" id="p-clients">
                <div class="tc">
                    <div class="th">
                        <h6>Mes clients</h6>
                        <input type="text" class="form-control form-control-sm" placeholder="Rechercher un client..."
                            style="width:200px" />
                    </div>
                    <div class="table-responsive">
                        <table class="tt">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <th>Contact</th>
                                    <th>RDV total</th>
                                    <th>Dernier RDV</th>
                                    <th>Service préféré</th>
                                    <th>Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="color:var(--muted)">C01</td>
                                    <td><strong style="color:var(--white)">Youssef El Idrissi</strong></td>
                                    <td style="color:var(--muted)">+212 6 12 34 56</td>
                                    <td style="color:var(--gold)">8</td>
                                    <td style="color:var(--muted)">3 Jan 2025</td>
                                    <td>Coupe + Barbe</td>
                                    <td>⭐ 5.0</td>
                                </tr>
                                <tr>
                                    <td style="color:var(--muted)">C02</td>
                                    <td><strong style="color:var(--white)">Omar Bensaid</strong></td>
                                    <td style="color:var(--muted)">+212 6 98 76 54</td>
                                    <td style="color:var(--gold)">5</td>
                                    <td style="color:var(--muted)">3 Jan 2025</td>
                                    <td>Coupe</td>
                                    <td>⭐ 4.8</td>
                                </tr>
                                <tr>
                                    <td style="color:var(--muted)">C03</td>
                                    <td><strong style="color:var(--white)">Nabil Fassi</strong></td>
                                    <td style="color:var(--muted)">+212 6 55 44 33</td>
                                    <td style="color:var(--gold)">4</td>
                                    <td style="color:var(--muted)">3 Jan 2025</td>
                                    <td>Barbe</td>
                                    <td>⭐ 4.9</td>
                                </tr>
                                <tr>
                                    <td style="color:var(--muted)">C04</td>
                                    <td><strong style="color:var(--white)">Rachid Ouali</strong></td>
                                    <td style="color:var(--muted)">+212 6 11 22 33</td>
                                    <td style="color:var(--gold)">6</td>
                                    <td style="color:var(--muted)">3 Jan 2025</td>
                                    <td>Coupe + Barbe</td>
                                    <td>⭐ 5.0</td>
                                </tr>
                                <tr>
                                    <td style="color:var(--muted)">C05</td>
                                    <td><strong style="color:var(--white)">Said Moussaoui</strong></td>
                                    <td style="color:var(--muted)">+212 6 77 88 99</td>
                                    <td style="color:var(--gold)">3</td>
                                    <td style="color:var(--muted)">30 Déc 2024</td>
                                    <td>Soin</td>
                                    <td>⭐ 4.7</td>
                                </tr>
                                <tr>
                                    <td style="color:var(--muted)">C06</td>
                                    <td><strong style="color:var(--white)">Hamid Zouiten</strong></td>
                                    <td style="color:var(--muted)">+212 6 33 22 11</td>
                                    <td style="color:var(--gold)">7</td>
                                    <td style="color:var(--muted)">3 Jan 2025</td>
                                    <td>Coupe</td>
                                    <td>⭐ 4.6</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
             <div class="ps" id="p-services">
        <div class="row g-4">
          <div class="col-lg-8">
            <div class="tc">
              <div class="th">
                <h6>Catalogue des services</h6><button class="btn-g" data-bs-toggle="modal"
                  data-bs-target="#addSvcModal"><i class="bi bi-plus"></i>Nouveau</button>
              </div>
              <div class="table-responsive">
                <table class="tt">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Service</th>
                      <th>Durée</th>
                      <th>Prix</th>
                      <th>RDV/mois</th>
                      <th>Visibilité</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="color:var(--muted)">S01</td>
                      <td><i class="bi bi-scissors me-2" style="color:var(--gold)"></i>Coupe de cheveux</td>
                      <td>30 min</td>
                      <td style="color:var(--gold)">50 MAD</td>
                      <td>92</td>
                      <td><label class="tgl"><input type="checkbox" checked /><span class="tgl-sl"></span></label></td>
                      <td><button class="btn-sm eg me-1">Éditer</button><button class="btn-sm er">Suppr.</button></td>
                    </tr>
                    <tr>
                      <td style="color:var(--muted)">S02</td>
                      <td><i class="bi bi-stars me-2" style="color:var(--gold)"></i>Taille de barbe</td>
                      <td>20 min</td>
                      <td style="color:var(--gold)">30 MAD</td>
                      <td>61</td>
                      <td><label class="tgl"><input type="checkbox" checked /><span class="tgl-sl"></span></label></td>
                      <td><button class="btn-sm eg me-1">Éditer</button><button class="btn-sm er">Suppr.</button></td>
                    </tr>
                    <tr>
                      <td style="color:var(--muted)">S03</td>
                      <td><i class="bi bi-gem me-2" style="color:var(--gold)"></i>Coupe + Barbe</td>
                      <td>45 min</td>
                      <td style="color:var(--gold)">70 MAD</td>
                      <td>130</td>
                      <td><label class="tgl"><input type="checkbox" checked /><span class="tgl-sl"></span></label></td>
                      <td><button class="btn-sm eg me-1">Éditer</button><button class="btn-sm er">Suppr.</button></td>
                    </tr>
                    <tr>
                      <td style="color:var(--muted)">S04</td>
                      <td><i class="bi bi-droplet-half me-2" style="color:var(--blue)"></i>Soin & Shampoing</td>
                      <td>30 min</td>
                      <td style="color:var(--gold)">40 MAD</td>
                      <td>34</td>
                      <td><label class="tgl"><input type="checkbox" checked /><span class="tgl-sl"></span></label></td>
                      <td><button class="btn-sm eg me-1">Éditer</button><button class="btn-sm er">Suppr.</button></td>
                    </tr>
                    <tr>
                      <td style="color:var(--muted)">S05</td>
                      <td><i class="bi bi-brush me-2" style="color:var(--purple)"></i>Coloration</td>
                      <td>60 min</td>
                      <td style="color:var(--gold)">120 MAD</td>
                      <td>18</td>
                      <td><label class="tgl"><input type="checkbox" /><span class="tgl-sl"></span></label></td>
                      <td><button class="btn-sm eg me-1">Éditer</button><button class="btn-sm er">Suppr.</button></td>
                    </tr>
                    <tr>
                      <td style="color:var(--muted)">S06</td>
                      <td><i class="bi bi-award me-2" style="color:var(--gold)"></i>Forfait Premium</td>
                      <td>75 min</td>
                      <td style="color:var(--gold)">100 MAD</td>
                      <td>7</td>
                      <td><label class="tgl"><input type="checkbox" checked /><span class="tgl-sl"></span></label></td>
                      <td><button class="btn-sm eg me-1">Éditer</button><button class="btn-sm er">Suppr.</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="tc">
              <div class="th">
                <h6>Performance services</h6>
              </div>
              <div class="p-3 d-flex flex-column gap-3">
                <div>
                  <div class="d-flex justify-content-between mb-1"><span style="font-size:0.82rem;color:#ccc">Coupe +
                      Barbe</span><span style="font-size:0.78rem;color:var(--gold)">38%</span></div>
                  <div class="prog">
                    <div class="prog-f" style="width:38%"></div>
                  </div>
                </div>
                <div>
                  <div class="d-flex justify-content-between mb-1"><span
                      style="font-size:0.82rem;color:#ccc">Coupe</span><span
                      style="font-size:0.78rem;color:var(--gold)">27%</span></div>
                  <div class="prog">
                    <div class="prog-f" style="width:27%"></div>
                  </div>
                </div>
                <div>
                  <div class="d-flex justify-content-between mb-1"><span
                      style="font-size:0.82rem;color:#ccc">Barbe</span><span
                      style="font-size:0.78rem;color:var(--gold)">18%</span></div>
                  <div class="prog">
                    <div class="prog-f" style="width:18%"></div>
                  </div>
                </div>
                <div>
                  <div class="d-flex justify-content-between mb-1"><span
                      style="font-size:0.82rem;color:#ccc">Soin</span><span
                      style="font-size:0.78rem;color:var(--gold)">10%</span></div>
                  <div class="prog">
                    <div class="prog-f" style="width:10%"></div>
                  </div>
                </div>
                <div>
                  <div class="d-flex justify-content-between mb-1"><span
                      style="font-size:0.82rem;color:#ccc">Premium</span><span
                      style="font-size:0.78rem;color:var(--gold)">7%</span></div>
                  <div class="prog">
                    <div class="prog-f" style="width:7%"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

            <!-- ===== STATS ===== -->
            <div class="ps" id="p-stats">
                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="sc">
                            <div class="sc-ico g"><i class="bi bi-calendar-check"></i></div>
                            <div class="sc-val">38</div>
                            <div class="sc-lbl">RDV ce mois</div>
                            <div class="trend up">+6 vs mois passé</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="sc">
                            <div class="sc-ico o"><i class="bi bi-cash-coin"></i></div>
                            <div class="sc-val">4 760</div>
                            <div class="sc-lbl">Revenus (MAD)</div>
                            <div class="trend up">+12%</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="sc">
                            <div class="sc-ico b"><i class="bi bi-star-fill"></i></div>
                            <div class="sc-val">4.9</div>
                            <div class="sc-lbl">Note moyenne</div>
                            <div class="trend up">+0.1</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="sc">
                            <div class="sc-ico gr"><i class="bi bi-people"></i></div>
                            <div class="sc-val">24</div>
                            <div class="sc-lbl">Clients fidèles</div>
                            <div class="trend up">+3</div>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="tc">
                            <div class="th">
                                <h6>RDV par semaine (ce mois)</h6>
                            </div>
                            <div class="p-4">
                                <div style="display:flex;align-items:flex-end;gap:8px;height:90px;">
                                    <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:4px">
                                        <div
                                            style="width:100%;height:55px;border-radius:3px 3px 0 0;background:var(--gold-dim)">
                                        </div>
                                        <div style="font-size:0.65rem;color:var(--muted)">S1</div>
                                    </div>
                                    <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:4px">
                                        <div
                                            style="width:100%;height:70px;border-radius:3px 3px 0 0;background:var(--gold-dim)">
                                        </div>
                                        <div style="font-size:0.65rem;color:var(--muted)">S2</div>
                                    </div>
                                    <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:4px">
                                        <div
                                            style="width:100%;height:45px;border-radius:3px 3px 0 0;background:var(--gold-dim)">
                                        </div>
                                        <div style="font-size:0.65rem;color:var(--muted)">S3</div>
                                    </div>
                                    <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:4px">
                                        <div
                                            style="width:100%;height:80px;border-radius:3px 3px 0 0;background:var(--gold)">
                                        </div>
                                        <div style="font-size:0.65rem;color:var(--muted)">S4</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tc">
                            <div class="th">
                                <h6>Services les plus demandés</h6>
                            </div>
                            <div class="p-4 d-flex flex-column gap-3">
                                <div>
                                    <div class="d-flex justify-content-between mb-1"><span
                                            style="font-size:0.83rem;color:#ccc">Coupe + Barbe</span><span
                                            style="font-size:0.78rem;color:var(--gold)">45%</span></div>
                                    <div class="prog">
                                        <div class="prog-f" style="width:45%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between mb-1"><span
                                            style="font-size:0.83rem;color:#ccc">Coupe</span><span
                                            style="font-size:0.78rem;color:var(--gold)">30%</span></div>
                                    <div class="prog">
                                        <div class="prog-f" style="width:30%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between mb-1"><span
                                            style="font-size:0.83rem;color:#ccc">Barbe</span><span
                                            style="font-size:0.78rem;color:var(--gold)">15%</span></div>
                                    <div class="prog">
                                        <div class="prog-f" style="width:15%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between mb-1"><span
                                            style="font-size:0.83rem;color:#ccc">Soin</span><span
                                            style="font-size:0.78rem;color:var(--gold)">10%</span></div>
                                    <div class="prog">
                                        <div class="prog-f" style="width:10%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== PROFIL ===== -->
            <div class="ps" id="p-profil">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="tc text-center p-4">
                            <div
                                style="width:76px;height:76px;background:var(--gold-dim);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;font-family:'Playfair Display',serif;font-size:1.6rem;color:var(--gold);font-weight:700">
                                KA</div>
                            <div style="font-family:'Playfair Display',serif;font-size:1.2rem;color:var(--white)">
                                {{ Auth()->user()->firstname }} {{ Auth()->user()->lastname }}
                            </div>
                            <div style="color:var(--gold);font-size:0.82rem;margin-top:0.3rem">Coiffeur · Spécialiste
                                Coupe</div>
                            <hr style="border-color:rgba(255,255,255,0.07);margin:1rem 0" />
                            <div class="row g-2 text-center">
                                <div class="col-4">
                                    <div
                                        style="font-family:'Playfair Display',serif;font-size:1.3rem;color:var(--gold)">
                                        38</div>
                                    <div style="font-size:0.72rem;color:var(--muted)">Ce mois</div>
                                </div>
                                <div class="col-4">
                                    <div
                                        style="font-family:'Playfair Display',serif;font-size:1.3rem;color:var(--gold)">
                                        4.9★</div>
                                    <div style="font-size:0.72rem;color:var(--muted)">Note</div>
                                </div>
                                <div class="col-4">
                                    <div
                                        style="font-family:'Playfair Display',serif;font-size:1.3rem;color:var(--gold)">
                                        24</div>
                                    <div style="font-size:0.72rem;color:var(--muted)">Clients</div>
                                </div>
                            </div>
                            <div class="mt-3 d-flex gap-2 justify-content-center flex-wrap">
                                <span class="pill po">Coupe</span>
                                <span class="pill po">Barbe</span>
                                <span class="pill po">Dégradé</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="tc">
                            <div class="th">
                                <h6>Informations personnelles</h6>
                            </div>
                            <div class="p-4">
                                <div class="row g-3">
                                    <div class="col-sm-6"><label class="form-label">Prénom</label><input type="text"
                                            class="form-control" value="{{ Auth()->user()->firstname }}" /></div>
                                    <div class="col-sm-6"><label class="form-label">Nom</label><input type="text"
                                            class="form-control" value="{{ Auth()->user()->lastname }}" /></div>
                                    <div class="col-sm-6"><label class="form-label">Email</label><input type="email"
                                            class="form-control" value="{{ Auth()->user()->email }}" /></div>
                                    <div class="col-sm-6"><label class="form-label">Téléphone</label><input type="tel"
                                            class="form-control" value="{{ Auth()->user()->telephone }}" /></div>
                                    <div class="col-12"><label class="form-label">Spécialités</label><input type="text"
                                            class="form-control" value="Coupe, Barbe, Dégradé" /></div>
                                    <div class="col-12"><label class="form-label">Nouveau mot de passe</label><input
                                            type="password" class="form-control"
                                            placeholder="Laisser vide si inchangé" /></div>
                                    <div class="col-12 mt-1">
                                        <button class="btn-g" onclick="alert('✦ Profil mis à jour avec succès !')"><i
                                                class="bi bi-save me-1"></i>Enregistrer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    

    <!-- ADD SLOT MODAL -->
    <div class="modal fade" id="addSlotModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un créneau</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-12"><label class="form-label">Date</label><input type="date"
                                class="form-control" /></div>
                        <div class="col-6"><label class="form-label">Heure début</label><input type="time"
                                class="form-control" /></div>
                        <div class="col-6"><label class="form-label">Heure fin</label><input type="time"
                                class="form-control" /></div>
                        <div class="col-12"><label class="form-label">Capacité max</label><input type="number"
                                class="form-control" value="3" /></div>
                        <div class="col-12"><label class="form-label">Répéter</label><select class="form-select">
                                <option>Ne pas répéter</option>
                                <option>Chaque jour cette semaine</option>
                                <option>Chaque semaine</option>
                            </select></div>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn-do" data-bs-dismiss="modal">Annuler</button><button
                        class="btn-g" data-bs-dismiss="modal" onclick="alert('✦ Créneau créé !')"><i
                            class="bi bi-check2 me-1"></i>Créer</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addSvcModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouveau service</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-12"><label class="form-label">Nom du service</label><input type="text"
                                class="form-control" placeholder="Ex: Coupe dégradée" /></div>
                        <div class="col-sm-6"><label class="form-label">Durée (min)</label><input type="number"
                                class="form-control" value="30" /></div>
                        <div class="col-sm-6"><label class="form-label">Prix (MAD)</label><input type="number"
                                class="form-control" value="50" /></div>
                        <div class="col-12"><label class="form-label">Description</label><textarea class="form-control"
                                rows="2"></textarea></div>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn-do" data-bs-dismiss="modal">Annuler</button><button
                        class="btn-g" data-bs-dismiss="modal" onclick="alert('✦ Service ajouté !')"><i
                            class="bi bi-check2 me-1"></i>Créer</button></div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const titles = { today: 'Mon planning', rdvs: 'Mes réservations', slots: 'Mes créneaux', clients: 'Mes clients', stats: 'Mes statistiques', profil: 'Mon profil' };
        function sp(id, el) {
            document.querySelectorAll('.ps').forEach(p => p.classList.remove('active'));
            document.getElementById('p-' + id).classList.add('active');
            document.querySelectorAll('.ni').forEach(n => n.classList.remove('active'));
            if (el) el.classList.add('active');
            document.getElementById('pt').textContent = titles[id] || id;
        }
        function tc() {
            const s = document.getElementById('sb');
            const m = document.getElementById('mn');
            const i = document.getElementById('ci');
            s.classList.toggle('col');
            m.classList.toggle('ex');
            i.className = s.classList.contains('col') ? 'bi bi-chevron-double-right' : 'bi bi-chevron-double-left';
        }
        let avail = true;
        function toggleAvail() {
            avail = !avail;
            const dot = document.getElementById('availDot');
            const txt = document.getElementById('availText');
            dot.className = 'avail-dot ' + (avail ? 'on' : 'off');
            txt.textContent = avail ? 'Disponible' : 'Indisponible';
            txt.style.color = avail ? 'var(--white)' : 'var(--red)';
        }
    </script>
</body>

</html>