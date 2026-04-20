@extends('layouts.admin')

@section('title', 'Modifier Catégorie')
@section('page-title', 'Édition du Catalogue')

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-8">
        <div class="tc p-0 overflow-hidden">
            <div class="p-4 d-flex justify-content-between align-items-center border-bottom" style="border-color: var(--border) !important; background: rgba(255,255,255,0.01);">
                <div class="d-flex align-items-center gap-3">
                    <div class="u-av" style="background: var(--gold-dim); color: var(--gold); border: 1px solid var(--gold);">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div>
                        <h2 class="h5 mb-0 text-white fw-bold">Paramètres de la catégorie</h2>
                        <p class="text-muted small mb-0">ID : #{{ str_pad($category->id, 3, '0', STR_PAD_LEFT) }} — <span class="text-gold">{{ $category->name }}</span></p>
                    </div>
                </div>
                <a href="{{ route('admin.categories') }}" class="btn btn-sm px-3" style="background: var(--dark3); border: 1px solid var(--border); color: var(--muted); border-radius: 8px;">
                    <i class="bi bi-arrow-left me-1"></i> Retour
                </a>
            </div>

  
            <form action="{{ route('admin.category.update', $category->id) }}" method="POST" class="p-4 p-md-5">
                @csrf
                @method('PUT')

                <div class="row g-4">
                
                    <div class="col-12">
                        <label class="form-label small text-gold fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">Nom de la catégorie</label>
                        <div class="input-group luxury-input-group">
                            <span class="input-group-text bg-transparent border-end-0" style="border-color: var(--border);">
                                <i class="bi bi-tag text-muted"></i>
                            </span>
                            <input type="text" name="name" 
                                   class="form-control bg-transparent text-white is-invalid @enderror" 
                                   style="border-color: var(--border); border-left: none;"
                                   value="{{  $category->name }}" required>
                        </div>
                    </div>

                   
                    <div class="col-12">
                        <label class="form-label small text-gold fw-bold text-uppercase mb-2" style="letter-spacing: 1px;">Description détaillée</label>
                        <textarea name="description" rows="5" 
                                  class="form-control bg-transparent text-white is-invalid @enderror" 
                                  style="border-color: var(--border); resize: none;"
                                  placeholder="Décrivez les services inclus dans cette catégorie...">{{ $category->description }}</textarea>
                    </div>

                   
                    <div class="col-12">
                        <div class="p-3 rounded-4" style="background: var(--dark3); border: 1px solid var(--border);">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-info-circle text-gold"></i>
                                    <span class="small text-muted">Impact sur le catalogue :</span>
                                </div>
                                <span class="badge" style="background: var(--gold-dim); color: var(--gold);">
                                    {{ $category->services->count() }} service(s) liés
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-5">
                        <div class="d-flex flex-column flex-md-row gap-3">
                            <button type="submit" class="btn px-5 py-2 fw-bold" style="background: var(--gold); color: var(--dark); border-radius: 10px;">
                                <i class="bi bi-check-lg me-2"></i> Mettre à jour la catégorie
                            </button>
                            <a href="{{ route('admin.categories') }}" class="btn px-4 py-2" style="background: transparent; border: 1px solid var(--border); color: var(--white); border-radius: 10px;">
                                Annuler
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection