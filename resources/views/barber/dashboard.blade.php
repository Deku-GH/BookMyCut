@extends('layouts.barber')

@section('title', 'Tableau de bord')
@section('page-title', 'Vue d\'ensemble')

@section('content')


    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="sc">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="sc-lbl small text-uppercase" style="letter-spacing: 1px; color: var(--muted);">RDV aujourd'hui</div>
                        <div class="sc-val h2 fw-bold mb-0 text-white">{{ $todayBookings ?? 0 }}</div>
                    </div>
                    <div class="u-av" style="background: var(--gold-dim); color: var(--gold); border: 1px solid var(--border);">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                </div>
                <div class="mt-3" style="height: 3px; background: rgba(255,255,255,0.05); border-radius: 10px; overflow: hidden;">
                    <div style="height: 100%; background: var(--gold); width: 60%; box-shadow: 0 0 10px var(--gold);"></div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="sc">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="sc-lbl small text-uppercase" style="letter-spacing: 1px; color: var(--muted);">Services actifs</div>
                        <div class="sc-val h2 fw-bold mb-0 text-white">{{ $totalServices ?? 0 }}</div>
                    </div>
                    <div class="u-av" style="background: rgba(59, 130, 246, 0.1); color: var(--blue); border: 1px solid rgba(59, 130, 246, 0.2);">
                        <i class="bi bi-scissors"></i>
                    </div>
                </div>
                <div class="mt-3" style="height: 3px; background: rgba(255,255,255,0.05); border-radius: 10px; overflow: hidden;">
                    <div style="height: 100%; background: var(--blue); width: 40%; box-shadow: 0 0 10px var(--blue);"></div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="sc">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="sc-lbl small text-uppercase" style="letter-spacing: 1px; color: var(--muted);">Revenu du mois</div>
                        <div class="sc-val h2 fw-bold mb-0 text-white">{{ number_format($monthlyRevenue ?? 0, 0) }} <small class="h6 text-gold">MAD</small></div>
                    </div>
                    <div class="u-av" style="background: rgba(16, 185, 129, 0.1); color: var(--green); border: 1px solid rgba(16, 185, 129, 0.2);">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                </div>
                <div class="mt-3" style="height: 3px; background: rgba(255,255,255,0.05); border-radius: 10px; overflow: hidden;">
                    <div style="height: 100%; background: var(--green); width: 75%; box-shadow: 0 0 10px var(--green);"></div>
                </div>
            </div>
        </div>
    </div>

  
    <div class="tc overflow-hidden">
        <div class="th d-flex justify-content-between align-items-center p-4 border-bottom border-white border-opacity-5">
            <h6 class="mb-0 fw-bold text-white" style="font-family: 'Playfair Display', serif;">
                <i class="bi bi-list-ul me-2 text-gold"></i>Dernières Réservations
            </h6>
           
        </div>
        
        <div class="table-responsive">
            <table class="tt mb-0 w-100 table table-borderless align-middle">
                <thead>
                    <tr style="background: rgba(215, 0, 0, 0.01);">
                        <th class="ps-4">Réf</th>
                        <th>Client</th>
                        <th>Service</th>
                        <th>Heure</th>
                        <th>Status</th>
                     
                    </tr>
                </thead>
                <tbody> 
                    @forelse($bookings as $index => $booking)
                        <tr style="border-bottom: 1px solid var(--border);">
                            <td class="ps-4 small" style=" font-family: monospace;">
                                #{{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}
                            </td>

                            <td>
                                <div class="d-flex align-items-center gap-3">
                                   
                                    <div class="fw-medium ">
                                        {{ $booking->user->ferstname }} {{ $booking->user->lastname  }}
                                    </div>
                                </div>
                            </td>

                            <td>
                                <span class="badge" style="background: rgba(254, 127, 1, 0.95); color: var(--white); border: 1px solid var(--border); font-weight: 400; padding: 6px 12px;">
                                    {{ $booking->service->titre }}
                                </span>
                            </td>

                            <td>
                                <div class="d-flex align-items-center gap-2 ">
                                    <i class="bi bi-clock text-gold" style="font-size: 0.8rem;"></i>
                                    <span>{{ $booking->timeSlot->start_time  }}</span>
                                </div>
                            </td>

                            <td>
                               
                                 <form action="{{ route('barber.booking.update', $booking->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="status" value="{{$booking->status == 'confirmed' ? 'canceled' : 'confirmed' }}">
                                    
                                    @if($booking->status == 'confirmed')
                                        <button class="btn btn-sm btn-outline-danger border-0 bg-transparent shadow-none" title="canceled">
                                            <i class="bi bi-person-x-fill fs-5"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-sm btn-outline-success border-0 bg-transparent shadow-none" title="confirmed">
                                            <i class="bi bi-person-check-fill fs-5"></i>
                                        </button>
                                    @endif
                                </form>
                            </td>

                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="text-center py-5">
                                    <i class="bi bi-inbox mb-3 d-block opacity-25" style="font-size: 3rem; color: var(--black);"></i>
                                    <p class="text-muted">Aucune réservation pour le moment.</p>
                                    <a href="{{ route('barber.dashboard') }}" class="btn btn-sm px-4" style="background: var(--gold); color: var(--dark); border-radius: 6px; font-weight: 600;">Actualiser</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('styles')
<style>
   
    .sc {
        background: var(--dark2);
        border: 1px solid var(--border);
        padding: 1.8rem;
        border-radius: 20px;
        transition: all 0.3s ease;
    }
    
    .sc:hover {
        transform: translateY(-5px);
        border-color: rgba(201, 168, 76, 0.3);
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    .u-av {
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        width: 48px;
        height: 48px;
        font-size: 1.2rem;
    }

    .tc {
        background: var(--dark2);
        border: 1px solid var(--border);
        border-radius: 20px;
    }

    .tt th {
        color: var(--gold);
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 1rem;
        border-bottom: 1px solid var(--border);
    }

    .badge {
        font-size: 0.75rem;
        padding: 5px 12px;
    }
</style>
@endsection