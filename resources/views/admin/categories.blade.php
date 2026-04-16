@extends('layouts.admin')

@section('title', 'Catalogue')
@section('page-title', 'Gestion des Catégories')

@section('content')
<div class="container-fluid px-0">
    {{-- ALERTES --}}
    @if(session('success'))
        <div class="alert-ok mb-4 shadow-sm" style="background: rgba(25, 135, 84, 0.1); border: 1px solid rgba(25, 135, 84, 0.2); color: #2ecc71; padding: 15px; border-radius: 12px;">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        {{-- COLONNE TABLEAU --}}
        <div class="col-lg-8">
            <div class="tc border-0 shadow-lg overflow-hidden" style="background: #1a1a1a; border-radius: 15px; border: 1px solid rgba(255,255,255,0.05) !important;">
                
                {{-- Header --}}
                <div class="th d-flex justify-content-between align-items-center p-4 border-bottom border-white border-opacity-5" style="background: rgba(255,255,255,0.02);">
                    <div>
                        <h5 class="mb-1 text-white" style="font-family:'Playfair Display', serif; letter-spacing: 0.5px;">
                            <i class="bi bi-collection me-2" style="color: var(--gold);"></i>Catalogue
                        </h5>
                        <p style="color: rgba(255,255,255,0.5); font-size: 0.85rem; mb-0">Gérez vos catégories de services</p>
                    </div>
                    
                                <button class="btn-g px-4 py-2" 
                        data-bs-toggle="modal" 
                        data-bs-target="#createCatModal" id="btn-new-category">
                    <i class="bi bi-plus-lg me-2"></i>
                    Nouvelle Catégorie
                </button>
                </div>

                <div class="table-responsive">
                    <table class="tt mb-0 w-100">
                        <thead>
                            <tr style="background: rgba(0,0,0,0.2);">
                                <th class="ps-4 py-3 small text-uppercase" style="color: var(--gold); letter-spacing: 1px;">#</th>
                                <th class="py-3 small text-uppercase" style="color: var(--gold); letter-spacing: 1px;">Détails</th>
                                <th class="py-3 small text-uppercase text-center" style="color: var(--gold); letter-spacing: 1px;">Services</th>
                                <th class="py-3 small text-uppercase text-end pe-4" style="color: var(--gold); letter-spacing: 1px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $cat)
                            <tr class="align-middle" style="border-bottom: 1px solid rgba(255,255,255,0.03);">
                                <td class="ps-4" style="font-family: monospace; width: 60px; color: rgba(255,255,255,0.3);">
                                    {{ str_pad($cat->id, 2, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="py-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="icon-box-gold shadow-sm" style="background: rgba(201, 168, 76, 0.1); border: 1px solid rgba(201, 168, 76, 0.2); color: var(--gold); padding: 10px; border-radius: 10px;">
                                            <i class="bi bi-tag-fill"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-white mb-0" style="font-size: 0.95rem;">{{ $cat->name }}</div>
                                            <div class="small text-truncate" style="max-width: 250px; color: rgba(255,255,255,0.4);">
                                                {{ $cat->description ?? 'Aucune description' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="badge rounded-pill px-3 py-2" style="background: rgba(201, 168, 76, 0.05); color: var(--gold); border: 1px solid rgba(201, 168, 76, 0.15); font-size: 0.75rem;">
                                        {{ $cat->services_count ?? $cat->services->count() }} Items
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.category.edit', $cat->id) }}" class="btn btn-sm" style="background: rgba(255,255,255,0.03); color: var(--gold); border: 1px solid rgba(255,255,255,0.05);">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.category.destroy', $cat->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm" style="background: rgba(220, 53, 69, 0.05); color: #e74c3c; border: 1px solid rgba(220, 53, 69, 0.1);" onclick="return confirm('Supprimer cette catégorie ?')">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <i class="bi bi-inbox fs-1 d-block mb-3" style="color: rgba(255,255,255,0.1);"></i>
                                    <span style="color: rgba(255,255,255,0.3);">Votre catalogue est vide</span>
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
                <div class="sc p-4 border-0 shadow-lg position-relative overflow-hidden" style="background: #1a1a1a; border-radius: 15px; border: 1px solid rgba(255,255,255,0.05) !important;">
                    <div style="position:absolute; top:0; left:0; width:4px; height:100%; background:var(--gold)"></div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-uppercase small fw-bold" style="color: rgba(255,255,255,0.4); letter-spacing: 1px;">Total Catégories</div>
                        <i class="bi bi-layers fs-4" style="color: var(--gold); opacity: 0.5;"></i>
                    </div>
                    <div class="d-flex align-items-baseline gap-2">
                        <div class="fs-1 text-white fw-bold">{{ $categories->count() }}</div>
                        <div class="small fw-bold" style="color: #2ecc71;"><i class="bi bi-shield-check"></i> En ligne</div>
                    </div>
                </div>
                
                <div class="tc p-4 border-0 shadow-lg" style="background: #1a1a1a; border-radius: 15px; border: 1px solid rgba(255,255,255,0.05) !important;">
                    <h6 class="mb-4 text-white" style="font-family:'Playfair Display', serif;">
                        <i class="bi bi-bar-chart-line me-2" style="color: var(--gold);"></i>Densité du Catalogue
                    </h6>
                    @php $maxSvc = $categories->max(fn($c) => $c->services_count ?? $c->services->count()) ?: 1; @endphp
                    @foreach($categories as $cat)
                        @php 
                            $count = $cat->services_count ?? $cat->services->count();
                            $percent = ($count / $maxSvc) * 100;
                        @endphp
                        <div class="mb-4">
                            <div class="d-flex justify-content-between small mb-2">
                                <span style="color: rgba(255,255,255,0.6);">{{ $cat->name }}</span>
                                <span style="color: var(--gold); font-weight: bold;">{{ $count }}</span>
                            </div>
                            <div class="prog" style="height: 6px; background: rgba(255,255,255,0.05); border-radius: 10px;">
                                <div class="prog-f" style="width: {{ $percent }}%; height: 100%; background: var(--gold); border-radius: 10px; box-shadow: 0 0 10px rgba(201, 168, 76, 0.4);"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MODAL --}}
<div class="modal fade" id="createCatModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" action="{{ route('admin.category.store') }}" class="modal-content border-0 shadow-2xl" style="background: #121212; border-radius: 20px; border: 1px solid rgba(201, 168, 76, 0.1) !important;">
            @csrf
            <div class="modal-header border-bottom border-white border-opacity-5 p-4">
                <h5 class="modal-title text-white" style="font-family:'Playfair Display', serif;">
                    <i class="bi bi-plus-circle me-2" style="color: var(--gold);"></i>Nouvelle Catégorie
                </h5>
                <button type="button" class="btn-close btn-close-white opacity-50 shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-4">
                    <label class="form-label small text-uppercase fw-bold mb-2" style="color: var(--gold); letter-spacing: 1px;">Nom de la catégorie</label>
                    <input type="text" name="name" class="form-control luxury-input text-white" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 10px; padding: 12px;" placeholder="ex: Coupe Signature..." required>
                </div>
                <div class="mb-2">
                    <label class="form-label small text-uppercase fw-bold mb-2" style="color: var(--gold); letter-spacing: 1px;">Description</label>
                    <textarea name="description" class="form-control luxury-input text-white" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 10px; padding: 12px;" rows="4" placeholder="Décrivez cette catégorie..."></textarea>
                </div>
            </div>
            <div class="modal-footer border-0 p-4 pt-0">
                <button type="button" class="btn btn-link text-decoration-none me-auto" data-bs-dismiss="modal" style="color: rgba(255,255,255,0.4);">Annuler</button>
                <button type="submit" class="btn-g px-5 py-2 rounded-pill shadow-gold" style="font-weight: bold; letter-spacing: 0.5px;">Confirmer</button>
            </div>
        </form>
    </div>
</div>
@endsection