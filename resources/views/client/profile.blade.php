@extends('layouts.client')

@section('title', 'Mon Profil')
@section('page_title', 'Paramètres du compte')

@section('content')
    <div class="container-fluid p-0">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
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

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card-luxe text-center py-5">
                    <div class="position-relative d-inline-block mb-4">
    {{-- Conteneur principal de l'avatar --}}
    <div class="profile-avatar-container shadow" 
         style="width: 120px; height: 120px; background: var(--gold-dim); border: 2px solid var(--gold); border-radius: 30px; overflow: hidden; display: grid; place-items: center;">
        
        @if(Auth::user()->photo)
            {{-- Affichage de la photo si elle existe --}}
            <img src="{{ asset('storage/' . Auth::user()->photo) }}" 
                 alt="Photo de {{ Auth::user()->ferstname }}"
                 class="w-100 h-100 object-fit-cover">
        @else
            {{-- Affichage de l'initiale si pas de photo --}}
            <span style="color: var(--gold); font-size: 3rem; font-weight: 900; font-family: 'Playfair Display', serif; text-transform: uppercase; line-height: 1;">
                {{ substr(Auth::user()->ferstname, 0, 1) }}
            </span>
        @endif
    </div>

    {{-- Optionnel : Bouton d'édition --}}
    {{-- 
    <button class="btn btn-sm btn-gold position-absolute bottom-0 end-0 rounded-circle p-2 shadow-sm" style="width: 35px; height: 35px; transform: translate(10px, 10px);">
        <i class="bi bi-camera-fill"></i>
    </button>
    --}}
</div>
                    <h4 class="font-playfair text-white mb-1">{{ Auth::user()->ferstname }} {{ Auth::user()->lastname }}
                    </h4>
                    <p class="text-muted small mb-4">Membre depuis {{ Auth::user()->created_at->format('M Y') }}</p>

                    <div class="d-flex justify-content-center gap-2 mb-4">
                        <span class="status-badge st-confirm">Client Gold</span>
                        <span class="status-badge st-upcoming">12 Séances</span>
                    </div>

                    <hr class="border-white border-opacity-10 my-4">

                    <div class="text-start">
                        <label class="text-muted small text-uppercase fw-bold mb-2">Contact</label>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <i class="bi bi-envelope text-gold"></i>
                            <span class="small">{{ Auth::user()->email }}</span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <i class="bi bi-telephone text-gold"></i>
                            <span class="small">{{ Auth::user()->telephone ?? '+212 6XX XX XX XX' }}</span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-8">
                <div class="card-luxe">
                    <h5 class="font-playfair text-white mb-4"><i class="bi bi-person-gear me-2 text-gold"></i>Modifier mes
                        informations</h5>

                    <form action="{{ route('barber.profile.update', ) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small text-gold fw-bold">Prénom</label>
                                <input type="text" name="ferstname"
                                    class="form-control bg-dark border-secondary text-white py-2"
                                    value="{{ Auth::user()->ferstname }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-gold fw-bold">Nom</label>
                                <input type="text" name="lastname"
                                    class="form-control bg-dark border-secondary text-white py-2"
                                    value="{{ Auth::user()->lastname }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label small text-gold fw-bold">Adresse Email</label>
                                <input type="email" name="email"
                                    class="form-control bg-dark border-secondary text-white py-2"
                                    value="{{ Auth::user()->email }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label small text-gold fw-bold">Numéro de téléphone</label>
                                <input type="text" name="telephone"
                                    class="form-control bg-dark border-secondary text-white py-2"
                                    value="{{ Auth::user()->telephone }}">
                            </div>

                            <div class="col-12 mt-5">
                                <h6 class="font-playfair text-white mb-3 border-bottom border-white border-opacity-10 pb-2">
                                    Changer le mot de passe</h6>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small text-gold fw-bold">Nouveau mot de passe</label>
                                <input type="password" name="password"
                                    class="form-control bg-dark border-secondary text-white py-2" placeholder="••••••••">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-gold fw-bold">Confirmer</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control bg-dark border-secondary text-white py-2" placeholder="••••••••">
                            </div>

                            <div class="col-12 text-end mt-4">
                                <button type="submit" class="btn btn-gold px-5 py-2">
                                    Mettre à jour mon profil
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-luxe mt-4 border-danger border-opacity-25">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-danger mb-1">Zone de danger</h6>
                            <p class="text-muted small m-0">La suppression de votre compte est irréversible.</p>

                        </div>
                        <form method="POST" action="{{ route('client.account.destroy') }}">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-outline-danger btn-sm px-4"
                                onclick="return confirm('Are you sure?')">Delete Account</button>

                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4">
            @forelse($bookings as $index => $booking)
                <div class="col-md-6 col-xl-4">
                    <div class="card-luxe h-100 p-0 overflow-hidden"
                        style="border: 1px solid var(--dark-border); background: var(--dark-card); border-radius: 20px; transition: transform 0.3s ease;">

                        {{-- En-tête de la carte : ID et Date --}}
                        <div class="p-3 d-flex justify-content-between align-items-center border-bottom border-white border-opacity-5"
                            style="background: rgba(255,255,255,0.02);">
                            <span class="small fw-bold text-gold" style="font-family: monospace;">
                                #{{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}
                            </span>
                            <span class="small text-muted">
                                <i class="bi bi-calendar-event me-1"></i> {{ $booking->created_at->format('d M, Y') }}
                            </span>
                        </div>

                        <div class="p-4">
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div
                                    style="width: 45px; height: 45px; background: var(--gold-dim); border: 1px solid var(--gold); border-radius: 12px; display: grid; place-items: center; color: var(--gold); font-weight: 800; font-size: 1.1rem;">
                                    {{ strtoupper(substr($booking->user->firstname ?? 'C', 0, 1)) }}
                                </div>
                                <div>
                                    <div class="fw-bold text-white">{{ $booking->user->firstname ?? 'Client' }}
                                        {{ $booking->user->lastname ?? '' }}
                                    </div>
                                    <div class="text-muted small">Client régulier</div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="small text-muted text-uppercase fw-bold mb-2"
                                    style="font-size: 0.65rem; letter-spacing: 1px;">Prestation</label>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="text-white fw-medium">{{ $booking->service->titre ?? 'N/A' }}</span>
                                    <span class="text-gold fw-bold">{{ $booking->service->prix ?? '--' }} MAD</span>
                                </div>
                            </div>

                            <div class="row g-2 mb-4">
                                <div class="col-6">
                                    <div class="p-2 rounded-3 text-center"
                                        style="background: rgba(255,255,255,0.03); border: 1px solid var(--dark-border);">
                                        <i class="bi bi-clock text-gold d-block mb-1"></i>
                                        <span class="small text-white">{{ $booking->timeSlot->start_time ?? '--:--' }}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2 rounded-3 text-center"
                                        style="background: rgba(255,255,255,0.03); border: 1px solid var(--dark-border);">
                                        <i class="bi bi-hourglass-split text-gold d-block mb-1"></i>
                                        <span class="small text-white">{{ $booking->service->duration ?? '30' }} min</span>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="d-flex align-items-center justify-content-between pt-3 border-top border-white border-opacity-5">
                                @if($booking->status == 'confirmed')
                                    <span class="status-badge st-done">Confirmé</span>
                                @elseif($booking->status == 'pending')
                                    <span class="status-badge st-upcoming">En attente</span>
                                @else
                                    <span class="status-badge st-cancel">Annulé</span>
                                @endif

                                <a href="#" class="btn-action" title="Voir détails">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-inbox fs-1 opacity-25 text-gold mb-3 d-block"></i>
                    <h5 class="text-white">Aucun historique</h5>
                    <p class="text-muted">Les réservations terminées apparaîtront ici.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection