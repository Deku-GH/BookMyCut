@extends('layouts.admin')

@section('title', 'Mon Profil')
@section('page-title', 'Paramètres du compte')

@section('content')
<div class="container-fluid p-0">
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4" style="background: rgba(16, 185, 129, 0.1); color: var(--green); border-radius: 12px;">
            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="tc text-center py-5">
                <div class="position-relative d-inline-block mb-4">
                    <div class="profile-avatar-container shadow mx-auto"
                        style="width: 120px; height: 120px; background: var(--gold-dim); border: 2px solid var(--gold); border-radius: 30px; overflow: hidden; display: grid; place-items: center;">
                        
                        @if(Auth::user()->photo)
                            <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                                alt="Photo" class="w-100 h-100 object-fit-cover">
                        @else
                            <span style="color: var(--gold); font-size: 3rem; font-weight: 900; font-family: 'Playfair Display', serif; text-transform: uppercase;">
                                {{ substr(Auth::user()->ferstname, 0, 1) }}
                            </span>
                        @endif
                    </div>
                </div>

                <h4 class="font-playfair text-white mb-1">{{ Auth::user()->ferstname }} {{ Auth::user()->lastname }}</h4>
                <p class="small  mb-4">Membre depuis {{ Auth::user()->created_at->format('M Y') }}</p>

                <div class="d-flex justify-content-center gap-2 mb-4">
                    <span class="badge py-2 px-3" style="background: var(--gold-dim); color: var(--gold); border: 1px solid var(--border); border-radius: 8px;">
                        <i class="bi bi-star-fill me-1"></i> Administrateur
                    </span>
                </div>

                <hr class="mx-4 my-4" style="border-color: var(--border) !important; opacity: 0.5;">

                <div class="text-start px-4">
                    <label class="text-gold small text-uppercase fw-bold mb-3 d-block" style="letter-spacing: 1px;">Coordonnées</label>
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="btn-col m-0 shadow-sm" style="width: 35px; height: 35px; background: var(--dark-card); border: 1px solid var(--border);"><i class="bi bi-envelope small"></i></div>
                        <span class="small text-white-50">{{ Auth::user()->email }}</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="btn-col m-0 shadow-sm" style="width: 35px; height: 35px; background: var(--dark-card); border: 1px solid var(--border);"><i class="bi bi-telephone small"></i></div>
                        <span class="small text-white-50">{{ Auth::user()->telephone }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="tc p-4 p-md-5">
                <h5 class="font-playfair text-white mb-4 d-flex align-items-center gap-2">
                    <i class="bi bi-person-lines-fill text-gold"></i> Informations personnelles
                </h5>

                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label small text-gold text-uppercase fw-bold">Prénom</label>
                            <input type="text" name="ferstname" 
                                   class="form-control luxury-input  is-invalid" 
                                   value="{{  Auth::user()->ferstname }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small text-gold text-uppercase fw-bold">Nom</label>
                            <input type="text" name="lastname" 
                                   class="form-control luxury-input is-invalid" 
                                   value="{{  Auth::user()->lastname }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label small text-gold text-uppercase fw-bold">Adresse Email</label>
                            <input type="email" name="email" 
                                   class="form-control luxury-input is-invalid" 
                                   value="{{  Auth::user()->email }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label small text-gold text-uppercase fw-bold">Numéro de téléphone</label>
                            <input type="text" name="telephone" 
                                   class="form-control luxury-input  is-invalid" 
                                   value="{{  Auth::user()->telephone }}" placeholder="+212 ...">
                        </div>

                        <div class="col-12 mt-5">
                            <h6 class="font-playfair text-white mb-3 d-flex align-items-center gap-2">
                                <i class="bi bi-shield-lock text-gold"></i> Sécurité du compte
                            </h6>
                            <div class="p-3 rounded-4 mb-4" style="background: rgba(255, 255, 255, 0.02); border: 1px dashed var(--border);">
                                <p class="small m-0 ">Laissez vide si vous ne souhaitez pas changer de mot de passe.</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small text-gold text-uppercase fw-bold">Nouveau mot de passe</label>
                            <input type="password" name="password" class="form-control luxury-input" placeholder="••••••••">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small text-gold text-uppercase fw-bold">Confirmer</label>
                            <input type="password" name="password_confirmation" class="form-control luxury-input" placeholder="••••••••">
                        </div>

                        <div class="col-12 text-end mt-5">
                            <button type="submit" class="btn-gold-action fw-bold px-5 py-3" style="border-radius: 12px; transition: 0.3s;">
                                Enregistrer les modifications
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection