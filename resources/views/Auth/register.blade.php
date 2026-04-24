<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CoiffeurPro – Créer un compte</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Plus+Jakarta+Sans:wght@300;400;600&display=swap"
    rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />

  <style>
    :root {
      --primary-gold: #D4AF37;
      --gold-soft: rgba(212, 175, 55, 0.15);
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
      /* Arrière-plan décoratif subtil */
      background-image:
        radial-gradient(circle at 10% 20%, rgba(212, 175, 55, 0.05) 0%, transparent 40%),
        radial-gradient(circle at 90% 80%, rgba(212, 175, 55, 0.05) 0%, transparent 40%);
    }

    /* NAVBAR SÉCURISÉE */
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

    /* CARD D'INSCRIPTION GLASSMORPHISM */
    .auth-container {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem 1rem;
    }

    .auth-card {
      background: var(--glass);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 24px;
      padding: 3rem;
      width: 100%;
      max-width: 550px;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }

    .form-title {
      font-family: 'Playfair Display', serif;
      font-size: 2.2rem;
      margin-bottom: 0.5rem;
      text-align: center;
    }

    .form-sub {
      color: var(--text-muted);
      text-align: center;
      margin-bottom: 2.5rem;
      font-size: 0.95rem;
    }

    /* FORMULAIRE & INPUTS */
    .form-label {
      font-size: 0.85rem;
      font-weight: 600;
      margin-bottom: 0.6rem;
      color: #ccc;
      letter-spacing: 0.5px;
    }

    .input-group-custom {
      position: relative;
      margin-bottom: 1.5rem;
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
      background: rgba(255, 255, 255, 0.08) !important;
    }

    /* TOGGLE RÔLE STYLISÉ */
    .role-selector {
      display: flex;
      background: rgba(0, 0, 0, 0.2);
      padding: 5px;
      border-radius: 14px;
      margin-bottom: 2rem;
      border: 1px solid var(--glass-border);
    }

    .role-option {
      flex: 1;
      text-align: center;
      padding: 10px;
      cursor: pointer;
      border-radius: 10px;
      font-size: 0.9rem;
      transition: 0.3s;
      color: var(--text-muted);
      border: none;
      background: transparent;
    }

    .role-option.active {
      background: var(--primary-gold);
      color: #000;
      font-weight: 700;
    }

    /* BOUTON SUBMIT */
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
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .btn-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(212, 175, 55, 0.3);
      background: #f1d27b;
    }

    .login-footer {
      text-align: center;
      margin-top: 2rem;
      font-size: 0.9rem;
      color: var(--text-muted);
    }

    .login-footer a {
      color: var(--primary-gold);
      text-decoration: none;
      font-weight: 600;
    }

    /* BARRE DE FORCE DU MOT DE PASSE */
    .strength-meter {
      height: 4px;
      display: flex;
      gap: 4px;
      margin-top: -10px;
      margin-bottom: 1.5rem;
    }

    .strength-dot {
      flex: 1;
      height: 100%;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 2px;
    }
  </style>
</head>

<body>

  <nav class="navbar">
    <div class="container justify-content-center">
      <a class="brand-logo" href="/">✦ COIFFEURPRO</a>
    </div>
  </nav>

  <div class="auth-container">
    <div class="auth-card">
      <h2 class="form-title">Créer un compte</h2>
      <p class="form-sub">L'excellence commence ici.</p>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div class="role-selector">
          @foreach($role as $roles)
            <button type="button" class="role-option {{ $loop->first ? 'active' : '' }}"
              onclick="selectRole(this, '{{ $roles->id }}', '{{ $roles->name }}')">
              {{ $roles->name }}
            </button>
          @endforeach
          <input type="hidden" name="role_id" id="selected_role_id" value="{{ $role->first()->id }}">
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Prénom</label>
            <div class="input-group-custom">
              <i class="bi bi-person"></i>
              <input type="text" name="ferstname" class="form-control" placeholder="Ex: Youssef" required>
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Nom</label>
            <div class="input-group-custom">
              <i class="bi bi-person-badge"></i>
              <input type="text" name="lastname" class="form-control" placeholder="Ex: El Idrissi" required>
            </div>
          </div>
        </div>
       <div class="mb-3">
          <label class="form-label">Photo de profil</label>
          <div class="input-group">
            <input type="file" name="photo" class="form-control" accept="image/*">
          </div>
          <div class="form-text " style="font-size: 0.7rem;">JPG/PNG, Max 2Mo.</div>
        </div>
        <label class="form-label">telephone </label>
        <div class="input-group-custom">
          <i class="bi bi-telephone"></i>
          <input type="text" name="telephone" class="form-control" placeholder="06XXXXXXXX" required>
        </div>
        <label class="form-label">Email</label>
        <div class="input-group-custom">
          <i class="bi bi-envelope"></i>
          <input type="email" name="email" class="form-control" placeholder="votre@email.com" required>
        </div>

        <label class="form-label">Mot de passe</label>
        <div class="input-group-custom">
          <i class="bi bi-shield-lock"></i>
          <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>

        <label class="form-label">Confirmer</label>
        <div class="input-group-custom">
          <i class="bi bi-check2-circle"></i>
          <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••" required>
        </div>
        <div id="address-fields" style="display: none;">
          <hr class="my-3">

          <label class="form-label">City</label>
          <div class="input-group-custom">
            <i class="bi bi-geo-alt"></i>
            <input type="text" name="city" class="form-control" placeholder="City">
          </div>

          <label class="form-label">Street</label>
          <div class="input-group-custom">
            <i class="bi bi-signpost"></i>
            <input type="text" name="street" class="form-control" placeholder="Street">
          </div>

          <label class="form-label">Zip Code</label>
          <div class="input-group-custom">
            <i class="bi bi-mailbox"></i>
            <input type="text" name="zip" class="form-control" placeholder="Zip Code">
          </div>
        </div>

        <div class="form-check mb-4">
          <input class="form-check-input" type="checkbox" id="terms" required>
          <label class="form-check-label small text-secondary" for="terms">
            J'accepte les <a href="#" class="text-white">Conditions d'utilisation</a>
          </label>
        </div>

        <button class="btn btn-submit">Commencer l'expérience</button>
      </form>

      <div class="login-footer">
        Vous avez déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a>
      </div>
    </div>
  </div>

  <script>

    function selectRole(btn, roleId, roleName) {

      document.querySelectorAll('.role-option')
        .forEach(b => b.classList.remove('active'));

      btn.classList.add('active');

      document.getElementById('selected_role_id').value = roleId;

      const addressFields = document.getElementById('address-fields');

      if (roleName.toLowerCase() === 'barber') {
        addressFields.style.display = 'block';
      } else {
        addressFields.style.display = 'none';
      }
    }
  </script>

  </script>
</body>

</html>