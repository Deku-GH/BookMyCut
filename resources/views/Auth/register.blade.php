<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CoiffeurPro – Créer un compte</title>
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

    /* PAGE LAYOUT */
    .page-wrapper {
      min-height: calc(100vh - 72px);
      display: flex;
    }

    .left-panel {
      background: linear-gradient(160deg, #1a1410 0%, #0d0d0e 100%);
      position: relative;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 4rem;
    }

    .left-panel::before {
      content: '';
      position: absolute;
      inset: 0;
      background: radial-gradient(ellipse 80% 70% at 30% 50%, rgba(201, 168, 76, 0.08), transparent 70%);
    }

    .left-content {
      position: relative;
      z-index: 1;
    }

    .left-panel .eyebrow {
      font-size: 0.72rem;
      letter-spacing: 5px;
      text-transform: uppercase;
      color: var(--gold);
      font-weight: 500;
      margin-bottom: 1rem;
    }

    .left-panel h2 {
      font-family: 'Playfair Display', serif;
      font-size: 2.6rem;
      line-height: 1.15;
      margin-bottom: 1.2rem;
    }

    .left-panel h2 em {
      color: var(--gold);
      font-style: normal;
    }

    .left-panel p {
      color: #a5a8ae;
      font-size: 0.95rem;
      line-height: 1.75;
      font-weight: 300;
      max-width: 380px;
      margin-bottom: 2.5rem;
    }

    .benefit-item {
      display: flex;
      align-items: flex-start;
      gap: 0.9rem;
      margin-bottom: 1.2rem;
    }

    .benefit-icon {
      width: 36px;
      height: 36px;
      background: rgba(201, 168, 76, 0.12);
      border-radius: 6px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      margin-top: 1px;
    }

    .benefit-icon i {
      color: var(--gold);
      font-size: 1rem;
    }

    .benefit-text strong {
      color: var(--white);
      font-size: 0.9rem;
      display: block;
      margin-bottom: 0.1rem;
    }

    .benefit-text span {
      color: var(--muted);
      font-size: 0.82rem;
    }

    .left-deco {
      position: absolute;
      bottom: -60px;
      right: -60px;
      font-size: 20rem;
      color: rgba(201, 168, 76, 0.03);
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
      max-width: 460px;
    }

    .form-box .form-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.9rem;
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

    .input-icon-wrap .bi {
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

    .input-icon-wrap .toggle-pw {
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

    .pw-wrap .form-control {
      padding-left: 2.5rem;
      padding-right: 2.8rem;
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

    .role-toggle {
      display: flex;
      gap: 0.5rem;
    }

    .role-btn {
      flex: 1;
      background: var(--dark3);
      border: 1px solid rgba(255, 255, 255, 0.08);
      color: var(--muted);
      border-radius: 6px;
      padding: 0.65rem;
      font-size: 0.85rem;
      cursor: pointer;
      transition: all 0.2s;
      text-align: center;
    }

    .role-btn.active,
    .role-btn:hover {
      border-color: var(--gold);
      color: var(--gold);
      background: rgba(201, 168, 76, 0.08);
    }

    .role-btn i {
      margin-right: 0.4rem;
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

    .form-check-label a {
      color: var(--gold);
      text-decoration: none;
    }

    .form-check-label a:hover {
      color: var(--gold-light);
    }

    .login-link {
      text-align: center;
      margin-top: 1.5rem;
      font-size: 0.88rem;
      color: var(--muted);
    }

    .login-link a {
      color: var(--gold);
      text-decoration: none;
      font-weight: 500;
    }

    .login-link a:hover {
      color: var(--gold-light);
    }

    .strength-bar {
      display: flex;
      gap: 3px;
      margin-top: 0.4rem;
    }

    .strength-seg {
      height: 3px;
      flex: 1;
      border-radius: 2px;
      background: rgba(255, 255, 255, 0.1);
      transition: background 0.3s;
    }

    .strength-seg.weak {
      background: #ef4444;
    }

    .strength-seg.medium {
      background: #f59e0b;
    }

    .strength-seg.strong {
      background: #22c55e;
    }

    .invalid-feedback {
      font-size: 0.78rem;
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
        <span style="color:var(--muted);font-size:0.88rem">Déjà inscrit ?</span>
        <a href="login.html" class="btn btn-outline-gold" style="padding:0.4rem 1.2rem;font-size:0.88rem">Se
          connecter</a>
      </div>
    </div>
  </nav>

  <div class="page-wrapper">
    <!-- LEFT PANEL -->
    <div class="col-lg-5 left-panel d-none d-lg-flex">
      <div class="left-content">
        <p class="eyebrow">✦ Rejoignez CoiffeurPro</p>
        <h2>Réservez<br />votre coiffeur<br /><em>en 2 minutes.</em></h2>
        <p>Créez votre compte gratuitement et accédez à votre salon de coiffure préféré sans jamais attendre.</p>
        <div class="benefit-item">
          <div class="benefit-icon"><i class="bi bi-calendar-check"></i></div>
          <div class="benefit-text">
            <strong>Créneaux en temps réel</strong>
            <span>Voyez les disponibilités et réservez instantanément</span>
          </div>
        </div>
        <div class="benefit-item">
          <div class="benefit-icon"><i class="bi bi-patch-check"></i></div>
          <div class="benefit-text">
            <strong>Confirmation immédiate</strong>
            <span>Votre rendez-vous est garanti dès la réservation</span>
          </div>
        </div>
        <div class="benefit-item">
          <div class="benefit-icon"><i class="bi bi-arrow-repeat"></i></div>
          <div class="benefit-text">
            <strong>Modification flexible</strong>
            <span>Changez ou annulez votre RDV à tout moment</span>
          </div>
        </div>
        <div class="benefit-item">
          <div class="benefit-icon"><i class="bi bi-shield-lock"></i></div>
          <div class="benefit-text">
            <strong>Compte sécurisé</strong>
            <span>Vos données sont protégées et confidentielles</span>
          </div>
        </div>
      </div>
      <span class="left-deco"><i class="bi bi-scissors"></i></span>
    </div>

    <!-- RIGHT PANEL -->
    <div class="col-lg-7 right-panel">
      <div class="form-box">
        <h2 class="form-title">Créer un compte</h2>
        <p class="form-sub">Inscription gratuite — aucune carte requise</p>

        <!-- Role toggle -->
        @if ($errors->any())
          <div>
            <ul>
              @foreach ($errors->all() as $error)
                <li class="brand-tagline">{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form  method="post" action="{{ route('register') }}">
          @csrf
          <div class="mb-3">
            <label class="form-label">Je suis un</label>
            <div class="role-toggle">
              @foreach($role as $roles)
                <div class="role-btn active" id="roleClient">
                  <i class="bi bi-person"></i>{{ $roles->name }}
                  <input type="radio" class="form-check-input" id="12" name="role_id" value="{{ $roles->id }}">
                </div>

              @endforeach

            </div>
          </div>
          <div class="row g-3">
            <div class="col-sm-6">
              <label class="form-label">Prénom</label>
              <div class="input-icon-wrap">
                <i class="bi bi-person"></i>
                <input type="text" name="ferstname" class="form-control" placeholder="Youssef" required />
                <div class="invalid-feedback">Veuillez entrer votre prénom.</div>
              </div>
            </div>
            <div class="col-sm-6">
              <label class="form-label">Nom</label>
              <div class="input-icon-wrap">
                <i class="bi bi-person"></i>
                <input type="text" class="form-control" name='lastname' placeholder="El Idrissi" required />
                <div class="invalid-feedback">Veuillez entrer votre nom.</div>
              </div>
            </div>
            <div class="col-12">
              <label class="form-label">Adresse e-mail</label>
              <div class="input-icon-wrap">
                <i class="bi bi-envelope"></i>
                <input type="email" class="form-control" name="email" placeholder="vous@example.ma" required />
                <div class="invalid-feedback">Veuillez entrer un e-mail valide.</div>
              </div>
            </div>
            <div class="col-12">
              <label class="form-label">Numéro de téléphone</label>
              <div class="input-icon-wrap">
                <i class="bi bi-telephone"></i>
                <input type="tel" class="form-control" name="telephone" placeholder="+212 6 00 00 00 00" />
              </div>
            </div>
            <div class="col-12" id="salonNameField" style="display:none">
              <label class="form-label">Nom du salon</label>
              <div class="input-icon-wrap">
                <i class="bi bi-shop"></i>
                <input type="text" class="form-control" namplaceholder="Salon de coiffure ..." />
              </div>
            </div>
            <div class="col-12">
              <label class="form-label">Mot de passe</label>
              <div class="input-icon-wrap pw-wrap">
                <i class="bi bi-lock"></i>
                <input type="password" class="form-control" name='password' id="pwField"
                  placeholder="Minimum 8 caractères" />
                <button type="button" class="toggle-pw"><i class="bi bi-eye"></i></button>
                <div class="invalid-feedback">Le mot de passe doit contenir au moins 8 caractères.</div>
              </div>
              <div class="strength-bar mt-1">
                <div class="strength-seg" id="s1"></div>
                <div class="strength-seg" id="s2"></div>
                <div class="strength-seg" id="s3"></div>
                <div class="strength-seg" id="s4"></div>
              </div>
            </div>
            <div class="col-12">
              <label class="form-label">Confirmer le mot de passe</label>
              <div class="input-icon-wrap pw-wrap">
                <i class="bi bi-lock-fill"></i>
                <input type="password" name="password_confirmation" class="form-control" id="pwConfirmField"
                  placeholder="Répétez votre mot de passe" required />
                <button type="button" class="toggle-pw"><i class="bi bi-eye"></i></button>
                <div class="invalid-feedback">Les mots de passe ne correspondent pas.</div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms" required />
                <label class="form-check-label" for="terms">
                  J'accepte les <a href="#">conditions d'utilisation</a> et la <a href="#">politique de
                    confidentialité</a>
                </label>
                <div class="invalid-feedback">Vous devez accepter les conditions.</div>
              </div>
            </div>
            <div class="col-12 mt-1">
              <button type="submit" class="btn btn-submit">
                Créer mon compte <i class="bi bi-arrow-right ms-1"></i>
              </button>
            </div>
          </div>
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

        <div class="login-link">
          Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>