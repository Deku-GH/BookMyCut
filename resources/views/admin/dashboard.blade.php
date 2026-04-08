<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CoiffeurPro – Administration</title>
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
      --dark: #0a0b0d;
      --dark2: #12141a;
      --dark3: #1a1d24;
      --dark4: #22262f;
      --muted: #6e7280;
      --white: #eeede8;
      --green: #22c55e;
      --red: #ef4444;
      --blue: #3b82f6;
      --orange: #f59e0b;
      --purple: #a855f7;
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
      width: 252px;
      background: var(--dark2);
      border-right: 1px solid rgba(201, 168, 76, 0.08);
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
    .sidebar.col .user-info,
    .sidebar.col .sec-lbl,
    .sidebar.col .sub-lbl {
      display: none;
    }

    .sb-head {
      padding: 1.3rem 1.1rem;
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

    .admin-badge {
      background: rgba(168, 85, 247, 0.15);
      color: #a855f7;
      font-size: 0.65rem;
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
      width: 34px;
      height: 34px;
      background: rgba(168, 85, 247, 0.15);
      border-radius: 7px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .u-av i {
      color: #a855f7;
      font-size: 1rem;
    }

    .u-name {
      color: var(--white);
      font-size: 0.86rem;
      font-weight: 600;
    }

    .u-role {
      color: #a855f7;
      font-size: 0.7rem;
      font-weight: 500;
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

    .ni.danger:hover {
      background: rgba(239, 68, 68, 0.06);
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
      margin-left: 252px;
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
      background: var(--red);
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

    .sc .accent {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 2px;
      opacity: 0;
      transition: opacity 0.22s;
    }

    .sc:hover .accent {
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

    .sc-ico.p {
      background: rgba(168, 85, 247, 0.1);
    }

    .sc-ico.p i {
      color: var(--purple);
    }

    .sc-ico.r {
      background: rgba(239, 68, 68, 0.1);
    }

    .sc-ico.r i {
      color: var(--red);
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

    .pp {
      background: rgba(168, 85, 247, 0.1);
      color: var(--purple);
    }

    .pn {
      background: rgba(110, 114, 128, 0.15);
      color: var(--muted);
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

    .btn-sm.er:hover {
      background: rgba(239, 68, 68, 0.18);
    }

    .btn-sm.eb {
      background: rgba(59, 130, 246, 0.1);
      color: #93c5fd;
      border: 1px solid rgba(59, 130, 246, 0.15);
    }

    /* FORM CONTROLS */
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

    /* PROGRESS BARS */
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
      transition: width 0.6s;
    }

    /* AVATAR STACK */
    .av-stack {
      display: flex;
    }

    .av-stack .av {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background: var(--dark4);
      border: 2px solid var(--dark2);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.72rem;
      color: var(--muted);
      margin-left: -8px;
      font-weight: 600;
    }

    .av-stack .av:first-child {
      margin-left: 0;
    }

    /* SECTIONS */
    .ps {
      display: none;
    }

    .ps.active {
      display: block;
    }

    /* USER CARD */
    .user-card {
      background: var(--dark3);
      border: 1px solid rgba(255, 255, 255, 0.05);
      border-radius: 10px;
      padding: 1.1rem;
      display: flex;
      align-items: center;
      gap: 0.9rem;
      transition: all 0.2s;
    }

    .user-card:hover {
      border-color: rgba(201, 168, 76, 0.2);
      background: rgba(201, 168, 76, 0.03);
    }

    .uca {
      width: 42px;
      height: 42px;
      border-radius: 9px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      font-weight: 700;
      font-size: 0.85rem;
    }

    /* TOGGLE SWITCH */
    .tgl {
      position: relative;
      width: 34px;
      height: 18px;
      cursor: pointer;
      flex-shrink: 0;
    }

    .tgl input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .tgl-sl {
      position: absolute;
      inset: 0;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      transition: 0.25s;
    }

    .tgl-sl::before {
      content: '';
      position: absolute;
      height: 12px;
      width: 12px;
      left: 3px;
      bottom: 3px;
      background: var(--muted);
      border-radius: 50%;
      transition: 0.25s;
    }

    .tgl input:checked~.tgl-sl {
      background: var(--gold-dim);
    }

    .tgl input:checked~.tgl-sl::before {
      transform: translateX(16px);
      background: var(--gold);
    }

    /* CHART BARS (CSS only) */
    .bar-chart {
      display: flex;
      align-items: flex-end;
      gap: 6px;
      height: 80px;
    }

    .bar-item {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 4px;
    }

    .bar-fill {
      width: 100%;
      border-radius: 3px 3px 0 0;
      background: var(--gold-dim);
      transition: background 0.2s;
    }

    .bar-fill.active {
      background: var(--gold);
    }

    .bar-item:hover .bar-fill {
      background: var(--gold);
    }

    .bar-lbl {
      font-size: 0.62rem;
      color: var(--muted);
    }

    /* ALERT CARD */
    .alert-card {
      background: rgba(239, 68, 68, 0.06);
      border: 1px solid rgba(239, 68, 68, 0.18);
      border-radius: 10px;
      padding: 0.9rem 1.2rem;
      display: flex;
      align-items: flex-start;
      gap: 0.8rem;
    }

    .alert-card i {
      color: var(--red);
      font-size: 1.1rem;
      flex-shrink: 0;
      margin-top: 1px;
    }

    .alert-card .al-title {
      color: var(--white);
      font-size: 0.87rem;
      font-weight: 600;
    }

    .alert-card .al-desc {
      color: var(--muted);
      font-size: 0.78rem;
      margin-top: 2px;
    }
  </style>
</head>

<body>

  <!-- ===================== SIDEBAR ===================== -->
  <aside class="sidebar" id="sb">
    <div class="sb-head">
      <div>
        <div class="brand-logo">✦ CoiffeurPro</div>
        <span class="brand-tagline">Administration</span>
      </div>
      <span class="admin-badge lbl">Admin</span>
    </div>
    <div class="sb-user">
      <div class="u-av"><i class="bi bi-shield-fill"></i></div>
      <div class="user-info">
        <div class="u-name">{{ Auth()->user()->firstname }} {{ Auth()->user()->lastname }}</div>
        <div class="u-role">Super Administrateur</div>
      </div>
    </div>
    <nav class="sb-nav">
      <div class="sec-lbl">Tableau de bord</div>
      <a class="ni active" onclick="sp('overview',this)"><i class="bi bi-grid-1x2"></i><span class="lbl">Vue
          d'ensemble</span></a>

      <div class="sec-lbl">Gestion</div>
      <a class="ni" onclick="sp('users',this)"><i class="bi bi-people"></i><span class="lbl">Utilisateurs</span></a>
      <a class="ni" onclick="sp('barbers',this)"><i class="bi bi-scissors"></i><span class="lbl">Coiffeurs</span></a>
      <a class="ni" onclick="sp('reservations',this)"><i class="bi bi-calendar3"></i><span
          class="lbl">Réservations</span></a>
      <a class="ni" onclick="sp('services',this)"><i class="bi bi-list-stars"></i><span class="lbl">Services</span></a>
      <a class="ni" onclick="sp('slots',this)"><i class="bi bi-clock"></i><span class="lbl">Créneaux</span></a>

      <div class="sec-lbl">Analytiques</div>
      <a class="ni" onclick="sp('reports',this)"><i class="bi bi-bar-chart-line"></i><span class="lbl">Rapports &
          Stats</span></a>

      <div class="sec-lbl">Système</div>
      <a class="ni" onclick="sp('settings',this)"><i class="bi bi-gear"></i><span class="lbl">Paramètres</span></a>
      <a class="ni danger" href="login.html"><i class="bi bi-box-arrow-left"></i><span
          class="lbl">Déconnexion</span></a>
    </nav>
    <div class="sb-foot">
      <button class="btn-col" onclick="tc()"><i class="bi bi-chevron-double-left" id="ci"></i><span
          class="lbl ms-1">Réduire</span></button>
    </div>
  </aside>

  <!-- ===================== MAIN ===================== -->
  <div class="main" id="mn">
    <div class="topbar">
      <div>
        <div class="t-title" id="pt">Vue d'ensemble</div>
        <div class="t-sub">Vendredi 3 Janvier 2025 · Bonjour Admin 👋</div>
      </div>
      <div class="t-right">
        <div class="ib" title="Alertes système"><i class="bi bi-exclamation-triangle"></i><span class="ndot"></span>
        </div>
        <div class="ib" title="Notifications"><i class="bi bi-bell"></i></div>
        <button class="btn-g" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="bi bi-plus"></i><span
            class="lbl">Ajouter</span></button>
      </div>
    </div>

    <div class="content">

      <!-- ===== OVERVIEW ===== -->
      <div class="ps active" id="p-overview">
        <!-- KPIs -->
        <div class="row g-3 mb-4">
          <div class="col-6 col-xl-2">
            <div class="sc">
              <div class="accent" style="background:var(--gold)"></div>
              <div class="sc-ico g"><i class="bi bi-people-fill"></i></div>
              <div class="sc-val">1 248</div>
              <div class="sc-lbl">Clients totaux</div>
              <div class="trend up"><i class="bi bi-arrow-up-short"></i>+14%</div>
            </div>
          </div>
          <div class="col-6 col-xl-2">
            <div class="sc">
              <div class="accent" style="background:var(--purple)"></div>
              <div class="sc-ico p"><i class="bi bi-scissors"></i></div>
              <div class="sc-val">8</div>
              <div class="sc-lbl">Coiffeurs actifs</div>
              <div class="trend up"><i class="bi bi-arrow-up-short"></i>+2</div>
            </div>
          </div>
          <div class="col-6 col-xl-2">
            <div class="sc">
              <div class="accent" style="background:var(--green)"></div>
              <div class="sc-ico gr"><i class="bi bi-calendar-check"></i></div>
              <div class="sc-val">342</div>
              <div class="sc-lbl">RDV ce mois</div>
              <div class="trend up"><i class="bi bi-arrow-up-short"></i>+22%</div>
            </div>
          </div>
          <div class="col-6 col-xl-2">
            <div class="sc">
              <div class="accent" style="background:var(--orange)"></div>
              <div class="sc-ico o"><i class="bi bi-cash-coin"></i></div>
              <div class="sc-val">18 640</div>
              <div class="sc-lbl">Revenus (MAD)</div>
              <div class="trend up"><i class="bi bi-arrow-up-short"></i>+9%</div>
            </div>
          </div>
          <div class="col-6 col-xl-2">
            <div class="sc">
              <div class="accent" style="background:var(--red)"></div>
              <div class="sc-ico r"><i class="bi bi-x-circle"></i></div>
              <div class="sc-val">12</div>
              <div class="sc-lbl">RDV annulés</div>
              <div class="trend dn"><i class="bi bi-arrow-down-short"></i>-3%</div>
            </div>
          </div>
          <div class="col-6 col-xl-2">
            <div class="sc">
              <div class="accent" style="background:var(--blue)"></div>
              <div class="sc-ico b"><i class="bi bi-star-fill"></i></div>
              <div class="sc-val">4.8</div>
              <div class="sc-lbl">Note globale</div>
              <div class="trend up"><i class="bi bi-arrow-up-short"></i>+0.2</div>
            </div>
          </div>
        </div>

        <!-- Alert -->
        <div class="alert-card mb-4">
          <i class="bi bi-exclamation-triangle-fill"></i>
          <div>
            <div class="al-title">2 coiffeurs sans créneaux demain</div>
            <div class="al-desc">Karim Alami et Mehdi Razi n'ont aucun créneau configuré pour le Samedi 4 Janvier.
              Action requise.</div>
          </div>
          <button class="btn-sm eg ms-auto" onclick="sp('slots',document.querySelectorAll('.ni')[5])">Gérer</button>
        </div>

        <div class="row g-4">
          <!-- Weekly revenue chart -->
          <div class="col-lg-5">
            <div class="tc">
              <div class="th">
                <h6>Revenus — 7 derniers jours</h6><span style="font-size:0.78rem;color:var(--gold);font-weight:600">18
                  640 MAD</span>
              </div>
              <div class="p-4">
                <div class="bar-chart mb-2">
                  <div class="bar-item">
                    <div class="bar-fill" style="height:42px"></div>
                    <div class="bar-lbl">Lun</div>
                  </div>
                  <div class="bar-item">
                    <div class="bar-fill" style="height:60px"></div>
                    <div class="bar-lbl">Mar</div>
                  </div>
                  <div class="bar-item">
                    <div class="bar-fill" style="height:38px"></div>
                    <div class="bar-lbl">Mer</div>
                  </div>
                  <div class="bar-item">
                    <div class="bar-fill" style="height:70px"></div>
                    <div class="bar-lbl">Jeu</div>
                  </div>
                  <div class="bar-item">
                    <div class="bar-fill active" style="height:55px"></div>
                    <div class="bar-lbl">Ven</div>
                  </div>
                  <div class="bar-item">
                    <div class="bar-fill" style="height:75px"></div>
                    <div class="bar-lbl">Sam</div>
                  </div>
                  <div class="bar-item">
                    <div class="bar-fill" style="height:30px"></div>
                    <div class="bar-lbl">Dim</div>
                  </div>
                </div>
                <div class="d-flex justify-content-between mt-3 pt-3"
                  style="border-top:1px solid rgba(255,255,255,0.05)">
                  <div class="text-center">
                    <div style="font-family:'Playfair Display',serif;color:var(--gold);font-size:1.1rem">2 460</div>
                    <div style="font-size:0.73rem;color:var(--muted)">Aujourd'hui</div>
                  </div>
                  <div class="text-center">
                    <div style="font-family:'Playfair Display',serif;color:var(--white);font-size:1.1rem">3 280</div>
                    <div style="font-size:0.73rem;color:var(--muted)">Moy/jour</div>
                  </div>
                  <div class="text-center">
                    <div style="font-family:'Playfair Display',serif;color:var(--green);font-size:1.1rem">+9%</div>
                    <div style="font-size:0.73rem;color:var(--muted)">vs semaine préc.</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Top barbers -->
          <div class="col-lg-4">
            <div class="tc">
              <div class="th">
                <h6>Top Coiffeurs</h6>
              </div>
              <div class="p-3 d-flex flex-column gap-2">
                <div class="user-card">
                  <div class="uca" style="background:rgba(201,168,76,0.12);color:var(--gold)">KA</div>
                  <div class="flex-grow-1">
                    <div style="color:var(--white);font-size:0.86rem;font-weight:600">Karim Alami</div>
                    <div style="color:var(--muted);font-size:0.74rem">38 RDV · 4 760 MAD</div>
                  </div>
                  <span class="pill pg">1er</span>
                </div>
                <div class="user-card">
                  <div class="uca" style="background:rgba(59,130,246,0.12);color:var(--blue)">MR</div>
                  <div class="flex-grow-1">
                    <div style="color:var(--white);font-size:0.86rem;font-weight:600">Mehdi Razi</div>
                    <div style="color:var(--muted);font-size:0.74rem">32 RDV · 3 980 MAD</div>
                  </div>
                  <span class="pill pb">2ème</span>
                </div>
                <div class="user-card">
                  <div class="uca" style="background:rgba(168,85,247,0.12);color:var(--purple)">HB</div>
                  <div class="flex-grow-1">
                    <div style="color:var(--white);font-size:0.86rem;font-weight:600">Hassan Benali</div>
                    <div style="color:var(--muted);font-size:0.74rem">28 RDV · 3 420 MAD</div>
                  </div>
                  <span class="pill pp">3ème</span>
                </div>
                <div class="user-card">
                  <div class="uca" style="background:rgba(245,158,11,0.12);color:var(--orange)">AK</div>
                  <div class="flex-grow-1">
                    <div style="color:var(--white);font-size:0.86rem;font-weight:600">Amine Khalil</div>
                    <div style="color:var(--muted);font-size:0.74rem">24 RDV · 2 880 MAD</div>
                  </div>
                  <span class="pill po">4ème</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Services perf -->
          <div class="col-lg-3">
            <div class="tc">
              <div class="th">
                <h6>Services</h6>
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
                      style="font-size:0.82rem;color:#ccc">Autres</span><span
                      style="font-size:0.78rem;color:var(--gold)">7%</span></div>
                  <div class="prog">
                    <div class="prog-f" style="width:7%"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Recent reservations -->
        <div class="tc mt-4">
          <div class="th">
            <h6>Dernières réservations</h6>
            <div class="d-flex gap-2">
              <input type="date" class="form-control form-control-sm" style="width:auto" />
              <select class="form-select form-select-sm" style="width:auto">
                <option>Tous</option>
                <option>Confirmé</option>
                <option>En cours</option>
                <option>Annulé</option>
              </select>
              <button class="btn-g" style="padding:0.35rem 0.8rem;font-size:0.8rem"
                onclick="sp('reservations',document.querySelectorAll('.ni')[4])">Voir tout</button>
            </div>
          </div>
          <div class="table-responsive">
            <table class="tt">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Client</th>
                  <th>Coiffeur</th>
                  <th>Service</th>
                  <th>Date</th>
                  <th>Heure</th>
                  <th>Montant</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="color:var(--muted)">#342</td>
                  <td>Youssef El I.</td>
                  <td><span class="pill po">Karim A.</span></td>
                  <td>Coupe+Barbe</td>
                  <td>3 Jan</td>
                  <td>10h30</td>
                  <td style="color:var(--gold)">70 MAD</td>
                  <td><span class="pill po">En cours</span></td>
                  <td><button class="btn-sm eg">Détails</button></td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">#341</td>
                  <td>Said Moussa</td>
                  <td><span class="pill pb">Mehdi R.</span></td>
                  <td>Soin</td>
                  <td>3 Jan</td>
                  <td>11h00</td>
                  <td style="color:var(--gold)">40 MAD</td>
                  <td><span class="pill pb">En attente</span></td>
                  <td><button class="btn-sm er">Annuler</button></td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">#340</td>
                  <td>Amine Khalil</td>
                  <td><span class="pill pp">Hassan B.</span></td>
                  <td>Coloration</td>
                  <td>3 Jan</td>
                  <td>14h00</td>
                  <td style="color:var(--gold)">120 MAD</td>
                  <td><span class="pill pb">En attente</span></td>
                  <td><button class="btn-sm eg">Détails</button></td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">#339</td>
                  <td>Nabil Fassi</td>
                  <td><span class="pill po">Karim A.</span></td>
                  <td>Coupe</td>
                  <td>2 Jan</td>
                  <td>09h30</td>
                  <td style="color:var(--gold)">50 MAD</td>
                  <td><span class="pill pg">Terminé</span></td>
                  <td>—</td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">#338</td>
                  <td>Hamid Zouiten</td>
                  <td><span class="pill pb">Mehdi R.</span></td>
                  <td>Barbe</td>
                  <td>2 Jan</td>
                  <td>11h30</td>
                  <td style="color:var(--gold)">30 MAD</td>
                  <td><span class="pill pr">Annulé</span></td>
                  <td>—</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- ===== USERS ===== -->
      <div class="ps" id="p-users">
        <div class="tc">
          <div class="th">
            <h6>Tous les utilisateurs</h6>
            <div class="d-flex gap-2 flex-wrap">
              <input type="text" class="form-control form-control-sm" placeholder="Rechercher..." style="width:180px" />
              <select class="form-select form-select-sm" style="width:auto">
                <option>Tous les rôles</option>
                <option>Client</option>
                <option>Coiffeur</option>
                <option>Admin</option>
              </select>
              <button class="btn-g" data-bs-toggle="modal" data-bs-target="#addUserModal"><i
                  class="bi bi-plus"></i>Ajouter</button>
            </div>
          </div>
          <div class="table-responsive">
            <table class="tt">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Téléphone</th>
                  <th>Rôle</th>
                  <th>Inscrit le</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="color:var(--muted)">001</td>
                  <td>Youssef El Idrissi</td>
                  <td style="color:var(--muted)">youssef@ex.ma</td>
                  <td>+212 6 12 34 56</td>
                  <td><span class="pill pb">Client</span></td>
                  <td style="color:var(--muted)">Jan 2024</td>
                  <td><span class="pill pg">Actif</span></td>
                  <td><button class="btn-sm eg me-1">Éditer</button><button class="btn-sm er">Bloquer</button></td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">002</td>
                  <td>Karim Alami</td>
                  <td style="color:var(--muted)">karim@ex.ma</td>
                  <td>+212 6 98 76 54</td>
                  <td><span class="pill po">Coiffeur</span></td>
                  <td style="color:var(--muted)">Mar 2023</td>
                  <td><span class="pill pg">Actif</span></td>
                  <td><button class="btn-sm eg me-1">Éditer</button><button class="btn-sm er">Bloquer</button></td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">003</td>
                  <td>Mehdi Razi</td>
                  <td style="color:var(--muted)">mehdi@ex.ma</td>
                  <td>+212 6 11 22 33</td>
                  <td><span class="pill po">Coiffeur</span></td>
                  <td style="color:var(--muted)">Fév 2023</td>
                  <td><span class="pill pg">Actif</span></td>
                  <td><button class="btn-sm eg me-1">Éditer</button><button class="btn-sm er">Bloquer</button></td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">004</td>
                  <td>Hassan Benali</td>
                  <td style="color:var(--muted)">hassan@ex.ma</td>
                  <td>+212 6 55 44 33</td>
                  <td><span class="pill pp">Admin</span></td>
                  <td style="color:var(--muted)">Jan 2023</td>
                  <td><span class="pill pg">Actif</span></td>
                  <td><button class="btn-sm eg me-1">Éditer</button><button class="btn-sm er">Supprimer</button></td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">005</td>
                  <td>Omar Bensaid</td>
                  <td style="color:var(--muted)">omar@ex.ma</td>
                  <td>+212 6 77 88 99</td>
                  <td><span class="pill pb">Client</span></td>
                  <td style="color:var(--muted)">Avr 2024</td>
                  <td><span class="pill pr">Bloqué</span></td>
                  <td><button class="btn-sm eb">Débloquer</button></td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">006</td>
                  <td>Nabil Fassi</td>
                  <td style="color:var(--muted)">nabil@ex.ma</td>
                  <td>+212 6 33 22 11</td>
                  <td><span class="pill pb">Client</span></td>
                  <td style="color:var(--muted)">Juin 2024</td>
                  <td><span class="pill pg">Actif</span></td>
                  <td><button class="btn-sm eg me-1">Éditer</button><button class="btn-sm er">Bloquer</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- ===== BARBERS ===== -->
      <div class="ps" id="p-barbers">
        <div class="row g-3 mb-4">
          <div class="col-sm-6 col-xl-3">
            <div class="sc">
              <div class="sc-ico p"><i class="bi bi-scissors"></i></div>
              <div class="sc-val">8</div>
              <div class="sc-lbl">Coiffeurs actifs</div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="sc">
              <div class="sc-ico gr"><i class="bi bi-calendar-check"></i></div>
              <div class="sc-val">342</div>
              <div class="sc-lbl">RDV total ce mois</div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="sc">
              <div class="sc-ico o"><i class="bi bi-cash-coin"></i></div>
              <div class="sc-val">18 640</div>
              <div class="sc-lbl">Revenus générés (MAD)</div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="sc">
              <div class="sc-ico b"><i class="bi bi-star-fill"></i></div>
              <div class="sc-val">4.8</div>
              <div class="sc-lbl">Note moyenne</div>
            </div>
          </div>
        </div>
        <div class="tc">
          <div class="th">
            <h6>Liste des coiffeurs</h6>
            <button class="btn-g" data-bs-toggle="modal" data-bs-target="#addBarberModal"><i
                class="bi bi-plus"></i>Ajouter coiffeur</button>
          </div>
          <div class="table-responsive">
            <table class="tt">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Coiffeur</th>
                  <th>Spécialités</th>
                  <th>RDV ce mois</th>
                  <th>Revenus</th>
                  <th>Note</th>
                  <th>Statut</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="color:var(--muted)">B01</td>
                  <td><strong style="color:var(--white)">Karim Alami</strong></td>
                  <td>Coupe, Barbe, Dégradé</td>
                  <td style="color:var(--gold)">38</td>
                  <td style="color:var(--green)">4 760 MAD</td>
                  <td>⭐ 4.9</td>
                  <td><span class="pill pg">Actif</span></td>
                  <td><button class="btn-sm eg me-1">Profil</button><button class="btn-sm er">Suspendre</button></td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">B02</td>
                  <td><strong style="color:var(--white)">Mehdi Razi</strong></td>
                  <td>Coupe, Coloration</td>
                  <td style="color:var(--gold)">32</td>
                  <td style="color:var(--green)">3 980 MAD</td>
                  <td>⭐ 4.7</td>
                  <td><span class="pill pg">Actif</span></td>
                  <td><button class="btn-sm eg me-1">Profil</button><button class="btn-sm er">Suspendre</button></td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">B03</td>
                  <td><strong style="color:var(--white)">Hassan Benali</strong></td>
                  <td>Soin, Shampoing, Coupe</td>
                  <td style="color:var(--gold)">28</td>
                  <td style="color:var(--green)">3 420 MAD</td>
                  <td>⭐ 4.8</td>
                  <td><span class="pill pg">Actif</span></td>
                  <td><button class="btn-sm eg me-1">Profil</button><button class="btn-sm er">Suspendre</button></td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">B04</td>
                  <td><strong style="color:var(--white)">Amine Khalil</strong></td>
                  <td>Barbe, Rasage</td>
                  <td style="color:var(--gold)">24</td>
                  <td style="color:var(--green)">2 880 MAD</td>
                  <td>⭐ 4.6</td>
                  <td><span class="pill pg">Actif</span></td>
                  <td><button class="btn-sm eg me-1">Profil</button><button class="btn-sm er">Suspendre</button></td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">B05</td>
                  <td><strong style="color:var(--white)">Said Moussaoui</strong></td>
                  <td>Coupe, Forfait Premium</td>
                  <td style="color:var(--gold)">18</td>
                  <td style="color:var(--green)">2 140 MAD</td>
                  <td>⭐ 4.5</td>
                  <td><span class="pill pr">Suspendu</span></td>
                  <td><button class="btn-sm eb">Réactiver</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- ===== RESERVATIONS ===== -->
      <div class="ps" id="p-reservations">
        <div class="tc">
          <div class="th">
            <h6>Toutes les réservations</h6>
            <div class="d-flex gap-2 flex-wrap">
              <input type="text" class="form-control form-control-sm" placeholder="Rechercher client..."
                style="width:180px" />
              <input type="date" class="form-control form-control-sm" style="width:auto" />
              <select class="form-select form-select-sm" style="width:auto">
                <option>Tous</option>
                <option>Confirmé</option>
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
                  <th>Coiffeur</th>
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
                  <td style="color:var(--muted)">#342</td>
                  <td>Youssef El I.</td>
                  <td>Karim A.</td>
                  <td>Coupe+Barbe</td>
                  <td>3 Jan</td>
                  <td>10h30</td>
                  <td>45min</td>
                  <td style="color:var(--gold)">70</td>
                  <td><span class="pill po">En cours</span></td>
                  <td><button class="btn-sm eg">Voir</button></td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">#341</td>
                  <td>Said Moussa</td>
                  <td>Mehdi R.</td>
                  <td>Soin</td>
                  <td>3 Jan</td>
                  <td>11h00</td>
                  <td>30min</td>
                  <td style="color:var(--gold)">40</td>
                  <td><span class="pill pb">En attente</span></td>
                  <td><button class="btn-sm er">Annuler</button></td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">#340</td>
                  <td>Amine K.</td>
                  <td>Hassan B.</td>
                  <td>Coloration</td>
                  <td>3 Jan</td>
                  <td>14h00</td>
                  <td>60min</td>
                  <td style="color:var(--gold)">120</td>
                  <td><span class="pill pb">En attente</span></td>
                  <td><button class="btn-sm eg">Voir</button></td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">#339</td>
                  <td>Nabil Fassi</td>
                  <td>Karim A.</td>
                  <td>Coupe</td>
                  <td>2 Jan</td>
                  <td>09h30</td>
                  <td>30min</td>
                  <td style="color:var(--gold)">50</td>
                  <td><span class="pill pg">Terminé</span></td>
                  <td>—</td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">#338</td>
                  <td>Hamid Z.</td>
                  <td>Mehdi R.</td>
                  <td>Barbe</td>
                  <td>2 Jan</td>
                  <td>11h30</td>
                  <td>20min</td>
                  <td style="color:var(--gold)">30</td>
                  <td><span class="pill pr">Annulé</span></td>
                  <td>—</td>
                </tr>
                <tr>
                  <td style="color:var(--muted)">#337</td>
                  <td>Rachid O.</td>
                  <td>Amine K.</td>
                  <td>Coupe+Barbe</td>
                  <td>2 Jan</td>
                  <td>15h00</td>
                  <td>45min</td>
                  <td style="color:var(--gold)">70</td>
                  <td><span class="pill pg">Terminé</span></td>
                  <td>—</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- ===== SERVICES ===== -->
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

      <!-- ===== SLOTS ===== -->
      <div class="ps" id="p-slots">
        <div class="row g-4">
          <div class="col-lg-8">
            <div class="tc">
              <div class="th">
                <h6>Gestion des créneaux — 3 Jan 2025</h6>
                <div class="d-flex gap-2">
                  <select class="form-select form-select-sm" style="width:auto">
                    <option>Tous les coiffeurs</option>
                    <option>Karim A.</option>
                    <option>Mehdi R.</option>
                    <option>Hassan B.</option>
                  </select>
                  <input type="date" class="form-control form-control-sm" style="width:auto" />
                </div>
              </div>
              <div class="table-responsive">
                <table class="tt">
                  <thead>
                    <tr>
                      <th>Heure</th>
                      <th>Coiffeur</th>
                      <th>Capacité max</th>
                      <th>Réservé</th>
                      <th>Dispo</th>
                      <th>Statut</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>08h30</td>
                      <td>Karim A.</td>
                      <td>3</td>
                      <td style="color:var(--green)">3</td>
                      <td style="color:var(--red)">0</td>
                      <td><span class="pill pr">Complet</span></td>
                      <td><button class="btn-sm er">Désactiver</button></td>
                    </tr>
                    <tr>
                      <td>09h00</td>
                      <td>Mehdi R.</td>
                      <td>3</td>
                      <td style="color:var(--orange)">2</td>
                      <td style="color:var(--green)">1</td>
                      <td><span class="pill po">Partiel</span></td>
                      <td><button class="btn-sm eg">Éditer</button></td>
                    </tr>
                    <tr>
                      <td>09h30</td>
                      <td>Hassan B.</td>
                      <td>3</td>
                      <td style="color:var(--green)">1</td>
                      <td style="color:var(--green)">2</td>
                      <td><span class="pill pg">Disponible</span></td>
                      <td><button class="btn-sm eg">Éditer</button></td>
                    </tr>
                    <tr>
                      <td>10h30</td>
                      <td>Karim A.</td>
                      <td>3</td>
                      <td style="color:var(--green)">1</td>
                      <td style="color:var(--green)">2</td>
                      <td><span class="pill pg">Disponible</span></td>
                      <td><button class="btn-sm eg">Éditer</button></td>
                    </tr>
                    <tr>
                      <td>11h00</td>
                      <td>Amine K.</td>
                      <td>3</td>
                      <td style="color:var(--green)">0</td>
                      <td style="color:var(--green)">3</td>
                      <td><span class="pill pg">Disponible</span></td>
                      <td><button class="btn-sm er">Désactiver</button></td>
                    </tr>
                    <tr>
                      <td>14h00</td>
                      <td>Mehdi R.</td>
                      <td>3</td>
                      <td style="color:var(--orange)">2</td>
                      <td style="color:var(--green)">1</td>
                      <td><span class="pill po">Partiel</span></td>
                      <td><button class="btn-sm eg">Éditer</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="tc">
              <div class="th">
                <h6>Créer un créneau</h6>
              </div>
              <div class="p-4">
                <div class="mb-3"><label class="form-label">Coiffeur</label><select class="form-select">
                    <option>Sélectionner...</option>
                    <option>Karim Alami</option>
                    <option>Mehdi Razi</option>
                    <option>Hassan Benali</option>
                    <option>Amine Khalil</option>
                  </select></div>
                <div class="mb-3"><label class="form-label">Date</label><input type="date" class="form-control" /></div>
                <div class="row g-2 mb-3">
                  <div class="col-6"><label class="form-label">Heure début</label><input type="time"
                      class="form-control" /></div>
                  <div class="col-6"><label class="form-label">Heure fin</label><input type="time"
                      class="form-control" /></div>
                </div>
                <div class="mb-3"><label class="form-label">Capacité max</label><input type="number"
                    class="form-control" value="3" min="1" max="10" /></div>
                <button class="btn-g w-100" onclick="alert('✦ Créneau créé avec succès !')"><i
                    class="bi bi-plus-circle me-1"></i>Créer le créneau</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ===== REPORTS ===== -->
      <div class="ps" id="p-reports">
        <div class="row g-3 mb-4">
          <div class="col-sm-6 col-xl-3">
            <div class="sc">
              <div class="sc-ico o"><i class="bi bi-cash-coin"></i></div>
              <div class="sc-val">18 640</div>
              <div class="sc-lbl">Revenus ce mois</div>
              <div class="trend up">+9% vs mois passé</div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="sc">
              <div class="sc-ico gr"><i class="bi bi-calendar-check"></i></div>
              <div class="sc-val">342</div>
              <div class="sc-lbl">RDV confirmés</div>
              <div class="trend up">+22%</div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="sc">
              <div class="sc-ico r"><i class="bi bi-x-circle"></i></div>
              <div class="sc-val">3.5%</div>
              <div class="sc-lbl">Taux d'annulation</div>
              <div class="trend dn">-0.5%</div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="sc">
              <div class="sc-ico b"><i class="bi bi-clock"></i></div>
              <div class="sc-val">37 min</div>
              <div class="sc-lbl">Durée moy. RDV</div>
              <div class="trend up">+2 min</div>
            </div>
          </div>
        </div>
        <div class="row g-4">
          <div class="col-lg-6">
            <div class="tc">
              <div class="th">
                <h6>Revenus mensuels 2024</h6>
              </div>
              <div class="p-4">
                <div class="bar-chart" style="height:100px">
                  <div class="bar-item">
                    <div class="bar-fill" style="height:50px"></div>
                    <div class="bar-lbl">Jan</div>
                  </div>
                  <div class="bar-item">
                    <div class="bar-fill" style="height:60px"></div>
                    <div class="bar-lbl">Fév</div>
                  </div>
                  <div class="bar-item">
                    <div class="bar-fill" style="height:45px"></div>
                    <div class="bar-lbl">Mar</div>
                  </div>
                  <div class="bar-item">
                    <div class="bar-fill" style="height:70px"></div>
                    <div class="bar-lbl">Avr</div>
                  </div>
                  <div class="bar-item">
                    <div class="bar-fill" style="height:65px"></div>
                    <div class="bar-lbl">Mai</div>
                  </div>
                  <div class="bar-item">
                    <div class="bar-fill" style="height:80px"></div>
                    <div class="bar-lbl">Jun</div>
                  </div>
                  <div class="bar-item">
                    <div class="bar-fill" style="height:75px"></div>
                    <div class="bar-lbl">Jul</div>
                  </div>
                  <div class="bar-item">
                    <div class="bar-fill" style="height:85px"></div>
                    <div class="bar-lbl">Aoû</div>
                  </div>
                  <div class="bar-item">
                    <div class="bar-fill" style="height:70px"></div>
                    <div class="bar-lbl">Sep</div>
                  </div>
                  <div class="bar-item">
                    <div class="bar-fill" style="height:90px"></div>
                    <div class="bar-lbl">Oct</div>
                  </div>
                  <div class="bar-item">
                    <div class="bar-fill" style="height:82px"></div>
                    <div class="bar-lbl">Nov</div>
                  </div>
                  <div class="bar-item">
                    <div class="bar-fill active" style="height:95px"></div>
                    <div class="bar-lbl">Déc</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="tc">
              <div class="th">
                <h6>Taux d'occupation par coiffeur</h6>
              </div>
              <div class="p-4 d-flex flex-column gap-3">
                <div>
                  <div class="d-flex justify-content-between mb-1"><span style="font-size:0.83rem;color:#ccc">Karim
                      Alami</span><span style="font-size:0.78rem;color:var(--green)">92%</span></div>
                  <div class="prog">
                    <div class="prog-f" style="width:92%;background:var(--green)"></div>
                  </div>
                </div>
                <div>
                  <div class="d-flex justify-content-between mb-1"><span style="font-size:0.83rem;color:#ccc">Mehdi
                      Razi</span><span style="font-size:0.78rem;color:var(--green)">85%</span></div>
                  <div class="prog">
                    <div class="prog-f" style="width:85%;background:var(--green)"></div>
                  </div>
                </div>
                <div>
                  <div class="d-flex justify-content-between mb-1"><span style="font-size:0.83rem;color:#ccc">Hassan
                      Benali</span><span style="font-size:0.78rem;color:var(--orange)">74%</span></div>
                  <div class="prog">
                    <div class="prog-f" style="width:74%;background:var(--orange)"></div>
                  </div>
                </div>
                <div>
                  <div class="d-flex justify-content-between mb-1"><span style="font-size:0.83rem;color:#ccc">Amine
                      Khalil</span><span style="font-size:0.78rem;color:var(--orange)">68%</span></div>
                  <div class="prog">
                    <div class="prog-f" style="width:68%;background:var(--orange)"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ===== SETTINGS ===== -->
      <div class="ps" id="p-settings">
        <div class="row g-4">
          <div class="col-lg-6">
            <div class="tc">
              <div class="th">
                <h6>Informations du salon</h6>
              </div>
              <div class="p-4">
                <div class="row g-3">
                  <div class="col-12"><label class="form-label">Nom du salon</label><input type="text"
                      class="form-control" value="Salon CoiffeurPro" /></div>
                  <div class="col-sm-6"><label class="form-label">Email</label><input type="email" class="form-control"
                      value="contact@coiffeurpro.ma" /></div>
                  <div class="col-sm-6"><label class="form-label">Téléphone</label><input type="tel"
                      class="form-control" value="+212 6 00 00 00 00" /></div>
                  <div class="col-12"><label class="form-label">Adresse</label><input type="text" class="form-control"
                      value="Marrakech, Maroc" /></div>
                  <div class="col-sm-6"><label class="form-label">Ouverture</label><input type="time"
                      class="form-control" value="08:00" /></div>
                  <div class="col-sm-6"><label class="form-label">Fermeture</label><input type="time"
                      class="form-control" value="20:00" /></div>
                  <div class="col-12"><button class="btn-g" onclick="alert('✦ Paramètres sauvegardés !')"><i
                        class="bi bi-save me-1"></i>Enregistrer</button></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="tc">
              <div class="th">
                <h6>Options système</h6>
              </div>
              <div class="p-4 d-flex flex-column gap-3">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div style="font-size:0.87rem;color:var(--white)">Confirmations automatiques</div>
                    <div style="font-size:0.76rem;color:var(--muted)">Confirmer les RDV sans intervention</div>
                  </div><label class="tgl"><input type="checkbox" checked /><span class="tgl-sl"></span></label>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div style="font-size:0.87rem;color:var(--white)">Rappels par SMS</div>
                    <div style="font-size:0.76rem;color:var(--muted)">Envoyer un rappel 2h avant le RDV</div>
                  </div><label class="tgl"><input type="checkbox" checked /><span class="tgl-sl"></span></label>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div style="font-size:0.87rem;color:var(--white)">Mode maintenance</div>
                    <div style="font-size:0.76rem;color:var(--muted)">Bloquer les nouvelles réservations</div>
                  </div><label class="tgl"><input type="checkbox" /><span class="tgl-sl"></span></label>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div style="font-size:0.87rem;color:var(--white)">Annulation libre</div>
                    <div style="font-size:0.76rem;color:var(--muted)">Permettre l'annulation jusqu'à 1h avant</div>
                  </div><label class="tgl"><input type="checkbox" checked /><span class="tgl-sl"></span></label>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div style="font-size:0.87rem;color:var(--white)">Notifications admin</div>
                    <div style="font-size:0.76rem;color:var(--muted)">Alertes pour chaque nouveau RDV</div>
                  </div><label class="tgl"><input type="checkbox" checked /><span class="tgl-sl"></span></label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- MODALS -->
  <div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ajouter un utilisateur</h5><button type="button" class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body p-4">
          <div class="row g-3">
            <div class="col-sm-6"><label class="form-label">Prénom</label><input type="text" class="form-control"
                placeholder="Prénom" /></div>
            <div class="col-sm-6"><label class="form-label">Nom</label><input type="text" class="form-control"
                placeholder="Nom" /></div>
            <div class="col-12"><label class="form-label">Email</label><input type="email" class="form-control"
                placeholder="email@example.ma" /></div>
            <div class="col-sm-6"><label class="form-label">Téléphone</label><input type="tel" class="form-control"
                placeholder="+212 6..." /></div>
            <div class="col-sm-6"><label class="form-label">Rôle</label><select class="form-select">
                <option>Client</option>
                <option>Coiffeur</option>
                <option>Admin</option>
              </select></div>
            <div class="col-12"><label class="form-label">Mot de passe temporaire</label><input type="password"
                class="form-control" placeholder="Minimum 8 caractères" /></div>
          </div>
        </div>
        <div class="modal-footer"><button class="btn-do" data-bs-dismiss="modal">Annuler</button><button class="btn-g"
            data-bs-dismiss="modal" onclick="alert('✦ Utilisateur créé !')"><i
              class="bi bi-check2 me-1"></i>Créer</button></div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addBarberModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ajouter un coiffeur</h5><button type="button" class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body p-4">
          <div class="row g-3">
            <div class="col-sm-6"><label class="form-label">Prénom</label><input type="text" class="form-control" />
            </div>
            <div class="col-sm-6"><label class="form-label">Nom</label><input type="text" class="form-control" /></div>
            <div class="col-12"><label class="form-label">Email</label><input type="email" class="form-control" /></div>
            <div class="col-12"><label class="form-label">Téléphone</label><input type="tel" class="form-control" />
            </div>
            <div class="col-12"><label class="form-label">Spécialités</label><input type="text" class="form-control"
                placeholder="Ex: Coupe, Barbe, Coloration" /></div>
            <div class="col-12"><label class="form-label">Mot de passe</label><input type="password"
                class="form-control" /></div>
          </div>
        </div>
        <div class="modal-footer"><button class="btn-do" data-bs-dismiss="modal">Annuler</button><button class="btn-g"
            data-bs-dismiss="modal" onclick="alert('✦ Coiffeur ajouté !')"><i
              class="bi bi-check2 me-1"></i>Ajouter</button></div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="addSvcModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <form  method="post" action="{{ route('create.category') }}" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Nouveau Category</h5><button type="button" class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body p-4">
          <div class="row g-3">
            <div class="col-12"><label class="form-label">Nom du Gategory</label><input type="text" name="name" class="form-control"
                placeholder="Ex: Coupe dégradée" /></div>
            <div class="col-12"><label class="form-label">Description</label><textarea  name="description" class="form-control"
                rows="2"></textarea></div>
          </div>
        </div>
        <div class="modal-footer"><button class="btn-do" data-bs-dismiss="modal">Annuler</button><button class="btn-g"
            data-bs-dismiss="modal" onclick="alert('✦ Service ajouté !')"><i
              class="bi bi-check2 me-1"></i>Créer</button></div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const titles = { overview: 'Vue d\'ensemble', users: 'Utilisateurs', barbers: 'Coiffeurs', reservations: 'Réservations', services: 'Services', slots: 'Créneaux', reports: 'Rapports & Stats', settings: 'Paramètres' };
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
  </script>
</body>

</html>