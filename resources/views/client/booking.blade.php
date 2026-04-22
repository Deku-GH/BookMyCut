@extends('layouts.client')

@section('title', 'Réserver un service')
@section('page_title', 'Finaliser votre réservation')

@section('content')
<div class="container-fluid p-0">
    {{-- Alertes --}}
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4" style="background: rgba(16, 185, 129, 0.1); color: #10b981; border-radius: 12px;">
            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert-err shadow-sm mb-4 p-3" style="background: rgba(244, 63, 94, 0.1); border-radius: 12px; border: 1px solid rgba(244, 63, 94, 0.2);">
            @foreach($errors->all() as $e)
                <p class="mb-0 small text-danger"><i class="bi bi-exclamation-circle me-2"></i>{{ $e }}</p>
            @endforeach
        </div>
    @endif

    <div class="row g-4 justify-content-center">
        <div class="col-lg-10">
            <div class="card-luxe p-4 p-md-5">
                <h5 class="font-playfair text-white mb-4 d-flex align-items-center gap-3">
                    <i class="bi bi-calendar-check text-gold fs-4"></i>
                    Détails du Rendez-vous
                </h5>

                <form action="{{ route('client.booking.store') }}" method="POST">
                    @csrf
                    
                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                    <input type="hidden" name="barber_id" value="{{ $service->barber_id }}">
                    <input type="hidden" name="status" value="pending">

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label-custom">Service sélectionné</label>
                            <input type="text" class="form-control-luxe opacity-75" value="{{ $service->titre }}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label-custom">Barbier</label>
                            <input type="text" class="form-control-luxe opacity-75" value="{{ $service->barber->user->ferstname }} {{ $service->barber->user->lastname }}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label-custom">Durée estimée</label>
                            <div class="position-relative">
                                <i class="bi bi-clock position-absolute top-50 start-0 translate-middle-y ms-3 text-gold"></i>
                                <input type="text" class="form-control-luxe ps-5 opacity-75" value="{{ $service->duration }} min" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label-custom">Tarif</label>
                            <div class="position-relative">
                                <i class="bi bi-currency-dollar position-absolute top-50 start-0 translate-middle-y ms-3 text-gold"></i>
                                <input type="text" class="form-control-luxe ps-5 opacity-75" value="{{ $service->prix }} DH" readonly>
                            </div>
                        </div>

                        <hr class="my-4 border-white border-opacity-10">

                        <div class="col-md-6">
                            <label class="form-label-custom text-white">Choisir le jour</label>
                            <input type="date" name="date" class="form-control-luxe is-invalid " required min="{{ date('Y-m-d') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label-custom text-white">Choisir l'heure</label>
                            <input type="time" name="start_time" class="form-control-luxe is-invalid " required>
                        </div>

                        <div class="col-12 text-end mt-5">
                            <button type="submit" class="btn btn-gold px-5 py-3 fw-bold shadow-sm">
                                <i class="bi bi-check2-circle me-2"></i> Confirmer la réservation
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection