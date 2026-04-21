@extends('layouts.barber')

@section('title', 'Tableau de bord')
@section('page-title', 'Vue d\'ensemble')

@section('content')
    <div class="main" id="mn">
        @if($errors->any())
            <div class="alert-err shadow-sm mb-4">
                <div>
                    @foreach($errors->all() as $e)
                        <p class="mb-0 small"><i class="bi bi-exclamation-circle me-2"></i>{{ $e }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="topbar d-flex justify-content-between align-items-center p-4">
            <div>
                <div class="t-title"
                    style="font-family: 'Playfair Display', serif; font-size: 1.5rem; color: var(--white);">Mes Services
                </div>
                <div class="t-sub" style="color: var(--muted); font-size: 0.85rem;">Gérez votre catalogue de prestations
                </div>
            </div>
            <button class="btn-g d-flex align-items-center gap-2 px-3 py-2" data-bs-toggle="modal"
                data-bs-target="#createModal"
                style="background: var(--gold); color: var(--dark); border-radius: 8px; border: none; font-weight: 600;">
                <i class="bi bi-plus-circle"></i> Nouveau service
            </button>
        </div>

        <div class="content p-4">
            @if(session('success'))
                <div class="alert-success-custom mb-4 p-3 d-flex align-items-center gap-3"
                    style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2); color: #10b981; border-radius: 12px;">
                    <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                </div>
            @endif

            <div class="row g-3 mb-5">
                <div class="col-6 col-xl-3">
                    <div class="sc p-3"
                        style="background: var(--dark2); border: 1px solid var(--border); border-radius: 15px; position: relative; overflow: hidden;">
                        <div class="sc-bar"
                            style="position: absolute; top: 0; left: 0; height: 100%; width: 4px; background: var(--gold);">
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="sc-ico g"
                                style="width: 40px; height: 40px; background: var(--gold-dim); color: var(--gold); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-list-stars"></i>
                            </div>
                            <div>
                                <div class="sc-val h4 fw-bold mb-0 text-white">{{ $services->count() }}</div>
                                <div class="sc-lbl small text-uppercase text-muted"
                                    style="font-size: 0.7rem; letter-spacing: 0.5px;">Services</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="tc"
                        style="background: var(--dark2); border: 1px solid var(--border); border-radius: 20px; overflow: hidden;">
                        <div
                            class="th d-flex justify-content-between align-items-center p-4 border-bottom border-white border-opacity-5">
                            <h6 class="mb-0 fw-bold text-white"><i class="bi bi-collection me-2 text-gold"></i>Catalogue des
                                services</h6>
                            <div class="d-flex gap-2 align-items-center">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text bg-transparent border-secondary text-muted"><i
                                            class="bi bi-search"></i></span>
                                    <input type="text" id="searchInput"
                                        class="form-control bg-transparent border-secondary text-white"
                                        placeholder="Filtrer..." style="width:180px" oninput="filterTable()" />
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="tt table table-borderless align-middle mb-0" id="servicesTable">
                                <thead>
                                    <tr
                                        style="background: rgba(255,255,255,0.02); color: var(--gold); font-size: 0.75rem; text-transform: uppercase;">
                                        <th class="ps-4">Réf</th>
                                        <th>Nom du Service</th>
                                        <th>Catégorie</th>
                                        <th>Durée</th>
                                        <th>Prix</th>
                                        <th>Statut</th>
                                        <th class="text-end pe-4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody style="border-top: 1px solid var(--border);">
                                    @forelse($services as $index => $service)
                                        <tr class="border-bottom border-white border-opacity-5"
                                            data-name="{{ strtolower($service->titre) }}">
                                            <td class="ps-4 small text-muted">S{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                            </td>
                                            <td>
                                                <div class="fw-bold text-white">{{ $service->titre }}</div>
                                                <div class="small text-muted text-truncate" style="max-width: 200px;">
                                                    {{ $service->description }}
                                                </div>
                                            </td>
                                            <td><span class="badge"
                                                    style="background: rgba(59, 130, 246, 0.1); color: var(--blue); border: 1px solid rgba(59, 130, 246, 0.2);">{{ $service->category->name ?? '—' }}</span>
                                            </td>
                                            <td class="text-white-50"><i
                                                    class="bi bi-clock me-1 text-gold"></i>{{ $service->duration }} min</td>
                                            <td class="fw-bold text-gold">{{ number_format($service->prix, 2) }} MAD</td>
                                            <td>
                                                <span
                                                    class="badge rounded-pill {{ $service->active ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}"
                                                    style="font-size: 0.65rem;">
                                                    {{ $service->active ? '● Actif' : '○ Inactif' }}
                                                </span>
                                            </td>
                                            <td class="text-end pe-4">
                                                <div class="d-flex justify-content-end gap-2">
                                                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm"
                                                        style="background: var(--dark3); border: 1px solid var(--border); color: var(--white);"><i
                                                            class="bi bi-pencil"></i></a>
                                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                                        onsubmit="return confirm('Supprimer ?')">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="btn btn-sm"
                                                            style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); color: #ef4444;"><i
                                                                class="bi bi-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-5">
                                                <div
                                                    class="d-flex flex-column align-items-center justify-content-center text-muted">
                                                    <i class="bi bi-scissors" style="font-size: 2rem; opacity: 0.3;"></i>
                                                    <div class="mt-3 fw-bold text-white">Aucun service trouvé</div>
                                                    <div class="small">Commencez par ajouter un nouveau service</div>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL CREATE (UI FIXES) --}}
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ route('create.service') }}" enctype="multipart/form-data" class="modal-content"
                style="background: var(--dark2); border: 1px solid var(--gold); border-radius: 20px;">
                @csrf
                <div class="modal-header border-bottom border-white border-opacity-5 p-4">
                    <h5 class="modal-title text-white" style="font-family: 'Playfair Display', serif;">
                        <i class="bi bi-camera me-2 text-gold"></i>Nouveau Service
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label text-gold small fw-bold">NOM DU SERVICE</label>
                            <input type="text" name="titre" class="form-control bg-dark border-secondary text-white"
                                placeholder="Ex: Coupe dégradée" required />
                        </div>

                        <div class="col-12">
                            <label class="form-label text-gold small fw-bold">PHOTO DU SERVICE</label>
                            <div class="input-group">
                                <input type="file" name="image_url" class="form-control bg-dark border-secondary text-white"
                                    id="inputGroupFile02" accept="image/*">
                                <label class="input-group-text bg-secondary border-secondary text-white"
                                    for="inputGroupFile02"><i class="bi bi-upload"></i></label>
                            </div>
                            <div class="form-text  small">Format suggéré: JPG ou PNG (Max 2Mo).</div>
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label text-gold small fw-bold">DURÉE (MIN)</label>
                            <input type="number" name="duration" class="form-control bg-dark border-secondary text-white"
                                value="30" required />
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label text-gold small fw-bold">PRIX (MAD)</label>
                            <input type="number" name="prix" class="form-control bg-dark border-secondary text-white"
                                value="50" required />
                        </div>

                        <div class="col-12">
                            <label class="form-label text-gold small fw-bold">CATÉGORIE</label>
                            <select class="form-select bg-dark border-secondary text-white" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label text-gold small fw-bold">DESCRIPTION</label>
                            <textarea class="form-control bg-dark border-secondary text-white" name="description"
                                rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4">
                    <button type="button" class="btn btn-link text-muted text-decoration-none"
                        data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn px-4"
                        style="background: var(--gold); color: var(--dark); font-weight: bold; border-radius: 8px;">
                        <i class="bi bi-check-lg me-1"></i> Créer le service
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection