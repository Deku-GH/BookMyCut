@extends('layouts.client')

@section('title', 'Mes Rendez-vous')
@section('page_title', 'Historique & Réservations')

@section('content')
    <div class="container-fluid py-4">
        <input type="text" id="citySearch" class="form-control mb-4" placeholder="Search by city...">
        <div class="row g-4">

            @foreach ($barbers as $barber)
                <div class="col-md-6 col-xl-4 barber-card" data-city="{{ $barber->address->city ?? '' }}">
                    <div class="card-luxe h-100 text-center py-5 px-4 shadow-lg position-relative"
                        style="background: var(--dark-card); border: 1px solid var(--dark-border); border-radius: 20px; transition: all 0.3s ease-in-out;">

                        <a href="{{ route('client.barber', $barber->id) }}" class="stretched-link"></a>

                        <div class="position-relative d-inline-block mb-4">
                            <div class="profile-avatar-container shadow-lg"
                                style="width: 120px; height: 120px; background: var(--gold-dim); border: 2px solid var(--gold); border-radius: 30px; overflow: hidden; display: grid; place-items: center; margin: 0 auto; transition: transform 0.3s ease;">

                                @if($barber->user->photo)
                                    <img src="{{ asset('storage/' . $barber->user->photo) }}"
                                        alt="Photo de {{ $barber->user->ferstname }}" class="w-100 h-100 object-fit-cover">
                                @else
                                    <span
                                        style="color: var(--gold); font-size: 3rem; font-weight: 900; font-family: 'Playfair Display', serif; text-transform: uppercase;">
                                        {{ substr($barber->user->ferstname, 0, 1) }}
                                    </span>
                                @endif
                            </div>


                        </div>

                        <h4 class="font-playfair text-white mb-1">{{ $barber->user->ferstname }} {{ $barber->user->lastname }}
                        </h4>
                        <p class=" small mb-4">Membre depuis {{ $barber->user->created_at->format('M Y') }}</p>

                        <div class="d-flex justify-content-center gap-2 mb-4">
                            <span class="status-badge st-confirm"
                                style="font-size: 0.65rem; padding: 4px 10px; letter-spacing: 0.5px;">PRO BARBER</span>
                            <span class="status-badge st-upcoming"
                                style="font-size: 0.65rem; padding: 4px 10px; border-color: rgba(201, 168, 76, 0.3); color: var(--gold);">
                                <i class="bi bi-star-fill me-1"></i>{{ number_format($barber->rating, 1) ?? '5.0' }}
                            </span>
                        </div>

                        <hr class="border-white border-opacity-10 my-4">
                        <div class="text-start px-3">
                            <label class=" small text-uppercase fw-bold mb-3 d-block"
                                style="letter-spacing: 1px; font-size: 0.65rem;">Localisation & Contact</label>

                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="icon-box"
                                    style="width: 32px; height: 32px; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255,255,255,0.05); border-radius: 10px; display: grid; place-items: center;">
                                    <i class="bi bi-geo-alt text-gold small"></i>
                                </div>
                                <span
                                    class="text-white-50 small text-truncate ">{{ $barber->address->city ?? 'Marrakech'}}</span>
                            </div>

                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-box"
                                    style="width: 32px; height: 32px; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255,255,255,0.05); border-radius: 10px; display: grid; place-items: center;">
                                    <i class="bi bi-telephone text-gold small"></i>
                                </div>
                                <span class="text-white-50 small">{{ $barber->user->telephone ?? '+212 6XX XX XX XX' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <script>
        document.getElementById('citySearch').addEventListener('input', function () {
            let value = this.value.toLowerCase();
            let cards = document.querySelectorAll('.barber-card');

            cards.forEach(card => {
                let city = card.getAttribute('data-city').toLowerCase();

                if (city.includes(value)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    </script>
@endsection