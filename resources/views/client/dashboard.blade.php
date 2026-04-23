@extends('layouts.client')

@section('content')
    <div class="page-section">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-playfair text-white">Nos Services d'Exception</h2>
            <span class="text-gold fw-bold">{{ $services->count() }} Prestations disponibles</span>
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
    </div>
    </div>
@endsection