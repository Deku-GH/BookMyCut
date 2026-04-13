<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CoiffeurPro – Mes Services</title>
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

        /* ── SIDEBAR ── */
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

        /* ── MAIN ── */
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

        .content {
            padding: 1.6rem;
            flex: 1;
        }

        /* ── STAT CARDS ── */
        .sc {
            background: var(--dark2);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 1.2rem;
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
            width: 40px;
            height: 40px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.75rem;
        }

        .sc-ico i {
            font-size: 1.1rem;
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

        .sc-val {
            font-family: 'Playfair Display', serif;
            font-size: 1.7rem;
            color: var(--white);
            font-weight: 700;
            line-height: 1;
        }

        .sc-lbl {
            font-size: 0.77rem;
            color: var(--muted);
            margin-top: 0.25rem;
        }

        /* ── TABLE CARD ── */
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
            background: rgba(255, 255, 255, 0.025);
        }

        .empty-row td {
            text-align: center;
            padding: 3rem;
            color: var(--muted);
            font-size: 0.88rem;
        }

        /* ── PILLS ── */
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

        /* ── BUTTONS ── */
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
            text-decoration: none;
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
            padding: 0.22rem 0.62rem;
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
            background: rgba(239, 68, 68, 0.08);
            color: #fca5a5;
            border: 1px solid rgba(239, 68, 68, 0.15);
        }

        .btn-sm.er:hover {
            background: rgba(239, 68, 68, 0.16);
        }

        /* ── FORMS ── */
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
            color: rgba(110, 114, 128, 0.55);
        }

        .form-select option {
            background: var(--dark3);
        }

        .form-label {
            color: #b8bbc4;
            font-size: 0.83rem;
            margin-bottom: 0.35rem;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }

        /* ── MODAL ── */
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

        /* ── TOGGLE SWITCH ── */
        .tgl {
            position: relative;
            width: 34px;
            height: 18px;
            cursor: pointer;
            display: inline-block;
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

        /* ── PROGRESS ── */
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

        /* ── ALERT ── */
        .alert-success-custom {
            background: rgba(34, 197, 94, 0.08);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: var(--green);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 0.86rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .alert-err-custom {
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #fca5a5;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 0.86rem;
        }
    </style>
</head>

<body>

    {{-- ======================== SIDEBAR ======================== --}}
    <aside class="sidebar" id="sb">
        <div class="sb-head">
            <div>
                <div class="brand-logo">✦ CoiffeurPro</div>
                <span class="brand-tagline">Espace coiffeur</span>
            </div>
            <span class="barber-badge lbl">Coiffeur</span>
        </div>
        <div class="sb-user">
            <div class="u-av">
                {{ strtoupper(substr(Auth()->user()->firstname, 0, 1) . substr(Auth()->user()->lastname, 0, 1)) }}</div>
            <div class="u-info">
                <div class="u-name">{{ Auth()->user()->firstname }} {{ Auth()->user()->lastname }}</div>
                <div class="u-role">Coiffeur</div>
                <div class="u-score">⭐ {{ Auth()->user()->note ?? '—' }}</div>
            </div>
        </div>
        <nav class="sb-nav">
            <div class="sec-lbl">Tableau de bord</div>
            <a class="ni" href="{{ route('barber.dashboard') }}"><i class="bi bi-grid-1x2"></i><span class="lbl">Vue
                    d'ensemble</span></a>
            <a class="ni" href="#"><i class="bi bi-calendar3"></i><span class="lbl">Mes réservations</span></a>

            <div class="sec-lbl">Gestion</div>
            <a class="ni active" href="{{ route('create.services') }}"><i class="bi bi-list-stars"></i><span
                    class="lbl">Mes services</span></a>
            <a class="ni" href="#"><i class="bi bi-clock"></i><span class="lbl">Mes créneaux</span></a>
            <a class="ni" href="#"><i class="bi bi-people"></i><span class="lbl">Mes clients</span></a>

            <div class="sec-lbl">Compte</div>
            <a class="ni" href="#"><i class="bi bi-person"></i><span class="lbl">Mon profil</span></a>
            <a class="ni danger" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                <i class="bi bi-box-arrow-left"></i><span class="lbl">Déconnexion</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </nav>
        <div class="sb-foot">
            <button class="btn-col" onclick="tc()">
                <i class="bi bi-chevron-double-left" id="ci"></i>
                <span class="lbl ms-1">Réduire</span>
            </button>
        </div>
    </aside>



   
        <div class="main" id="mn">

>
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ route('services.update', $service->id) }}" class="modal-content">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">
                        <i class="bi bi-pencil me-2" style="color:var(--gold)"></i>Modifier le service
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Nom du service <span style="color:var(--red)">*</span></label>
                             <input type="text" name="titre" value="{{ $service->titre }}">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Durée (min) <span style="color:var(--red)">*</span></label>
                            <input type="number" name="duration" value="{{ $service->duration }}">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Prix (MAD) <span style="color:var(--red)">*</span></label>
                           <input type="number" name="prix" value="{{ $service->prix }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea name="description">{{ $service->description }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Catégorie <span style="color:var(--red)">*</span></label>
                            <select class="form-select" name="category_id" id="edit_category" required>
                                <option value="">-- Sélectionner --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-do" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn-g">
                        <i class="bi bi-save"></i>Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>