@extends('layouts.barber')

@section('title', 'Modifier le Service')
@section('page-title', 'Édition du Service')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-4">
                <a href="{{ route('create.services') }}" class="text-decoration-none small 
                 hover-gold">
                    <i class="bi bi-arrow-left me-1"></i> Retour à la liste des services
                </a>
            </div>

            <div class="tc p-4 p-md-5">
                <div class="d-flex align-items-center gap-3 mb-5">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" 
                         style="width: 60px; height: 60px; background: var(--gold-dim); border: 1px solid var(--gold);">
                        <i class="bi bi-pencil-square text-gold fs-3"></i>
                    </div>
                    <div>
                        <h2 class="h3 mb-1" style="font-family: 'Playfair Display', serif;">Modifier le service</h2>
                        <p class="
                         mb-0 small">Mettez à jour les détails de votre prestation premium</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('services.update', $service->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        <div class="col-12">
                            <label class="form-label text-gold small fw-bold mb-2">NOM DU SERVICE</label>
                            <input type="text" name="titre" 
                                   class="form-control form-control-lg bg-dark border-secondary text-white shadow-none @error('titre') is-invalid @enderror" 
                                   placeholder="ex: Coupe Signature & Barbe"
                                   value="{{ old('titre', $service->titre) }}" required>
                            @error('titre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-gold small fw-bold mb-2">DURÉE (MINUTES)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark3 border-secondary 
                                "  style="background: var(--gold)"><i class="bi bi-clock"></i></span>
                                <input type="number" name="duration" 
                                       class="form-control form-control-lg bg-dark border-secondary text-white shadow-none" 
                                       value="{{ old('duration', $service->duration) }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-gold small fw-bold mb-2">PRIX (MAD)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark3 border-secondary "  style="background: var(--gold)"><i class="bi bi-currency-exchange"></i></span>
                                <input type="number" name="prix"
                                       class="form-control form-control-lg bg-dark border-secondary text-white shadow-none" 
                                       value="{{ old('prix', $service->prix) }}" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label text-gold small fw-bold mb-2">CATÉGORIE</label>
                            <select class="form-select form-select-lg bg-dark border-secondary text-white shadow-none" name="category_id" required>
                                <option value="" disabled>Choisir une catégorie...</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $service->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label text-gold small fw-bold mb-2">DESCRIPTION</label>
                            <textarea name="description" 
                                      class="form-control bg-dark border-secondary text-white shadow-none" 
                                      rows="4" placeholder="Décrivez les détails de la prestation...">{{ old('description', $service->description) }}</textarea>
                        </div>

                        <div class="col-12 mt-5">
                            <div class="d-flex gap-3">
                                <button type="submit" class="btn btn-lg flex-grow-1" 
                                        style="background: var(--gold); color: var(--dark); font-weight: 700; border-radius: 12px; transition: 0.3s;">
                                    <i class="bi bi-check2-circle me-2"></i> Enregistrer les modifications
                                </button>
                                <a href="{{ route('create.services') }}" class="btn btn-lg btn-outline-secondary border-secondary px-4" 
                                   style="border-radius: 12px; color: var(--muted);">
                                    Annuler
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-gold:hover { color: var(--gold) !important; }
    
    /* Input Styling to match the dark theme */
    .form-control, .form-select {
        border-radius: 10px;
        border: 1px solid rgba(255,255,255,0.1) !important;
        transition: 0.3s;
    }
    
    .form-control:focus, .form-select:focus {
        background-color: var(--dark3) !important;
        border-color: var(--gold) !important;
        box-shadow: 0 0 0 0.25rem rgba(201, 168, 76, 0.1) !important;
    }

    .input-group-text {
        border: 1px solid rgba(255,255,255,0.1) !important;
        border-right: none !important;
    }
</style>
@endsection