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



                <div class="slots-container">
                    @foreach($data['bookings'] as $booking)
                        <div class="slot-wrapper">
                            @if($booking['status'] === 'confirmed')
                                <div class="day-row mb-4">

                                    <div class="day-header d-flex align-items-center gap-3 mb-3">
                                        <h5 class="font-playfair text-white m-0" style="min-width: 120px;">{{ $day }}</h5>
                                        <div class="flex-grow-1 header-line"></div>

                                    </div>
                                    <div class="slot-card booked shadow-lg">
                                        <div class="slot-time">
                                            <span class="hour">{{ $booking['start_time'] }}</span>
                                            <span class="duration">{{ $booking['end_time']}}</span>
                                        </div>
                                        <div class="slot-content">
                                            <div class="client-name">{{ $booking['client_name'] ?? 'Client' }}</div>
                                            <div class="service-tag">{{ $booking['service'] ?? 'Coupe & Barbe' }}</div>
                                        </div>
                                        <div class="slot-badge confirmed">
                                            <i class="bi bi-check-all"></i>
                                        </div>
                                    </div>
                            


                                @endif
                            </div>
                    @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        /* Global Planning Style */
        .header-line {
            height: 1px;
            background: linear-gradient(to right, var(--gold-dim), transparent);
        }

        .badge-status {
            font-size: 0.65rem;
            background: var(--gold-dim);
            color: var(--gold);
            padding: 4px 12px;
            border-radius: 50px;
            border: 1px solid var(--glass-border);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Container Horizontal scrollable if many slots */
        .slots-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 12px;
        }

        /* Slot Card Base */
        .slot-card {
            height: 75px;
            display: flex;
            align-items: center;
            padding: 0 15px;
            border-radius: 14px;
            background: var(--dark3);
            border: 1px solid var(--border);
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        /* Slot Card BOOKED */
        .slot-card.booked {
            background: linear-gradient(135deg, var(--dark4) 0%, #151515 100%);
            border-left: 4px solid var(--gold);
        }

        .slot-card.booked:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
            border-color: var(--gold);
        }

        /* Slot Card FREE */
        .slot-card.free {
            background: transparent;
            border: 1px dashed var(--border);
        }

        .slot-card.free:hover {
            background: var(--gold-dim);
            border-style: solid;
            border-color: var(--gold);
            transform: scale(1.02);
        }

        /* Inner Elements */
        .slot-time {
            display: flex;
            flex-direction: column;
            border-right: 1px solid var(--border);
            padding-right: 12px;
            margin-right: 12px;
            min-width: 55px;
        }

        .slot-time .hour {
            font-weight: 800;
            font-size: 0.95rem;
            color: var(--white);
        }

        .slot-time .duration {
            font-size: 0.65rem;
            color: #666;
        }

        .slot-content .client-name {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--white);
            margin-bottom: 2px;
        }

        .slot-content .service-tag {
            font-size: 0.65rem;
            color: var(--gold);
            opacity: 0.8;
        }

        .free-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #444;
            font-weight: 700;
        }

        /* Badges & Icons */
        .slot-badge.confirmed {
            position: absolute;
            top: 8px;
            right: 8px;
            color: #10b981;
            font-size: 1.1rem;
            filter: drop-shadow(0 0 5px rgba(16, 185, 129, 0.4));
        }

        .slot-add {
            position: absolute;
            right: 15px;
            color: var(--border);
            font-size: 1.2rem;
            transition: 0.3s;
        }

        .slot-card.free:hover .slot-add {
            color: var(--gold);
            transform: rotate(90deg);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .slots-container {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }
        }
    </style>
@endsection