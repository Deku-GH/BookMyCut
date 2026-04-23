@extends('layouts.barber')

@section('title', 'Mon Profil')
@section('page_title', 'Paramètres du compte')

@section('content')
<div class="container-fluid p-0">
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4" style="background: rgba(25, 135, 84, 0.1); color: #75b798; border-radius: 12px;">
            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger border-0 shadow-sm mb-4" style="background: rgba(220, 53, 69, 0.1); color: #ea868f; border-radius: 12px;">
            @foreach($errors->all() as $e)
                <p class="mb-0 small"><i class="bi bi-exclamation-circle me-2"></i>{{ $e }}</p>
            @endforeach
        </div>
    @endif

    <div class="row g-4 mb-5">
        <div class="col-lg-4">
            <div class="card-luxe text-center py-5 h-100">
                <div class="position-relative d-inline-block mb-4">
                    <div class="profile-avatar-container shadow-lg mx-auto"
                        style="width: 130px; height: 130px; background: var(--gold-dim); border: 2px solid var(--gold); border-radius: 35px; overflow: hidden; display: grid; place-items: center;">
                        @if(Auth::user()->photo)
                            <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                                alt="Photo" class="w-100 h-100 object-fit-cover">
                        @else
                            <span style="color: var(--gold); font-size: 3.5rem; font-weight: 900; font-family: 'Playfair Display', serif; text-transform: uppercase;">
                                {{ substr(Auth::user()->ferstname, 0, 1) }}
                            </span>
                        @endif
                    </div>
                </div>

                <h4 class="font-playfair text-white mb-1">{{ Auth::user()->ferstname }} {{ Auth::user()->lastname }}</h4>
                <p class="small text-muted mb-4">Membre depuis {{ Auth::user()->created_at->format('M Y') }}</p>

                <div class="d-flex justify-content-center gap-2 mb-4">
                    <span class="status-badge st-confirm">Barber Pro</span>
                    <span class="status-badge st-upcoming">{{ count($bookings) }} RDV</span>
                </div>

                <hr class="border-white border-opacity-10 my-4 mx-4">

                <div class="text-start px-4">
                    <label class="small text-uppercase fw-bold text-gold mb-3 d-block" style="letter-spacing: 1px;">Contact</label>
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="icon-circle" style="width: 32px; height: 32px; background: rgba(212,175,55,0.1); border-radius: 8px; display: grid; place-items: center;">
                            <i class="bi bi-envelope text-gold small"></i>
                        </div>
                        <span class="small text-white-50">{{ Auth::user()->email }}</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-circle" style="width: 32px; height: 32px; background: rgba(212,175,55,0.1); border-radius: 8px; display: grid; place-items: center;">
                            <i class="bi bi-telephone text-gold small"></i>
                        </div>
                        <span class="small text-white-50">{{ Auth::user()->telephone ?? '+212 6XX XX XX XX' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card-luxe h-100">
                <h5 class="font-playfair text-white mb-4">
                    <i class="bi bi-person-gear me-2 text-gold"></i>Modifier mes informations
                </h5>

                <form action="{{ route('barber.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small text-gold fw-bold text-uppercase" style="font-size: 0.7rem;">Prénom</label>
                            <input type="text" name="ferstname" class="form-control bg-dark border-secondary text-white py-2" value="{{ Auth::user()->ferstname }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small text-gold fw-bold text-uppercase" style="font-size: 0.7rem;">Nom</label>
                            <input type="text" name="lastname" class="form-control bg-dark border-secondary text-white py-2" value="{{ Auth::user()->lastname }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label small text-gold fw-bold text-uppercase" style="font-size: 0.7rem;">Adresse Email</label>
                            <input type="email" name="email" class="form-control bg-dark border-secondary text-white py-2" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label small text-gold fw-bold text-uppercase" style="font-size: 0.7rem;">Numéro de téléphone</label>
                            <input type="text" name="telephone" class="form-control bg-dark border-secondary text-white py-2" value="{{ Auth::user()->telephone }}">
                        </div>

                        <div class="col-12 mt-5">
                            <h6 class="font-playfair text-white mb-3 border-bottom border-white border-opacity-10 pb-2">
                                <i class="bi bi-shield-lock me-2 text-gold"></i>Sécurité
                            </h6>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small text-gold fw-bold text-uppercase" style="font-size: 0.7rem;">Nouveau mot de passe</label>
                            <input type="password" name="password" class="form-control bg-dark border-secondary text-white py-2" placeholder="••••••••">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small text-gold fw-bold text-uppercase" style="font-size: 0.7rem;">Confirmer</label>
                            <input type="password" name="password_confirmation" class="form-control bg-dark border-secondary text-white py-2" placeholder="••••••••">
                        </div>

                        <div class="col-12 text-end mt-4">
                            <button type="submit" class="btn btn-gold px-5 py-2 fw-bold text-uppercase" style="letter-spacing: 1px;">
                                Mettre à jour
                            </button>
                        </div>
                    </div>
                </form>

                <div class="mt-5 pt-4 border-top border-white border-opacity-10">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-danger mb-1 fw-bold">Zone de danger</h6>
                            <p class="small text-muted m-0">La suppression de votre compte est irréversible.</p>
                        </div>
                        <form method="POST" action="{{ route('barber.account.destroy') }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm px-4" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?')">
                                Supprimer le compte
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h5 class="font-playfair text-white mb-4"><i class="bi bi-clock-history me-2 text-gold"></i>Derniers rendez-vous</h5>
    <div class="row g-4">
        @forelse($bookings as $booking)
            <div class="col-md-6 col-xl-4">
                <div class="card-luxe h-100 p-0 overflow-hidden" style="border: 1px solid rgba(255,255,255,0.05); transition: transform 0.3s ease;">
                    <div class="p-3 d-flex justify-content-between align-items-center border-bottom border-white border-opacity-5" style="background: rgba(255,255,255,0.02);">
                        <span class="small fw-bold text-gold" style="font-family: monospace;">#BK-{{ $booking->id }}</span>
                        <span class="small text-white-50">
                            <i class="bi bi-calendar-event me-1 text-gold"></i> {{ $booking->created_at->format('d M, Y') }}
                        </span>
                    </div>

                    <div class="p-4">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div style="width: 45px; height: 45px; background: var(--gold-dim); border: 1px solid var(--gold); border-radius: 12px; display: grid; place-items: center; color: var(--gold); font-weight: 800; font-size: 1.1rem;">
                                {{ strtoupper(substr($booking->user->ferstname, 0, 1)) }}
                            </div>
                            <div>
                                <div class="fw-bold text-white">{{ $booking->user->ferstname }} {{ $booking->user->lastname }}</div>
                                <div class="small text-muted">Client régulier</div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="small text-uppercase fw-bold text-muted mb-2 d-block" style="font-size: 0.65rem; letter-spacing: 1px;">Prestation</label>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="text-white fw-medium">{{ $booking->service->titre ?? 'N/A' }}</span>
                                <span class="text-gold fw-bold">{{ $booking->service->prix ?? '--' }} MAD</span>
                            </div>
                        </div>

                        <div class="row g-2 mb-4">
                            <div class="col-6">
                                <div class="p-2 rounded-3 text-center" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05);">
                                    <i class="bi bi-clock text-gold d-block mb-1"></i>
                                    <span class="small text-white">{{ $booking->timeSlot->start_time ?? '--:--' }}</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-2 rounded-3 text-center" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05);">
                                    <i class="bi bi-hourglass-split text-gold d-block mb-1"></i>
                                    <span class="small text-white">{{ $booking->service->duration ?? '30' }} min</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between pt-3 border-top border-white border-opacity-5">
                            @php
                                $statusClass = match($booking->status) {
                                    'confirmed' => 'st-done',
                                    'pending' => 'st-upcoming',
                                    default => 'st-cancel',
                                };
                                $statusLabel = match($booking->status) {
                                    'confirmed' => 'Confirmé',
                                    'pending' => 'En attente',
                                    default => 'Annulé',
                                };
                            @endphp
                            <span class="status-badge {{ $statusClass }}">{{ $statusLabel }}</span>

                            <a href="#" class="btn-action shadow-sm" title="Voir détails">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="opacity-25 mb-3">
                    <i class="bi bi-calendar-x" style="font-size: 3rem; color: var(--gold);"></i>
                </div>
                <h5 class="text-white">Aucun historique</h5>
                <p class="text-muted">Les réservations terminées apparaîtront ici.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection