@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Analyse des données')

@section('content')

    {{-- FLASH MESSAGES --}}
    @if(session('success'))
        <div class="alert-ok shadow-sm mb-4"><i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert-err shadow-sm mb-4">
            <div>
                @foreach($errors->all() as $e)
                    <p class="mb-0 small"><i class="bi bi-exclamation-circle me-2"></i>{{ $e }}</p>
                @endforeach
            </div>
        </div>
    @endif

    {{-- OVERVIEW STATS --}}
    <div class="row g-4 mb-4">
        <div class="col-md-4 col-xl">
            <div class="sc border-0 shadow-sm">
                <div class="accent" style="background:var(--gold)"></div>
                <div class="sc-ico g" style="color: var(--gold)"><i class="bi bi-people-fill"></i></div>
                <div class="sc-val text-white">{{ $totalClients ?? 0 }}</div>
                <div class="sc-lbl fw-bold" style="color: var(--gold); font-size: 0.75rem; text-transform: uppercase;">Clients</div>
            </div>
        </div>

        <div class="col-md-4 col-xl">
            <div class="sc border-0 shadow-sm">
                <div class="accent" style="background:var(--purple)"></div>
                <div class="sc-ico p" style="color: var(--purple)"><i class="bi bi-scissors"></i></div>
                <div class="sc-val text-white">{{ $totalBarbers ?? 0 }}</div>
                <div class="sc-lbl fw-bold" style="color: var(--purple); font-size: 0.75rem; text-transform: uppercase;">Coiffeurs</div>
            </div>
        </div>

        <div class="col-md-4 col-xl">
            <div class="sc border-0 shadow-sm">
                <div class="accent" style="background:var(--blue)"></div>
                <div class="sc-ico b" style="color: var(--blue)"><i class="bi bi-tag"></i></div>
                <div class="sc-val text-white">{{ $totalCategories ?? 0 }}</div>
                <div class="sc-lbl fw-bold" style="color: var(--blue); font-size: 0.75rem; text-transform: uppercase;">Catégories</div>
            </div>
        </div>

        <div class="col-md-4 col-xl">
            <div class="sc border-0 shadow-sm">
                <div class="accent" style="background:var(--green)"></div>
                <div class="sc-ico gr" style="color: var(--green)"><i class="bi bi-list-stars"></i></div>
                <div class="sc-val text-white">{{ $totalServices ?? 0 }}</div>
                <div class="sc-lbl fw-bold" style="color: var(--green); font-size: 0.75rem; text-transform: uppercase;">Services</div>
            </div>
        </div>

        <div class="col-md-4 col-xl">
            <div class="sc border-0 shadow-sm">
                <div class="accent" style="background:var(--orange)"></div>
                <div class="sc-ico o" style="color: var(--orange)"><i class="bi bi-calendar-check"></i></div>
                <div class="sc-val text-white">{{ $totalBookings ?? 0 }}</div>
                <div class="sc-lbl fw-bold" style="color: var(--orange); font-size: 0.75rem; text-transform: uppercase;">RDV</div>
            </div>
        </div>
    </div>

    {{-- SECTION : UTILISATEURS --}}
    <div class="admin-card border-0 shadow-lg mb-4">
        <div class="admin-card-header d-flex justify-content-between align-items-center p-4">
            <h6 class="font-playfair text-white mb-0 fs-5">
                <i class="bi bi-clock-history me-2 text-gold"></i>Dernières Inscriptions
            </h6>
            <a href="{{ route('admin.users') }}" class="btn-link-gold small fw-bold text-decoration-none text-gold">
                VOIR TOUT <i class="bi bi-chevron-right ms-1"></i>
            </a>
        </div>

        <div class="table-responsive px-2 pb-3">
            <table class="table-minimal w-100">
                <thead>
                    <tr>
                        <th class="ps-4  small "  style="color: var(--gold)">Utilisateur</th>
                        <th class=" small" style="color: var(--gold)">Rôle</th>
                        <th class="text-end pe-4  small" >Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($latestUsers as $u)
                        <tr class="align-middle">
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-sm shadow-sm"
                                        style="background: var(--dark3); border: 1px solid var(--border); color: var(--gold); font-weight: bold;">
                                        {{ strtoupper(substr($u->firstname, 0, 1)) }}
                                    </div>
                                    <div class="user-details">
                                        <span class="d-block text-white fw-bold mb-0">{{ $u->firstname }} {{ $u->lastname }}</span>
                                        <span class="" style="font-size: 0.75rem;">{{ $u->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge rounded-pill px-3 py-2"
                                    style="background: rgba(255,255,255,0.05); color: var(--gold); border: 1px solid rgba(201, 168, 76, 0.2); font-size: 0.7rem;">
                                    {{ $u->role->name }}
                                </span>
                            </td>
                            <td class="text-end pe-4 text-white-50 small">
                                <i class="bi bi-dot text-gold me-1"></i>{{ $u->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 opacity-50 small text-white">
                                <i class="bi bi-inbox fs-2 d-block mb-2"></i> Aucun utilisateur récent.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="admin-card border-0 shadow-lg mt-4">
        <div class="admin-card-header d-flex justify-content-between align-items-center p-4">
            <h6 class="font-playfair text-white mb-0 fs-5">
                <i class="bi bi-grid-3x3-gap me-2 text-gold"></i>Catalogue des Services
            </h6>
            <div class="badge rounded-pill px-3 py-2"
                style="background: var(--gold-dim); color: var(--gold); font-size: 0.75rem; border: 1px solid var(--border);">
                {{ count($services) }} Services Actifs
            </div>
        </div>

        <div class="table-responsive px-2 pb-3">
            <table class="tt w-100" id="servicesTable">
                <thead>
                    <tr>
                        <th class="ps-4  small">#</th>
                        <th class=" small">Nom du service</th>
                        <th class=" small">Description</th>
                        <th class=" small">Catégorie</th>
                        <th class=" small">Durée</th>
                        <th class="text-end pe-4  small">Prix</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $index => $service)
                        <tr class="align-middle" data-name="{{ strtolower($service->titre) }}">
                            <td class="ps-4" style="color:var(--muted); font-size:0.75rem; font-family: monospace;">
                                S{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="service-icon-box">
                                        <i class="bi bi-scissors text-gold"></i>
                                    </div>
                                    <span class="text-white fw-bold" style="font-size:0.86rem">{{ $service->titre }}</span>
                                </div>
                            </td>
                            <td>
                                <div class=" text-truncate" style="max-width: 250px; font-size:0.8rem">
                                    {{ $service->description }}
                                </div>
                            </td>
                            <td>
                                @if($service->category)
                                    <span class="pill pb small px-2 py-1">{{ $service->category->name }}</span>
                                @else
                                    <span class=" opacity-50 small">Non classé</span>
                                @endif
                            </td>
                            <td>
                                <span class="d-flex align-items-center gap-2 text-white-50 small">
                                    <i class="bi bi-clock "></i> {{ $service->duration }} min
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <span class="fw-bold text-gold px-3 py-2 rounded"
                                    style="background: rgba(201, 168, 76, 0.05); border: 1px solid rgba(201, 168, 76, 0.1);">
                                    {{ number_format($service->prix, 2) }} <small>MAD</small>
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="d-flex flex-column align-items-center gap-3">
                                    <i class="bi bi-inbox fs-1  opacity-25"></i>
                                    <span class=" small">Aucun service trouvé.</span>
                                    <button class="btn-g btn-sm" data-bs-toggle="modal" data-bs-target="#createModal">
                                        <i class="bi bi-plus me-1"></i>Ajouter un service
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

<style>
    .service-icon-box {
        width: 32px;
        height: 32px;
        background: var(--gold-dim);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(201, 168, 76, 0.2);
    }

    .table-minimal tbody tr,
    .tt tbody tr {
        transition: 0.2s ease-in-out;
        border-bottom: 1px solid rgba(255, 255, 255, 0.03);
    }

    .table-minimal tbody tr:hover,
    .tt tbody tr:hover {
        background: rgba(255, 255, 255, 0.02) !important;
    }

    .avatar-sm {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-size: 0.9rem;
    }
</style>