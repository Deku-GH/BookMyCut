@extends('layouts.admin')

@section('title', 'Modifier Catégorie')

@section('content')
<div class="luxury-container">
    <div class="luxury-card">
        {{-- Header --}}
        <div class="luxury-header">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-circle-gold">
                    <i class="bi bi-pencil-square"></i>
                </div>
                <div>
                    <h1 class="h5 mb-0 text-white font-playfair">Édition du Catalogue</h1>
                    <p class="text-muted tiny mb-0">Modification de : <span class="text-gold">{{ $category->name }}</span></p>
                </div>
            </div>
            <a href="{{ route('admin.categories') }}" class="btn-back">
                <i class="bi bi-arrow-left"></i> Retour
            </a>
        </div>

        {{-- Formulaire --}}
        <form action="{{ route('admin.category.update', $category->id) }}" method="POST" class="luxury-body">
            @csrf
            @method('PUT')

            <div class="row g-4">
                {{-- Nom --}}
                <div class="col-12">
                    <label class="luxury-label">Nom de la catégorie</label>
                    <div class="input-wrapper">
                        <i class="bi bi-tag"></i>
                        <input type="text" name="name" class="@error('name') is-invalid @enderror" 
                               value="{{ old('name', $category->name) }}" required>
                    </div>
                    @error('name') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                {{-- Description --}}
                <div class="col-12">
                    <label class="luxury-label">Description détaillée</label>
                    <textarea name="description" rows="5" class="@error('description') is-invalid @enderror"
                              placeholder="Décrivez les services...">{{ old('description', $category->description) }}</textarea>
                    @error('description') <span class="error-text">{{ $message }}</span> @enderror
                </div>

                {{-- Info Box --}}
                <div class="col-12">
                    <div class="luxury-info-box">
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="small">
                                <i class="bi bi-info-circle me-1 text-gold"></i> 
                                <strong>{{ $category->services->count() }}</strong> services actifs dans cette catégorie.
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="col-12 mt-4">
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn-gold-luxury">
                            Enregistrer les modifications
                        </button>
                        <a href="{{ route('admin.categories') }}" class="btn-outline-luxury">
                            Annuler
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection