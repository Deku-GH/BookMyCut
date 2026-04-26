@extends('layouts.client')

@section('content')
<div class="container py-4">
    <div class="barber-banner mb-5 p-4 shadow-lg" 
         style="background: var(--dark-card); border: 1px solid var(--dark-border); border-radius: 20px;">
        <div class="row align-items-center">
            <div class="col-auto">
                <div class="profile-avatar-container shadow-lg"
                    style="width: 90px; height: 90px; background: var(--gold-dim); border: 2px solid var(--gold); border-radius: 20px; overflow: hidden; display: grid; place-items: center;">
                    @if($barber->user->photo)
                        <img src="{{ asset('storage/' . $barber->user->photo) }}"
                             alt="Photo" class="w-100 h-100 object-fit-cover">
                    @else
                        <span style="color: var(--gold); font-size: 2rem; font-weight: 900; font-family: 'Playfair Display', serif;">
                            {{ substr($barber->user->ferstname, 0, 1) }}
                        </span>
                    @endif
                </div>
            </div>

            <div class="col">
                <div class="d-flex align-items-center gap-3 mb-1">
                    <h3 class="font-playfair text-white m-0">{{ $barber->user->ferstname }} {{ $barber->user->lastname }}</h3>
                    <span class="status-badge st-confirm" style="font-size: 0.6rem; padding: 2px 8px;">PRO BARBER</span>
                </div>
                <div class="d-flex flex-wrap gap-4 text-white-50 small">
                    <span><i class="bi bi-star-fill text-gold me-1"></i>{{ number_format($barber->rating, 1) ?? '5.0' }} Rating</span>
                    <span><i class="bi bi-geo-alt text-gold me-1"></i>{{ $barber->address->city ?? 'Marrakech'}}</span>
                    <span><i class="bi bi-telephone text-gold me-1"></i>{{ $barber->user->telephone ?? '+212 6XX XX XX XX' }}</span>
                    <span><i class="bi bi-calendar-check text-gold me-1"></i>Member since {{ $barber->user->created_at->format('M Y') }}</span>
                </div>
            </div>

            <div class="col-auto d-none d-md-block text-end">
                <p class="text-uppercase small text-gold fw-bold mb-0" style="letter-spacing: 1px;">Expert Stylist</p>
                <small class="text-white-50">Verified Professional</small>
            </div>
        </div>
    </div>

    <h4 class="font-playfair text-white mb-4">Available Services</h4>
    <div class="row g-4">
        @forelse($services as $service)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm" style="border-radius: 15px; overflow: hidden; background: #fff;">
                    <div style="height: 200px; overflow: hidden; position: relative;">
                        <img src="{{ asset('storage/' . $service->image_url)}}" class="w-100 h-100 object-fit-cover" alt="{{ $service->titre }}">
                        <div class="position-absolute top-0 end-0 m-3 badge bg-dark border border-gold text-gold p-2">
                            {{ $service->prix }} MAD
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title font-playfair text-black m-0">{{ $service->titre }}</h5>
                            <span class="small text-muted"><i class="bi bi-clock me-1"></i>{{ $service->duration }} min</span>
                        </div>
                        <p class="card-text text-secondary small mb-4" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ $service->description }}
                        </p>
                        <div class="d-grid">
                            <a class="btn btn-dark text-gold border-gold py-2" href="{{ route('client.booking',$service->id) }}">
                                Book Appointment
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Aucun service disponible pour le moment.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection