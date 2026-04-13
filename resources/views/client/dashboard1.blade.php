<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>CoiffeurPro – Mon Espace Client</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
<style>
:root{
  --gold:#C9A84C;--gold-l:#e8c96a;--gold-dim:rgba(201,168,76,0.12);
  --dark:#0f1012;--dark2:#16181d;--dark3:#1e2128;--dark4:#262a32;
  --muted:#7a7d85;--white:#f0efe9;
  --green:#22c55e;--red:#ef4444;--blue:#3b82f6;
}
*{margin:0;padding:0;box-sizing:border-box;}
body{background:var(--dark);color:var(--white);font-family:'DM Sans',sans-serif;min-height:100vh;display:flex;}

/* SIDEBAR */
.sidebar{width:240px;background:var(--dark2);border-right:1px solid rgba(201,168,76,0.1);display:flex;flex-direction:column;flex-shrink:0;position:fixed;height:100vh;left:0;top:0;z-index:100;transition:width 0.3s;}
.sidebar.collapsed{width:64px;}
.sidebar.collapsed .nav-label,.sidebar.collapsed .brand-tagline,.sidebar.collapsed .user-info,.sidebar.collapsed .sidebar-section-label{display:none;}
.sidebar.collapsed .brand-logo{font-size:1.2rem;}
.sidebar-head{padding:1.4rem 1.2rem;border-bottom:1px solid rgba(201,168,76,0.08);}
.brand-logo{font-family:'Playfair Display',serif;font-size:1.35rem;color:var(--gold);white-space:nowrap;overflow:hidden;}
.brand-tagline{font-size:0.6rem;color:var(--muted);letter-spacing:3px;text-transform:uppercase;display:block;margin-top:-2px;}
.sidebar-user{padding:1rem 1.2rem;border-bottom:1px solid rgba(201,168,76,0.08);display:flex;align-items:center;gap:0.7rem;}
.user-avatar{width:36px;height:36px;background:var(--gold-dim);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.user-avatar i{color:var(--gold);font-size:1.1rem;}
.user-name{color:var(--white);font-size:0.88rem;font-weight:600;}
.user-role{color:var(--muted);font-size:0.74rem;}
.sidebar-nav{flex:1;padding:0.8rem 0;overflow-y:auto;}
.sidebar-section-label{font-size:0.65rem;letter-spacing:3px;text-transform:uppercase;color:var(--muted);padding:0.7rem 1.2rem 0.3rem;font-weight:500;}
.nav-item-s{display:flex;align-items:center;gap:0.8rem;padding:0.65rem 1.2rem;color:var(--muted);font-size:0.88rem;cursor:pointer;transition:all 0.2s;border-left:2px solid transparent;white-space:nowrap;text-decoration:none;}
.nav-item-s i{font-size:1.05rem;flex-shrink:0;width:20px;text-align:center;}
.nav-item-s:hover{color:var(--white);background:rgba(255,255,255,0.04);}
.nav-item-s.active{color:var(--gold);background:var(--gold-dim);border-left-color:var(--gold);}
.sidebar-footer{padding:1rem 1.2rem;border-top:1px solid rgba(201,168,76,0.08);}
.btn-collapse{background:none;border:1px solid rgba(255,255,255,0.08);color:var(--muted);border-radius:6px;padding:0.4rem 0.7rem;font-size:0.8rem;cursor:pointer;transition:all 0.2s;width:100%;}
.btn-collapse:hover{color:var(--white);border-color:rgba(255,255,255,0.2);}

/* MAIN */
.main{flex:1;margin-left:240px;transition:margin-left 0.3s;display:flex;flex-direction:column;min-height:100vh;}
.main.expanded{margin-left:64px;}
.topbar{background:var(--dark2);border-bottom:1px solid rgba(201,168,76,0.08);padding:0.9rem 1.8rem;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:50;}
.topbar-title{font-family:'Playfair Display',serif;font-size:1.15rem;color:var(--white);}
.topbar-sub{font-size:0.78rem;color:var(--muted);margin-top:1px;}
.topbar-right{display:flex;align-items:center;gap:0.8rem;}
.icon-btn{width:36px;height:36px;background:var(--dark3);border:1px solid rgba(255,255,255,0.07);border-radius:7px;display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--muted);transition:all 0.2s;position:relative;}
.icon-btn:hover{color:var(--gold);border-color:rgba(201,168,76,0.3);}
.notif-dot{position:absolute;top:5px;right:5px;width:7px;height:7px;background:var(--gold);border-radius:50%;border:1px solid var(--dark2);}
.content{padding:1.8rem;flex:1;}

/* CARDS */
.stat-card{background:var(--dark2);border:1px solid rgba(255,255,255,0.06);border-radius:12px;padding:1.4rem;transition:all 0.25s;position:relative;overflow:hidden;}
.stat-card:hover{border-color:rgba(201,168,76,0.25);transform:translateY(-2px);}
.stat-card::after{content:'';position:absolute;bottom:0;left:0;width:100%;height:2px;background:var(--gold);opacity:0;transition:opacity 0.25s;}
.stat-card:hover::after{opacity:1;}
.stat-icon{width:44px;height:44px;border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:0.9rem;}
.stat-icon.gold{background:var(--gold-dim);}
.stat-icon.green{background:rgba(34,197,94,0.1);}
.stat-icon.blue{background:rgba(59,130,246,0.1);}
.stat-icon.red{background:rgba(239,68,68,0.1);}
.stat-icon i{font-size:1.2rem;}
.stat-icon.gold i{color:var(--gold);}
.stat-icon.green i{color:var(--green);}
.stat-icon.blue i{color:var(--blue);}
.stat-icon.red i{color:var(--red);}
.stat-val{font-family:'Playfair Display',serif;font-size:1.8rem;color:var(--white);font-weight:700;line-height:1;}
.stat-lbl{font-size:0.8rem;color:var(--muted);margin-top:0.3rem;}
.stat-badge{font-size:0.73rem;padding:0.15rem 0.55rem;border-radius:20px;font-weight:600;}
.badge-up{background:rgba(34,197,94,0.12);color:var(--green);}
.badge-down{background:rgba(239,68,68,0.12);color:var(--red);}

/* NEXT APPT */
.next-card{background:linear-gradient(135deg, #1e1a10 0%, var(--dark3) 100%);border:1px solid rgba(201,168,76,0.2);border-radius:14px;padding:1.6rem;position:relative;overflow:hidden;}
.next-card::before{content:'';position:absolute;top:-40px;right:-40px;width:180px;height:180px;border-radius:50%;background:radial-gradient(circle,rgba(201,168,76,0.06),transparent 70%);}
.next-tag{font-size:0.68rem;letter-spacing:3px;text-transform:uppercase;color:var(--gold);font-weight:500;margin-bottom:0.7rem;}
.next-service{font-family:'Playfair Display',serif;font-size:1.5rem;color:var(--white);margin-bottom:0.5rem;}
.next-time{display:flex;align-items:center;gap:0.5rem;font-size:0.9rem;color:#c0c3ca;margin-bottom:1.2rem;}
.next-time i{color:var(--gold);}
.btn-cancel{background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.2);color:#fca5a5;border-radius:6px;padding:0.45rem 1rem;font-size:0.83rem;cursor:pointer;transition:all 0.2s;}
.btn-cancel:hover{background:rgba(239,68,68,0.2);}
.btn-modify{background:var(--gold-dim);border:1px solid rgba(201,168,76,0.25);color:var(--gold);border-radius:6px;padding:0.45rem 1rem;font-size:0.83rem;cursor:pointer;transition:all 0.2s;}
.btn-modify:hover{background:rgba(201,168,76,0.2);}

/* TABLE */
.table-card{background:var(--dark2);border:1px solid rgba(255,255,255,0.06);border-radius:12px;overflow:hidden;}
.table-head{padding:1.2rem 1.4rem;border-bottom:1px solid rgba(255,255,255,0.06);display:flex;align-items:center;justify-content:space-between;}
.table-head h6{font-family:'Playfair Display',serif;color:var(--white);font-size:1rem;margin:0;}
.t-table{width:100%;border-collapse:collapse;}
.t-table th{font-size:0.73rem;letter-spacing:2px;text-transform:uppercase;color:var(--muted);padding:0.75rem 1.4rem;font-weight:500;border-bottom:1px solid rgba(255,255,255,0.05);}
.t-table td{padding:0.85rem 1.4rem;font-size:0.88rem;border-bottom:1px solid rgba(255,255,255,0.04);color:#c0c3ca;vertical-align:middle;}
.t-table tr:last-child td{border-bottom:none;}
.t-table tr:hover td{background:rgba(255,255,255,0.02);}
.pill{display:inline-flex;align-items:center;gap:0.35rem;padding:0.2rem 0.7rem;border-radius:20px;font-size:0.75rem;font-weight:600;}
.pill-green{background:rgba(34,197,94,0.1);color:var(--green);}
.pill-gold{background:var(--gold-dim);color:var(--gold);}
.pill-red{background:rgba(239,68,68,0.1);color:var(--red);}
.pill-blue{background:rgba(59,130,246,0.1);color:var(--blue);}
.pill::before{content:'';width:5px;height:5px;border-radius:50%;background:currentColor;}

/* SERVICES GRID */
.svc-grid-card{background:var(--dark2);border:1px solid rgba(255,255,255,0.06);border-radius:12px;padding:1.4rem;cursor:pointer;transition:all 0.25s;text-align:center;}
.svc-grid-card:hover{border-color:rgba(201,168,76,0.35);transform:translateY(-3px);}
.svc-grid-icon{width:52px;height:52px;background:var(--gold-dim);border-radius:10px;display:flex;align-items:center;justify-content:center;margin:0 auto 0.8rem;}
.svc-grid-icon i{font-size:1.4rem;color:var(--gold);}
.svc-grid-card h6{font-family:'Playfair Display',serif;color:var(--white);font-size:0.95rem;margin-bottom:0.2rem;}
.svc-grid-card p{color:var(--muted);font-size:0.78rem;margin:0;}
.svc-grid-card .price{color:var(--gold);font-weight:700;font-size:0.9rem;margin-top:0.5rem;}

/* MODAL */
.modal-content{background:var(--dark2);border:1px solid rgba(201,168,76,0.2);border-radius:14px;}
.modal-header{border-bottom:1px solid rgba(255,255,255,0.06);padding:1.2rem 1.5rem;}
.modal-title{font-family:'Playfair Display',serif;color:var(--white);}
.modal-footer{border-top:1px solid rgba(255,255,255,0.06);padding:1rem 1.5rem;}
.btn-close{filter:invert(1) opacity(0.5);}
.form-control,.form-select{background:var(--dark3);border:1px solid rgba(255,255,255,0.08);color:var(--white);border-radius:6px;}
.form-control:focus,.form-select:focus{background:var(--dark3);color:var(--white);border-color:var(--gold);box-shadow:0 0 0 3px rgba(201,168,76,0.12);}
.form-select option{background:var(--dark3);}
.form-label{color:#c0c3ca;font-size:0.85rem;}
.btn-gold-full{background:var(--gold);color:var(--dark);border:none;border-radius:6px;font-weight:600;padding:0.6rem 1.4rem;transition:all 0.2s;}
.btn-gold-full:hover{background:var(--gold-l);color:var(--dark);}
.btn-dark-outline{background:transparent;border:1px solid rgba(255,255,255,0.1);color:var(--muted);border-radius:6px;padding:0.6rem 1.2rem;transition:all 0.2s;}
.btn-dark-outline:hover{color:var(--white);border-color:rgba(255,255,255,0.25);}

/* CALENDAR MINI */
.cal-mini{background:var(--dark2);border:1px solid rgba(255,255,255,0.06);border-radius:12px;padding:1.4rem;}
.cal-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;}
.cal-head span{font-family:'Playfair Display',serif;color:var(--white);font-size:1rem;}
.cal-nav{background:none;border:1px solid rgba(255,255,255,0.08);color:var(--muted);border-radius:5px;width:28px;height:28px;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all 0.2s;}
.cal-nav:hover{color:var(--gold);border-color:rgba(201,168,76,0.3);}
.cal-grid{display:grid;grid-template-columns:repeat(7,1fr);gap:2px;}
.cal-day-lbl{font-size:0.68rem;color:var(--muted);text-align:center;padding:0.3rem 0;letter-spacing:1px;}
.cal-day{height:32px;display:flex;align-items:center;justify-content:center;border-radius:6px;font-size:0.82rem;color:var(--muted);cursor:pointer;transition:all 0.2s;}
.cal-day:hover{background:rgba(255,255,255,0.05);color:var(--white);}
.cal-day.today{background:var(--gold-dim);color:var(--gold);font-weight:600;}
.cal-day.has-rdv{color:var(--white);}
.cal-day.has-rdv::after{content:'';display:block;width:4px;height:4px;border-radius:50%;background:var(--gold);position:absolute;bottom:3px;}
.cal-day.has-rdv{position:relative;}
.cal-day.empty{pointer-events:none;}

/* PAGE SECTIONS */
.page-section{display:none;}
.page-section.active{display:block;}
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-head">
    <div class="brand-logo">✦ CoiffeurPro</div>
    <span class="brand-tagline">Espace client</span>
  </div>
  <div class="sidebar-user">
    <div class="user-avatar"><i class="bi bi-person-fill"></i></div>
    <div class="user-info">
      <div class="user-name">{{Auth()->user()->ferstname}} {{Auth()->user()->lastname}}</div>
      <div class="user-role">Client</div>
    </div>
  </div>
  <nav class="sidebar-nav">
    <div class="sidebar-section-label">Principal</div>
    <a class="nav-item-s active" onclick="showPage('dashboard',this)">
      <i class="bi bi-grid-1x2"></i><span class="nav-label">Tableau de bord</span>
    </a>
    <a class="nav-item-s" onclick="showPage('reservation',this)">
      <i class="bi bi-calendar-plus"></i><span class="nav-label">Nouvelle réservation</span>
    </a>
    <a class="nav-item-s" onclick="showPage('rdvs',this)">
      <i class="bi bi-calendar3"></i><span class="nav-label">Mes rendez-vous</span>
    </a>
    <div class="sidebar-section-label">Services</div>
    <a class="nav-item-s" onclick="showPage('services',this)">
      <i class="bi bi-scissors"></i><span class="nav-label">Services & tarifs</span>
    </a>
    <div class="sidebar-section-label">Compte</div>
    <a class="nav-item-s" onclick="showPage('profil',this)">
      <i class="bi bi-person"></i><span class="nav-label">Mon profil</span>
    </a>
    <a class="nav-item-s" href="index.html">
      <i class="bi bi-house"></i><span class="nav-label">Retour accueil</span>
    </a>
    <a class="nav-item-s" href="login.html" style="color:#ef4444">
      <i class="bi bi-box-arrow-left"></i><span class="nav-label">Déconnexion</span>
    </a>
  </nav>
  <div class="sidebar-footer">
    <button class="btn-collapse" onclick="toggleSidebar()">
      <i class="bi bi-chevron-double-left" id="collapseIcon"></i>
      <span class="nav-label ms-1">Réduire</span>
    </button>
  </div>
</aside>

<!-- MAIN -->
<div class="main" id="mainContent">
  <!-- TOPBAR -->
  <div class="topbar">
    <div>
      <div class="topbar-title" id="pageTitle">Tableau de bord</div>
      <div class="topbar-sub" id="pageSub">Vendredi, 3 Janvier 2025 — Bonjour Youssef 👋</div>
    </div>
    <div class="topbar-right">
      <div class="icon-btn" title="Notifications">
        <i class="bi bi-bell"></i>
        <span class="notif-dot"></span>
      </div>
      <div class="icon-btn" title="Paramètres">
        <i class="bi bi-gear"></i>
      </div>
    </div>
  </div>

  <div class="content">

    <!-- ===== DASHBOARD PAGE ===== -->
    <div class="page-section active" id="page-dashboard">

      <!-- Stats -->
      <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
          <div class="stat-card">
            <div class="stat-icon gold"><i class="bi bi-calendar-check"></i></div>
            <div class="stat-val">8</div>
            <div class="stat-lbl">Total rendez-vous</div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="stat-card">
            <div class="stat-icon green"><i class="bi bi-patch-check"></i></div>
            <div class="stat-val">1</div>
            <div class="stat-lbl">Prochain RDV</div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="stat-card">
            <div class="stat-icon blue"><i class="bi bi-clock-history"></i></div>
            <div class="stat-val">7</div>
            <div class="stat-lbl">RDV passés</div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="stat-card">
            <div class="stat-icon gold"><i class="bi bi-star-fill"></i></div>
            <div class="stat-val">4.9</div>
            <div class="stat-lbl">Note service</div>
          </div>
        </div>
      </div>

      <div class="row g-4">
        <!-- Next appointment -->
        <div class="col-lg-5">
          <div class="next-card mb-3">
            <div class="next-tag">✦ Prochain rendez-vous</div>
            <div class="next-service">Coupe + Barbe</div>
            <div class="next-time"><i class="bi bi-calendar3"></i> Samedi 4 Jan · 10h00</div>
            <div class="next-time"><i class="bi bi-geo-alt"></i> Salon CoiffeurPro · Marrakech</div>
            <div class="d-flex gap-2 mt-3">
              <button class="btn-modify" data-bs-toggle="modal" data-bs-target="#modifyModal"><i class="bi bi-pencil me-1"></i>Modifier</button>
              <button class="btn-cancel" onclick="cancelAppt()"><i class="bi bi-x me-1"></i>Annuler</button>
            </div>
          </div>

          <!-- Mini calendar -->
          <div class="cal-mini">
            <div class="cal-head">
              <button class="cal-nav"><i class="bi bi-chevron-left"></i></button>
              <span>Janvier 2025</span>
              <button class="cal-nav"><i class="bi bi-chevron-right"></i></button>
            </div>
            <div class="cal-grid">
              <div class="cal-day-lbl">Lu</div><div class="cal-day-lbl">Ma</div><div class="cal-day-lbl">Me</div>
              <div class="cal-day-lbl">Je</div><div class="cal-day-lbl">Ve</div><div class="cal-day-lbl">Sa</div><div class="cal-day-lbl">Di</div>
              <div class="cal-day empty"></div><div class="cal-day empty"></div><div class="cal-day">1</div>
              <div class="cal-day today">3</div><div class="cal-day has-rdv">4</div><div class="cal-day">5</div>
              <div class="cal-day">6</div><div class="cal-day">7</div><div class="cal-day">8</div><div class="cal-day">9</div>
              <div class="cal-day">10</div><div class="cal-day">11</div><div class="cal-day">12</div><div class="cal-day">13</div>
              <div class="cal-day">14</div><div class="cal-day has-rdv">15</div><div class="cal-day">16</div><div class="cal-day">17</div>
              <div class="cal-day">18</div><div class="cal-day">19</div><div class="cal-day">20</div><div class="cal-day">21</div>
              <div class="cal-day">22</div><div class="cal-day">23</div><div class="cal-day">24</div><div class="cal-day">25</div>
              <div class="cal-day">26</div><div class="cal-day">27</div><div class="cal-day">28</div><div class="cal-day">29</div>
              <div class="cal-day">30</div><div class="cal-day">31</div>
            </div>
          </div>
        </div>

        <!-- Recent RDVs -->
        <div class="col-lg-7">
          <div class="table-card">
            <div class="table-head">
              <h6>Historique des réservations</h6>
              <button class="btn-gold-full" style="font-size:0.82rem;padding:0.4rem 1rem" onclick="showPage('reservation',document.querySelector('.nav-item-s:nth-child(3)'))">
                <i class="bi bi-plus me-1"></i>Nouveau RDV
              </button>
            </div>
            <div class="table-responsive">
              <table class="t-table">
                <thead>
                  <tr>
                    <th>Service</th><th>Date</th><th>Heure</th><th>Statut</th>
                  </tr>
                </thead>
                <tbody>
                  <tr><td><i class="bi bi-scissors me-2" style="color:var(--gold)"></i>Coupe + Barbe</td><td>Sam 4 Jan</td><td>10h00</td><td><span class="pill pill-gold">Confirmé</span></td></tr>
                  <tr><td><i class="bi bi-scissors me-2" style="color:var(--gold)"></i>Coupe cheveux</td><td>15 Jan</td><td>14h30</td><td><span class="pill pill-blue">À venir</span></td></tr>
                  <tr><td><i class="bi bi-droplet-half me-2" style="color:var(--blue)"></i>Soin & Shampoing</td><td>20 Déc</td><td>11h00</td><td><span class="pill pill-green">Terminé</span></td></tr>
                  <tr><td><i class="bi bi-scissors me-2" style="color:var(--gold)"></i>Coupe cheveux</td><td>5 Déc</td><td>09h30</td><td><span class="pill pill-green">Terminé</span></td></tr>
                  <tr><td><i class="bi bi-stars me-2" style="color:var(--gold)"></i>Taille de barbe</td><td>20 Nov</td><td>16h00</td><td><span class="pill pill-red">Annulé</span></td></tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== RÉSERVATION PAGE ===== -->
    <div class="page-section" id="page-reservation">
      <div class="row g-4">
        <div class="col-lg-7">
          <div class="table-card">
            <div class="table-head"><h6>Choisir un service</h6></div>
            <div class="p-4">
              <div class="row g-3" id="serviceSelector">
                <div class="col-6 col-md-4"><div class="svc-grid-card" onclick="selectService(this,'Coupe de cheveux','50 MAD')"><div class="svc-grid-icon"><i class="bi bi-scissors"></i></div><h6>Coupe</h6><p>Classique ou tendance</p><div class="price">50 MAD</div></div></div>
                <div class="col-6 col-md-4"><div class="svc-grid-card" onclick="selectService(this,'Taille de barbe','30 MAD')"><div class="svc-grid-icon"><i class="bi bi-stars"></i></div><h6>Barbe</h6><p>Design ou rasage</p><div class="price">30 MAD</div></div></div>
                <div class="col-6 col-md-4"><div class="svc-grid-card" onclick="selectService(this,'Coupe + Barbe','70 MAD')"><div class="svc-grid-icon"><i class="bi bi-gem"></i></div><h6>Coupe+Barbe</h6><p>Le combo complet</p><div class="price">70 MAD</div></div></div>
                <div class="col-6 col-md-4"><div class="svc-grid-card" onclick="selectService(this,'Soin & Shampoing','40 MAD')"><div class="svc-grid-icon"><i class="bi bi-droplet-half"></i></div><h6>Soin</h6><p>Traitement capillaire</p><div class="price">40 MAD</div></div></div>
                <div class="col-6 col-md-4"><div class="svc-grid-card" onclick="selectService(this,'Coloration','120 MAD')"><div class="svc-grid-icon"><i class="bi bi-brush"></i></div><h6>Coloration</h6><p>Teintes pro</p><div class="price">120 MAD</div></div></div>
                <div class="col-6 col-md-4"><div class="svc-grid-card" onclick="selectService(this,'Forfait Premium','100 MAD')"><div class="svc-grid-icon"><i class="bi bi-award"></i></div><h6>Premium</h6><p>Tout inclus</p><div class="price">100 MAD</div></div></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="next-card">
            <div class="next-tag">✦ Votre réservation</div>
            <div id="selectedService" style="font-family:'Playfair Display',serif;font-size:1.2rem;color:var(--muted);margin-bottom:1rem">Sélectionnez un service ↑</div>
            <div class="mb-3">
              <label class="form-label">Date souhaitée</label>
              <input type="date" class="form-control" id="bookDate"/>
            </div>
            <div class="mb-3">
              <label class="form-label">Créneau disponible</label>
              <select class="form-select" id="bookSlot">
                <option value="">-- Choisir un créneau --</option>
                <option>08h30</option><option>09h00</option><option>09h30</option>
                <option>10h00</option><option>10h30</option><option>11h00</option>
                <option>14h00</option><option>14h30</option><option>15h00</option>
                <option>15h30</option><option>16h00</option><option>16h30</option>
              </select>
            </div>
            <div id="bookPrice" style="font-size:0.88rem;color:var(--muted);margin-bottom:1rem"></div>
            <button class="btn-gold-full w-100" onclick="confirmBooking()">
              <i class="bi bi-calendar-check me-2"></i>Confirmer la réservation
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== MES RDVs ===== -->
    <div class="page-section" id="page-rdvs">
      <div class="table-card">
        <div class="table-head">
          <h6>Tous mes rendez-vous</h6>
          <div class="d-flex gap-2">
            <select class="form-select form-select-sm" style="width:auto;font-size:0.82rem">
              <option>Tous</option><option>À venir</option><option>Passés</option><option>Annulés</option>
            </select>
          </div>
        </div>
        <div class="table-responsive">
          <table class="t-table">
            <thead><tr><th>#</th><th>Service</th><th>Date</th><th>Heure</th><th>Durée</th><th>Prix</th><th>Statut</th><th>Actions</th></tr></thead>
            <tbody>
              <tr><td style="color:var(--muted)">#008</td><td>Coupe + Barbe</td><td>Sam 4 Jan 2025</td><td>10h00</td><td>45 min</td><td style="color:var(--gold)">70 MAD</td><td><span class="pill pill-gold">Confirmé</span></td><td><button class="btn-modify" style="padding:0.25rem 0.6rem;font-size:0.78rem">Modifier</button></td></tr>
              <tr><td style="color:var(--muted)">#007</td><td>Coupe cheveux</td><td>15 Jan 2025</td><td>14h30</td><td>30 min</td><td style="color:var(--gold)">50 MAD</td><td><span class="pill pill-blue">À venir</span></td><td><button class="btn-modify" style="padding:0.25rem 0.6rem;font-size:0.78rem">Modifier</button></td></tr>
              <tr><td style="color:var(--muted)">#006</td><td>Soin & Shampoing</td><td>20 Déc 2024</td><td>11h00</td><td>30 min</td><td style="color:var(--gold)">40 MAD</td><td><span class="pill pill-green">Terminé</span></td><td>—</td></tr>
              <tr><td style="color:var(--muted)">#005</td><td>Coupe cheveux</td><td>5 Déc 2024</td><td>09h30</td><td>30 min</td><td style="color:var(--gold)">50 MAD</td><td><span class="pill pill-green">Terminé</span></td><td>—</td></tr>
              <tr><td style="color:var(--muted)">#004</td><td>Taille de barbe</td><td>20 Nov 2024</td><td>16h00</td><td>20 min</td><td style="color:var(--gold)">30 MAD</td><td><span class="pill pill-red">Annulé</span></td><td>—</td></tr>
              <tr><td style="color:var(--muted)">#003</td><td>Coupe + Barbe</td><td>1 Nov 2024</td><td>10h00</td><td>45 min</td><td style="color:var(--gold)">70 MAD</td><td><span class="pill pill-green">Terminé</span></td><td>—</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- ===== SERVICES ===== -->
    <div class="page-section" id="page-services">
      <div class="row g-3">
        <div class="col-md-4"><div class="stat-card"><div class="svc-grid-icon" style="margin-bottom:0.8rem;width:50px;height:50px;background:var(--gold-dim);border-radius:10px;display:flex;align-items:center;justify-content:center"><i class="bi bi-scissors" style="font-size:1.4rem;color:var(--gold)"></i></div><h6 style="font-family:'Playfair Display',serif;color:var(--white)">Coupe de cheveux</h6><p style="color:var(--muted);font-size:0.83rem;margin:0.3rem 0 0.8rem">Coupe classique, dégradé ou tendance. Durée : 30 min</p><div style="color:var(--gold);font-weight:700">50 MAD</div></div></div>
        <div class="col-md-4"><div class="stat-card"><div style="margin-bottom:0.8rem;width:50px;height:50px;background:var(--gold-dim);border-radius:10px;display:flex;align-items:center;justify-content:center"><i class="bi bi-stars" style="font-size:1.4rem;color:var(--gold)"></i></div><h6 style="font-family:'Playfair Display',serif;color:var(--white)">Taille de barbe</h6><p style="color:var(--muted);font-size:0.83rem;margin:0.3rem 0 0.8rem">Barbe design, droite ou rasage soigné. Durée : 20 min</p><div style="color:var(--gold);font-weight:700">30 MAD</div></div></div>
        <div class="col-md-4"><div class="stat-card"><div style="margin-bottom:0.8rem;width:50px;height:50px;background:var(--gold-dim);border-radius:10px;display:flex;align-items:center;justify-content:center"><i class="bi bi-gem" style="font-size:1.4rem;color:var(--gold)"></i></div><h6 style="font-family:'Playfair Display',serif;color:var(--white)">Coupe + Barbe</h6><p style="color:var(--muted);font-size:0.83rem;margin:0.3rem 0 0.8rem">Le combo complet — coupe et barbe. Durée : 45 min</p><div style="color:var(--gold);font-weight:700">70 MAD</div></div></div>
        <div class="col-md-4"><div class="stat-card"><div style="margin-bottom:0.8rem;width:50px;height:50px;background:var(--gold-dim);border-radius:10px;display:flex;align-items:center;justify-content:center"><i class="bi bi-droplet-half" style="font-size:1.4rem;color:var(--gold)"></i></div><h6 style="font-family:'Playfair Display',serif;color:var(--white)">Soin & Shampoing</h6><p style="color:var(--muted);font-size:0.83rem;margin:0.3rem 0 0.8rem">Traitement capillaire professionnel. Durée : 30 min</p><div style="color:var(--gold);font-weight:700">40 MAD</div></div></div>
        <div class="col-md-4"><div class="stat-card"><div style="margin-bottom:0.8rem;width:50px;height:50px;background:var(--gold-dim);border-radius:10px;display:flex;align-items:center;justify-content:center"><i class="bi bi-brush" style="font-size:1.4rem;color:var(--gold)"></i></div><h6 style="font-family:'Playfair Display',serif;color:var(--white)">Coloration</h6><p style="color:var(--muted);font-size:0.83rem;margin:0.3rem 0 0.8rem">Teintes naturelles ou tendances pro. Durée : 60 min</p><div style="color:var(--gold);font-weight:700">120 MAD</div></div></div>
        <div class="col-md-4"><div class="stat-card"><div style="margin-bottom:0.8rem;width:50px;height:50px;background:var(--gold-dim);border-radius:10px;display:flex;align-items:center;justify-content:center"><i class="bi bi-award" style="font-size:1.4rem;color:var(--gold)"></i></div><h6 style="font-family:'Playfair Display',serif;color:var(--white)">Forfait Premium</h6><p style="color:var(--muted);font-size:0.83rem;margin:0.3rem 0 0.8rem">Coupe + Barbe + Soin tout inclus. Durée : 75 min</p><div style="color:var(--gold);font-weight:700">100 MAD</div></div></div>
      </div>
    </div>

    <!-- ===== PROFIL ===== -->
    <div class="page-section" id="page-profil">
      <div class="row g-4">
        <div class="col-lg-4">
          <div class="stat-card text-center">
            <div style="width:72px;height:72px;background:var(--gold-dim);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem">
              <i class="bi bi-person-fill" style="font-size:2rem;color:var(--gold)"></i>
            </div>
            <div style="font-family:'Playfair Display',serif;font-size:1.2rem;color:var(--white)">Youssef El Idrissi</div>
            <div style="color:var(--muted);font-size:0.83rem;margin-top:0.3rem">Client depuis Jan 2024</div>
            <hr style="border-color:rgba(255,255,255,0.07);margin:1rem 0"/>
            <div class="d-flex justify-content-around">
              <div><div style="font-family:'Playfair Display',serif;font-size:1.4rem;color:var(--gold)">8</div><div style="font-size:0.75rem;color:var(--muted)">RDV total</div></div>
              <div><div style="font-family:'Playfair Display',serif;font-size:1.4rem;color:var(--gold)">4.9★</div><div style="font-size:0.75rem;color:var(--muted)">Note</div></div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="table-card">
            <div class="table-head"><h6>Informations personnelles</h6></div>
            <div class="p-4">
              <div class="row g-3">
                <div class="col-sm-6"><label class="form-label">Prénom</label><input type="text" class="form-control" value="{{ Auth()->user()->ferstname }}"/></div>
                <div class="col-sm-6"><label class="form-label">Nom</label><input type="text" class="form-control" value="{{ Auth()->user()->lastname }}"/></div>
                <div class="col-sm-6"><label class="form-label">Email</label><input type="email" class="form-control" value="{{ Auth()->user()->email }}"/></div>
                <div class="col-sm-6"><label class="form-label">Téléphone</label><input type="tel" class="form-control" value="{{ Auth()->user()->telephone }}"/></div>
                <div class="col-12 mt-2">
                  <button class="btn-gold-full" onclick="alert('✦ Profil mis à jour avec succès !')">Enregistrer les modifications</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div><!-- /content -->
</div><!-- /main -->

<!-- MODIFY MODAL -->
<div class="modal fade" id="modifyModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modifier le rendez-vous</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-4">
        <div class="mb-3">
          <label class="form-label">Service</label>
          <select class="form-select"><option>Coupe + Barbe — 70 MAD</option><option>Coupe de cheveux — 50 MAD</option><option>Taille de barbe — 30 MAD</option></select>
        </div>
        <div class="mb-3">
          <label class="form-label">Nouvelle date</label>
          <input type="date" class="form-control"/>
        </div>
        <div class="mb-3">
          <label class="form-label">Nouveau créneau</label>
          <select class="form-select"><option>08h30</option><option>09h00</option><option>10h00</option><option selected>10h30</option><option>11h00</option><option>14h00</option><option>15h00</option></select>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn-dark-outline" data-bs-dismiss="modal">Annuler</button>
        <button class="btn-gold-full" data-bs-dismiss="modal" onclick="alert('✦ Rendez-vous modifié avec succès !')">Confirmer la modification</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
const pageTitles = {
  dashboard:'Tableau de bord', reservation:'Nouvelle réservation',
  rdvs:'Mes rendez-vous', services:'Services & tarifs', profil:'Mon profil'
};
function showPage(id, el) {
  document.querySelectorAll('.page-section').forEach(p=>p.classList.remove('active'));
  document.getElementById('page-'+id).classList.add('active');
  document.querySelectorAll('.nav-item-s').forEach(n=>n.classList.remove('active'));
  if(el) el.classList.add('active');
  document.getElementById('pageTitle').textContent = pageTitles[id] || id;
}
function toggleSidebar() {
  const sb = document.getElementById('sidebar');
  const main = document.getElementById('mainContent');
  const icon = document.getElementById('collapseIcon');
  sb.classList.toggle('collapsed');
  main.classList.toggle('expanded');
  icon.className = sb.classList.contains('collapsed') ? 'bi bi-chevron-double-right' : 'bi bi-chevron-double-left';
}
let selectedSvc = null;
function selectService(el, name, price) {
  document.querySelectorAll('.svc-grid-card').forEach(c=>c.style.borderColor='');
  el.style.borderColor = 'var(--gold)';
  selectedSvc = {name, price};
  document.getElementById('selectedService').textContent = name;
  document.getElementById('selectedService').style.color = 'var(--white)';
  document.getElementById('bookPrice').innerHTML = '<span style="color:var(--gold);font-weight:700">'+price+'</span>';
}
function confirmBooking() {
  const d = document.getElementById('bookDate').value;
  const s = document.getElementById('bookSlot').value;
  if(!selectedSvc){alert('Veuillez sélectionner un service.');return;}
  if(!d){alert('Veuillez choisir une date.');return;}
  if(!s){alert('Veuillez choisir un créneau.');return;}
  alert('✦ Réservation confirmée !\n\n' + selectedSvc.name + '\n📅 ' + d + ' à ' + s);
}
function cancelAppt() {
  if(confirm('Voulez-vous vraiment annuler ce rendez-vous ?')) {
    alert('Rendez-vous annulé. Vous pouvez réserver un nouveau créneau à tout moment.');
  }
}
</script>
</body>
</html>