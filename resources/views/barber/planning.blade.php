@extends('layouts.barber')

@section('title', 'Planning hebdomadaire')

@section('content')
    <div class="container-fluid p-0">
        {{-- Header de la page --}}
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <h2 class="font-playfair text-white mb-2">Planning des rendez-vous</h2>
                <p class=" small text-uppercase fw-bold" style="letter-spacing: 2px;">Semaine du
                    {{ now()->startOfWeek()->format('d M') }} au {{ now()->endOfWeek()->format('d M') }}
                </p>
            </div>

        </div>

        <div class="planning-wrapper">
            @foreach($result as $day => $data)

                <div class="day-header d-flex align-items-center gap-3 mb-3">
                    <h5 class="font-playfair text-white m-0" style="min-width: 120px;">
                        {{ $day }}
                    </h5>
                    <div class="flex-grow-1 header-line"></div>
                </div>

                <div class="slots-container">

                    @foreach($data['bookings'] as $booking)

                        <div class="slot-card booked shadow-lg">

                            <div class="slot-time">
                                <span class="hour">{{ $booking['start_time'] }}</span>
                                <span class="duration">{{ $booking['end_time'] }}</span>
                            </div>

                            <div class="slot-content">
                                <div class="client-name">
                                    {{ $booking['client_name'] ?? 'Client' }}
                                </div>
                                <div class="service-tag">
                                    {{ $booking['service'] ?? 'Coupe & Barbe' }}
                                </div>
                            </div>

                            <div class="slot-badge confirmed">
                                <i class="bi bi-check-all"></i>
                            </div>

                        </div>

                    @endforeach

                </div>

            @endforeach
        </div>
    </div>

@endsection