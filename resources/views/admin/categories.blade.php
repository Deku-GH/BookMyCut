@extends('layouts.admin')

@section('title', 'Catalogue')
@section('page-title', 'Gestion des Catégories')

@section('content')
<div class="container-fluid px-0">
    <div class="row g-4">
        {{-- COLONNE TABLEAU --}}
        <div class="col-lg-8">
            <div class="tc border-0 shadow-lg">
                
                {{-- Header Aéré & Luxueux --}}
                <div class="th d-flex justify-content-between align-items-center p-4 border-bottom border-white border-opacity-10">
                    <div>
                        <h5 class="mb-1 text-white" style="font-family:'Playfair Display', serif; letter-spacing: 0.5px;">
                            <i class="bi bi-collection me-2 text-gold"></i>Catalogue
                        </h5>
                        <p class="text-muted small mb-0">Structurez vos services et offres</p>
                    </div>
                    <button class="btn-g px-4 py-2" data-bs-toggle="modal" data-bs-target="#createCatModal">
                        <i class="bi bi-plus-lg me-2"></i>Nouvelle Catégorie
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="tt mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4 py-3 text-uppercase small tracking-wider text-muted">#</th>
                                <th class="py-3 text-uppercase small tracking-wider text-muted">Détails</th>
                                <th class="py-3 text-uppercase small tracking-wider text-muted text-center">Services</th>
                                <th class="py-3 text-uppercase small tracking-wider text-muted text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $i => $cat)
                            <tr class="align-middle border-bottom border-white border-opacity-5">
                                <td class="ps-4 text-muted small fw-bold" style="font-family: monospace; width: 60px;">
                                    {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="py-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="icon-box-gold shadow-sm">
                                            <i class="bi bi-tag"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-white mb-1">{{ $cat->name }}</div>
                                            <div class="text-muted small text-truncate" style="max-width: 280px; font-weight: 300;">
                                                {{ $cat->description ?? 'Aucune description fournie' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="pill-gold px-3 py-1">
                                        {{ $cat->services_count ?? $cat->services->count() }} <small>items</small>
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('category.edit', $cat->id) }}" class="btn-action edit" title="Modifier">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.category.destroy', $cat->id) }}" method="POST">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="btn-action delete" title="Supprimer" onclick="return confirm('Confirmer la suppression ?')">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <div class="opacity-25 mb-3"><i class="bi bi-inbox fs-1"></i></div>
                                    <span class="text-muted">Aucune donnée disponible dans le catalogue.</span>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- COLONNE STATS --}}
        <div class="col-lg-4">
            <div class="d-flex flex-column gap-4">
                {{-- Card Total --}}
                <div class="sc p-4 border-0 shadow-lg position-relative overflow-hidden">
                    <div class="accent-line"></div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-muted text-uppercase small tracking-wider fw-bold">Total Catégories</div>
                        <i class="bi bi-layers text-gold opacity-50 fs-4"></i>
                    </div>
                    <div class="d-flex align-items-baseline gap-2">
                        <div class="sc-val fs-1">{{ $categories->count() }}</div>
                        <div class="text-success small"><i class="bi bi-arrow-up-short"></i> Actives</div>
                    </div>
                </div>
                
                {{-- Card Popularité --}}
                <div class="tc p-4 border-0 shadow-lg">
                    <h6 class="mb-4 text-white" style="font-family:'Playfair Display', serif;">
                        <i class="bi bi-graph-up-arrow me-2 text-gold"></i>Popularité
                    </h6>
                    @php $maxSvc = $categories->max(fn($c) => $c->services_count ?? $c->services->count()) ?: 1; @endphp
                    @foreach($categories as $cat)
                        @php 
                            $count = $cat->services_count ?? $cat->services->count();
                            $percent = ($count / $maxSvc) * 100;
                        @endphp
                        <div class="mb-4">
                            <div class="d-flex justify-content-between small mb-2">
                                <span class="text-white-50">{{ $cat->name }}</span>
                                <span class="text-gold fw-bold">{{ $count }}</span>
                            </div>
                            <div class="prog" style="height: 4px; background: rgba(255,255,255,0.05); border-radius: 10px;">
                                <div class="prog-f shadow-gold" style="width: {{ $percent }}%; height: 100%; background: var(--gold); border-radius: 10px;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ── MODAL DE CRÉATION ── --}}
<div class="modal fade" id="createCatModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" action="{{ route('category.store') }}" class="modal-content border-0 shadow-2xl" style="background: #1a1a1a; border-radius: 20px;">
            @csrf
            <div class="modal-header border-bottom border-white border-opacity-5 p-4">
                <h5 class="modal-title text-white" style="font-family:'Playfair Display', serif;">
                    <i class="bi bi-plus-circle me-2 text-gold"></i>Nouvelle Catégorie
                </h5>
                <button type="button" class="btn-close btn-close-white opacity-50" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-4">
                    <label class="form-label small text-muted text-uppercase tracking-wider fw-bold mb-2">Nom de la catégorie</label>
                    <input type="text" name="name" class="form-control luxury-input" placeholder="ex: Barbe, Coupe Signature..." required>
                </div>
                <div class="mb-2">
                    <label class="form-label small text-muted text-uppercase tracking-wider fw-bold mb-2">Description</label>
                    <textarea name="description" class="form-control luxury-input" rows="4" placeholder="Détails optionnels..."></textarea>
                </div>
            </div>
            <div class="modal-footer border-0 p-4 pt-0">
                <button type="button" class="btn btn-link text-muted text-decoration-none me-auto" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn-g px-5 py-2 rounded-pill shadow-gold">Créer maintenant</button>
            </div>
        </form>
    </div>
</div>
@endsection