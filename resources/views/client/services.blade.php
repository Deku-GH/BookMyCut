@extends('layouts.client')

@section('content')
    <div class="page-section">
        <div class="d-flex justify-content-between align-items-center mb-4">
           <div class="card-luxe h-100 text-center py-5 px-4 shadow-lg position-relative" 
                     style="background: var(--dark-card); border: 1px solid var(--dark-border); border-radius: 20px; transition: all 0.3s ease-in-out;">
                    <div class="position-relative d-inline-block mb-4">
                        <div class="profile-avatar-container shadow-lg"
                            style="width: 120px; height: 120px; background: var(--gold-dim); border: 2px solid var(--gold); border-radius: 30px; overflow: hidden; display: grid; place-items: center; margin: 0 auto; transition: transform 0.3s ease;">

                            @if($barber->user->photo)
                                <img src="{{ asset('storage/' . $barber->user->photo) }}"
                                    alt="Photo de {{ $barber->user->ferstname }}" class="w-100 h-100 object-fit-cover">
                            @else
                                <span style="color: var(--gold); font-size: 3rem; font-weight: 900; font-family: 'Playfair Display', serif; text-transform: uppercase;">
                                    {{ substr($barber->user->ferstname, 0, 1) }}
                                </span>
                            @endif
                        </div>
                        
                    </div>

                    <h4 class="font-playfair text-white mb-1">{{ $barber->user->ferstname }} {{ $barber->user->lastname }}</h4>
                    <p class=" small mb-4">Membre depuis {{ $barber->user->created_at->format('M Y') }}</p>

                    <div class="d-flex justify-content-center gap-2 mb-4">
                        <span class="status-badge st-confirm" style="font-size: 0.65rem; padding: 4px 10px; letter-spacing: 0.5px;">PRO BARBER</span>
                        <span class="status-badge st-upcoming" style="font-size: 0.65rem; padding: 4px 10px; border-color: rgba(201, 168, 76, 0.3); color: var(--gold);">
                            <i class="bi bi-star-fill me-1"></i>{{ number_format($barber->rating, 1) ?? '5.0' }}
                        </span>
                    </div>

                    <hr class="border-white border-opacity-10 my-4">

                    <div class="text-start px-3">
                        <label class=" small text-uppercase fw-bold mb-3 d-block" style="letter-spacing: 1px; font-size: 0.65rem;">Localisation & Contact</label>
                        
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="icon-box" style="width: 32px; height: 32px; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255,255,255,0.05); border-radius: 10px; display: grid; place-items: center;">
                                <i class="bi bi-geo-alt text-gold small"></i>
                            </div>
                            <span class="text-white-50 small text-truncate">{{ $barber->address->city ?? 'Marrakech'}}</span>
                        </div>

                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box" style="width: 32px; height: 32px; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255,255,255,0.05); border-radius: 10px; display: grid; place-items: center;">
                                <i class="bi bi-telephone text-gold small"></i>
                            </div>
                            <span class="text-white-50 small">{{ $barber->user->telephone ?? '+212 6XX XX XX XX' }}</span>
                        </div>
                    </div>
          
                </div>

        
    </div>
    <div class="row g-4">
            @forelse($services as $service)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0"
                        style=" border-radius: 15px; overflow: hidden; transition: transform 0.3s ease;">
                        <div style="height: 200px; overflow: hidden; position: relative;">
                            <img src="{{ asset('storage/' . $service->image_url)}}" class="w-100 h-100 object-fit-cover"
                                alt="{{ $service->titre }}">
                            <div class="position-absolute top-0 end-0 m-3 badge bg-dark border border-gold text-gold p-2">
                                {{ $service->prix }} MAD
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title font-playfair text-black m-0">{{ $service->titre }}</h5>
                                <span class="small text-muted"><i class="bi bi-clock me-1"></i>{{ $service->duration }}
                                    min</span>
                            </div>

                            <p class="card-text text-secondary small mb-4"
                                style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $service->description }}
                            </p>

                            <div class="d-grid">


                            </div>
                        </div>
                        <a type="submit"  class="btn btn-gold px-5 py-2" href="{{ route('client.booking',$service->id) }}">
                            booking
                        </a>

                        </button </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Aucun service disponible pour le moment.</p>
                </div>
            @endforelse
        </div> 
    
@endsection