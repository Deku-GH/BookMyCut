<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CoiffeurPro – Connexion</title>
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
      min-height: 100vh;
    }

    /* NAVBAR */
    .navbar {
      background: rgba(17, 18, 20, 0.97);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid rgba(201, 168, 76, 0.15);
      padding: 1rem 0;
    }

    .brand-logo {
      font-family: 'Playfair Display', serif;
      font-size: 1.5rem;
      color: var(--gold);
      letter-spacing: 1px;
    }

    .brand-tagline {
      font-size: 0.62rem;
      color: var(--muted);
      letter-spacing: 3px;
      text-transform: uppercase;
      display: block;
      margin-top: -4px;
    }

    .btn-outline-gold {
      background: transparent;
      color: var(--gold);
      border: 1px solid var(--gold);
      border-radius: 4px;
      padding: 0.4rem 1.2rem;
      font-size: 0.88rem;
      transition: all 0.2s;
      text-decoration: none;
    }

    .btn-outline-gold:hover {
      background: rgba(201, 168, 76, 0.1);
      color: var(--gold);
    }

    /* PAGE WRAPPER */
    .page-wrapper {
      min-height: calc(100vh - 72px);
      display: flex;
    }

    .left-panel {
      background: linear-gradient(160deg, #0d0d0e 0%, #1a1410 100%);
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 4rem;
      position: relative;
      overflow: hidden;
    }

    .left-panel::before {
      content: '';
      position: absolute;
      inset: 0;
      background: radial-gradient(ellipse 70% 70% at 40% 40%, rgba(201, 168, 76, 0.09), transparent 70%);
    }

    .left-content {
      position: relative;
      z-index: 1;
    }

    .eyebrow {
      font-size: 0.72rem;
      letter-spacing: 5px;
      text-transform: uppercase;
      color: var(--gold);
      font-weight: 500;
      margin-bottom: 1rem;
    }

    .left-panel h2 {
      font-family: 'Playfair Display', serif;
      font-size: 2.8rem;
      line-height: 1.12;
      margin-bottom: 1.2rem;
    }

    .left-panel h2 em {
      color: var(--gold);
      font-style: normal;
    }

    .left-panel p {
      color: #a5a8ae;
      font-size: 0.95rem;
      line-height: 1.8;
      max-width: 370px;
      margin-bottom: 2.5rem;
      font-weight: 300;
    }

    .preview-card {
      background: rgba(26, 28, 32, 0.95);
      border: 1px solid rgba(201, 168, 76, 0.18);
      border-radius: 12px;
      padding: 1.4rem;
      backdrop-filter: blur(8px);
      max-width: 320px;
    }

    .preview-card .pc-head {
      display: flex;
      align-items: center;
      gap: 0.8rem;
      margin-bottom: 1rem;
      padding-bottom: 0.9rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    }

    .pc-avatar {
      width: 42px;
      height: 42px;
      background: rgba(201, 168, 76, 0.15);
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .pc-avatar i {
      color: var(--gold);
      font-size: 1.2rem;
    }

    .pc-name {
      color: var(--white);
      font-weight: 600;
      font-size: 0.92rem;
    }

    .pc-role {
      color: var(--muted);
      font-size: 0.78rem;
    }

    .pc-rdv {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.6rem 0;
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .pc-rdv:last-child {
      border-bottom: none;
      padding-bottom: 0;
    }

    .pc-rdv .info {
      font-size: 0.84rem;
      color: var(--white);
    }

    .pc-rdv .time {
      font-size: 0.78rem;
      color: var(--muted);
      margin-top: 1px;
    }

    .badge-gold {
      background: rgba(201, 168, 76, 0.15);
      color: var(--gold);
      font-size: 0.73rem;
      padding: 0.2rem 0.6rem;
      border-radius: 20px;
      font-weight: 600;
    }

    .badge-green {
      background: rgba(74, 222, 128, 0.12);
      color: #4ade80;
      font-size: 0.73rem;
      padding: 0.2rem 0.6rem;
      border-radius: 20px;
      font-weight: 600;
    }

    .left-deco {
      position: absolute;
      bottom: -80px;
      right: -80px;
      font-size: 22rem;
      color: rgba(201, 168, 76, 0.025);
      pointer-events: none;
    }

    /* RIGHT PANEL */
    .right-panel {
      background: var(--dark2);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 3rem 2rem;
    }

    .form-box {
      width: 100%;
      max-width: 420px;
    }

    .form-box .form-title {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      color: var(--white);
      margin-bottom: 0.4rem;
    }

    .form-box .form-sub {
      color: var(--muted);
      font-size: 0.9rem;
      margin-bottom: 2rem;
    }

    .form-label {
      color: #c0c3ca;
      font-size: 0.85rem;
      margin-bottom: 0.4rem;
      font-weight: 500;
    }

    .form-control {
      background: var(--dark3);
      border: 1px solid rgba(255, 255, 255, 0.08);
      color: var(--white);
      border-radius: 6px;
      padding: 0.75rem 1rem;
      font-size: 0.9rem;
      transition: border-color 0.2s, box-shadow 0.2s;
    }

    .form-control:focus {
      background: var(--dark3);
      color: var(--white);
      border-color: var(--gold);
      box-shadow: 0 0 0 3px rgba(201, 168, 76, 0.12);
      outline: none;
    }

    .form-control::placeholder {
      color: rgba(138, 141, 148, 0.6);
    }

    .input-icon-wrap {
      position: relative;
    }

    .input-icon-wrap>.bi {
      position: absolute;
      left: 0.9rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--muted);
      font-size: 0.95rem;
      pointer-events: none;
    }

    .input-icon-wrap .form-control {
      padding-left: 2.5rem;
    }

    .pw-wrap .form-control {
      padding-right: 2.8rem;
    }

    .toggle-pw {
      position: absolute;
      right: 0.9rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--muted);
      cursor: pointer;
      background: none;
      border: none;
      font-size: 1rem;
    }

    .btn-submit {
      background: var(--gold);
      color: var(--dark);
      border: none;
      border-radius: 6px;
      font-weight: 600;
      font-size: 0.95rem;
      padding: 0.85rem;
      width: 100%;
      transition: all 0.25s;
      box-shadow: 0 4px 20px rgba(201, 168, 76, 0.22);
    }

    .btn-submit:hover {
      background: var(--gold-light);
      transform: translateY(-1px);
      color: var(--dark);
    }

    .form-check-input {
      background-color: var(--dark3);
      border-color: rgba(255, 255, 255, 0.15);
    }

    .form-check-input:checked {
      background-color: var(--gold);
      border-color: var(--gold);
    }

    .form-check-label {
      color: var(--muted);
      font-size: 0.85rem;
    }

    .forgot-link {
      color: var(--gold);
      text-decoration: none;
      font-size: 0.85rem;
    }

    .forgot-link:hover {
      color: var(--gold-light);
    }

    .divider {
      position: relative;
      text-align: center;
      margin: 1.5rem 0;
    }

    .divider::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 0;
      width: 100%;
      height: 1px;
      background: rgba(255, 255, 255, 0.07);
    }

    .divider span {
      background: var(--dark2);
      padding: 0 1rem;
      font-size: 0.8rem;
      color: var(--muted);
      position: relative;
    }

    .register-link {
      text-align: center;
      margin-top: 1.5rem;
      font-size: 0.88rem;
      color: var(--muted);
    }

    .register-link a {
      color: var(--gold);
      text-decoration: none;
      font-weight: 500;
    }

    .register-link a:hover {
      color: var(--gold-light);
    }

    .alert-error {
      background: rgba(239, 68, 68, 0.1);
      border: 1px solid rgba(239, 68, 68, 0.2);
      color: #fca5a5;
      border-radius: 6px;
      padding: 0.75rem 1rem;
      font-size: 0.87rem;
      margin-bottom: 1rem;
      display: none;
    }

    .alert-error.show {
      display: flex;
      align-items: center;
      gap: 0.6rem;
    }

    /* Tab selector */
    .login-tabs {
      display: flex;
      gap: 0;
      background: var(--dark3);
      border-radius: 8px;
      padding: 4px;
      margin-bottom: 2rem;
    }

    .login-tab {
      flex: 1;
      text-align: center;
      padding: 0.55rem;
      font-size: 0.87rem;
      border-radius: 6px;
      cursor: pointer;
      color: var(--muted);
      transition: all 0.2s;
      border: none;
      background: none;
    }

    .login-tab.active {
      background: var(--dark2);
      color: var(--gold);
      font-weight: 500;
    }

    .login-tab i {
      margin-right: 0.4rem;
    }
  </style>
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <span class="brand-logo">✦ CoiffeurPro</span>
        <span class="brand-tagline">Réservation en ligne</span>
      </a>
      <div class="ms-auto d-flex align-items-center gap-3">
        <span style="color:var(--muted);font-size:0.88rem">Nouveau client ?</span>
        <a href="register.html" class="btn-outline-gold">Créer un compte</a>
      </div>
    </div>
  </nav>

  <div class="page-wrapper">
    <!-- LEFT PANEL -->
    <div class="col-lg-5 left-panel d-none d-lg-flex">
      <div class="left-content">
        <p class="eyebrow">✦ Content de vous revoir</p>
        <h2>Votre style<br />vous <em>attend.</em><br />Connectez-vous.</h2>
        <p>Accédez à votre espace personnel, consultez vos prochains rendez-vous et réservez votre prochain créneau en
          quelques secondes.</p>

        <!-- Preview card -->
        <div class="preview-card">
          <div class="pc-head">
            <div class="pc-avatar"><i class="bi bi-person-fill"></i></div>
            <div>
              <div class="pc-name">Youssef El Idrissi</div>
              <div class="pc-role">Client CoiffeurPro</div>
            </div>
          </div>
          <div
            style="font-size:0.75rem;color:var(--muted);letter-spacing:2px;text-transform:uppercase;margin-bottom:0.8rem">
            Prochains rendez-vous</div>
          <div class="pc-rdv">
            <div>
              <div class="info">Coupe + Barbe</div>
              <div class="time">Demain — 10h00</div>
            </div>
            <span class="badge-gold">Confirmé</span>
          </div>
          <div class="pc-rdv">
            <div>
              <div class="info">Coupe de cheveux</div>
              <div class="time">15 Jan — 14h30</div>
            </div>
            <span class="badge-green">En attente</span>
          </div>
        </div>
      </div>
      <span class="left-deco"><i class="bi bi-scissors"></i></span>
    </div>

    <!-- RIGHT PANEL -->
    <div class="col-lg-7 right-panel">
      <div class="form-box">
        <h2 class="form-title">Connexion</h2>
        <p class="form-sub">Bienvenue ! Entrez vos identifiants pour accéder à votre espace.</p>

        <!-- Tabs -->
        <div class="login-tabs">
          <button  class="login-tab active" id="tabClient">
            <i class="bi bi-person"></i>login
          </button>
          
        </div>

        <!-- Error alert -->
        <div class="alert-error" id="alertError">
          <i class="bi bi-exclamation-circle-fill"></i>
          <span>Identifiants incorrects. Veuillez réessayer.</span>
        </div>
        @if ($errors->any())
          <div>
            <ul>
              @foreach ($errors->all() as $error)
                <li class="brand-tagline">{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="post" action="{{ route('login') }}">
          <div class="mb-3">
            <label class="form-label">Adresse e-mail</label>
            <div class="input-icon-wrap">
              <i class="bi bi-envelope"></i>
              <input type="email" class="form-control" name="email" placeholder="vous@example.ma" required />
              <div class="invalid-feedback">Veuillez entrer votre adresse e-mail.</div>
            </div>
          </div>

          <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <label class="form-label mb-0">Mot de passe</label>
              <a href="#" class="forgot-link">Mot de passe oublié ?</a>
            </div>
            <div class="input-icon-wrap pw-wrap position-relative">
              <i class="bi bi-lock"></i>
              <input type="password" class="form-control" name="password" id="loginPw" placeholder="Votre mot de passe"
                required />
              <button type="button" class="toggle-pw"><i class="bi bi-eye" id="pwEyeIcon"></i></button>
              <div class="invalid-feedback">Veuillez entrer votre mot de passe.</div>
            </div>
          </div>

          <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="rememberMe" />
              <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
            </div>
          </div>

          <button type="submit" class="btn btn-submit">
            <span id="btnText">Se connecter <i class="bi bi-arrow-right ms-1"></i></span>
            <span id="btnLoader" style="display:none"><i class="bi bi-hourglass-split me-2"></i>Connexion…</span>
          </button>
        </form>

        <div class="divider"><span>ou</span></div>
        <div class="d-flex gap-2">
          <button class="btn w-50"
            style="background:var(--dark3);border:1px solid rgba(255,255,255,0.08);color:var(--muted);border-radius:6px;font-size:0.85rem;">
            <i class="bi bi-google me-2"></i>Google
          </button>
          <button class="btn w-50"
            style="background:var(--dark3);border:1px solid rgba(255,255,255,0.08);color:var(--muted);border-radius:6px;font-size:0.85rem;">
            <i class="bi bi-facebook me-2"></i>Facebook
          </button>
        </div>

        <div class="register-link">
          Pas encore de compte ? <a href="register.html">S'inscrire gratuitement</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>