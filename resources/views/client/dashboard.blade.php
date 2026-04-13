
@extends('layouts.client')

@section('title', 'Tableau de bord')
@section('page_title', 'Tableau de bord')

@section('extra_css')
<style>
.next-card{background:linear-gradient(135deg,#1e1a10 0%,var(--dark3) 100%);border:1px solid rgba(201,168,76,0.2);border-radius:14px;padding:1.6rem;position:relative;overflow:hidden;}
.next-card::before{content:'';position:absolute;top:-40px;right:-40px;width:180px;height:180px;border-radius:50%;background:radial-gradient(circle,rgba(201,168,76,0.06),transparent 70%);}
.next-tag{font-size:0.68rem;letter-spacing:3px;text-transform:uppercase;color:var(--gold);font-weight:500;margin-bottom:0.7rem;}
.next-service{font-family:'Playfair Display',serif;font-size:1.5rem;color:var(--white);margin-bottom:0.5rem;}
.next-time{display:flex;align-items:center;gap:0.5rem;font-size:0.9rem;color:#c0c3ca;margin-bottom:0.5rem;}
.next-time i{color:var(--gold);}
.cal-mini{background:var(--dark2);border:1px solid rgba(255,255,255,0.06);border-radius:12px;padding:1.4rem;}
.cal-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;}
.cal-head span{font-family:'Playfair Display',serif;color:var(--white);font-size:1rem;}
.cal-nav{background:none;border:1px solid rgba(255,255,255,0.08);color:var(--muted);border-radius:5px;width:28px;height:28px;display:flex;align-items:center;justify-content:center;cursor:pointer;}
.cal-grid{display:grid;grid-template-columns:repeat(7,1fr);gap:2px;}
.cal-day-lbl{font-size:0.68rem;color:var(--muted);text-align:center;padding:0.3rem 0;letter-spacing:1px;}
.cal-day{height:32px;display:flex;align-items:center;justify-content:center;border-radius:6px;font-size:0.82rem;color:var(--muted);cursor:pointer;transition:all 0.2s;}
.cal-day:hover{background:rgba(255,255,255,0.05);color:var(--white);}
.cal-day.today{background:var(--gold-dim);color:var(--gold);font-weight:600;}
.cal-day.has-rdv{color:var(--white);position:relative;}
.cal-day.has-rdv::after{content:'';display:block;width:4px;height:4px;border-radius:50%;background:var(--gold);position:absolute;bottom:3px;}
.cal-day.empty{pointer-events:none;}
</style>
@endsection

@section('topbar_actions')
<a href="{{ route('client.reservation') }}" class="btn-g">
  <i class="bi bi-plus-circle"></i>Nouveau RDV
</a>
@endsection

@section('content')

{{-- STATS --}}
<div class="row g-3 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="sc">
      <div class="sc-ico g"><i class="bi bi-calendar-check"></i></div>
      <div class="sc-val">{{ $totalRdv ?? 0 }}</div>
      <div class="sc-lbl">Total rendez-vous</div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="sc">
      <div class="sc-ico gr"><i class="bi bi-patch-check"></i></div>
      <div class="sc-val">{{ $upcomingCount ?? 0 }}</div>
      <div class="sc-lbl">À venir</div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="sc">
      <div class="sc-ico b"><i class="bi bi-clock-history"></i></div>
      <div class="sc-val">{{ $pastCount ?? 0 }}</div>
      <div class="sc-lbl">RDV passés</div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="sc">
      <div class="sc-ico g"><i class="bi bi-star-fill"></i></div>
      <div class="sc-val">4.9</div>
      <div class="sc-lbl">Note service</div>
    </div>
  </div>
</div>

<div class="row g-4">
  {{-- Left: next RDV + calendar --}}
  <div class="col-lg-5">

    {{-- Next appointment --}}
    @if($nextBooking ?? false)
    <div class="next-card mb-3">
      <div class="next-tag">✦ Prochain rendez-vous</div>
      <div class="next-service">{{ $nextBooking->service->titre }}</div>
      <div class="next-time"><i class="bi bi-calendar3"></i>
        {{ \Carbon\Carbon::parse($nextBooking->date)->isoFormat('dddd D MMM') }} · {{ \Carbon\Carbon::parse($nextBooking->time)->format('H\hi') }}
      </div>
      <div class="next-time"><i class="bi bi-person-badge"></i>
        {{ $nextBooking->barber->user->firstname ?? 'Coiffeur' }} {{ $nextBooking->barber->user->lastname ?? '' }}
      </div>
      <div class="next-time"><i class="bi bi-geo-alt"></i> Salon CoiffeurPro · Marrakech</div>
      <div class="d-flex gap-2 mt-3">
        <a href="{{ route('client.rdvs') }}" class="btn-outline-g" style="padding:0.45rem 1rem;font-size:0.83rem">
          <i class="bi bi-pencil me-1"></i>Modifier
        </a>
        <form method="POST" action="{{ route('client.rdv.cancel', $nextBooking->id) }}"
              onsubmit="return confirm('Annuler ce rendez-vous ?')">
          @csrf @method('PATCH')
          <button type="submit" style="background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.2);color:#fca5a5;border-radius:6px;padding:0.45rem 1rem;font-size:0.83rem;cursor:pointer">
            <i class="bi bi-x me-1"></i>Annuler
          </button>
        </form>
      </div>
    </div>
    @else
    <div class="next-card mb-3">
      <div class="next-tag">✦ Prochain rendez-vous</div>
      <div class="next-service" style="color:var(--muted);font-size:1.1rem">Aucun rendez-vous prévu</div>
      <div class="next-time" style="margin-top:0.5rem"><i class="bi bi-calendar-plus"></i> Réservez dès maintenant</div>
      <div class="mt-3">
        <a href="{{ route('client.reservation') }}" class="btn-g"><i class="bi bi-plus-circle me-1"></i>Prendre RDV</a>
      </div>
    </div>
    @endif

    {{-- Mini calendar --}}
    <div class="cal-mini">
      <div class="cal-head">
        <button class="cal-nav"><i class="bi bi-chevron-left"></i></button>
        <span>{{ now()->isoFormat('MMMM YYYY') }}</span>
        <button class="cal-nav"><i class="bi bi-chevron-right"></i></button>
      </div>
      @php
        $today      = now()->day;
        $startDay   = (int) now()->startOfMonth()->dayOfWeekIso - 1; // Mon=0
        $daysInMonth = now()->daysInMonth;
        $rdvDays    = collect($upcomingBookings ?? [])->map(fn($b) => (int)\Carbon\Carbon::parse($b->date)->format('j'))->toArray();
      @endphp
      <div class="cal-grid">
        @foreach(['Lu','Ma','Me','Je','Ve','Sa','Di'] as $d)
          <div class="cal-day-lbl">{{ $d }}</div>
        @endforeach
        @for($e = 0; $e < $startDay; $e++)
          <div class="cal-day empty"></div>
        @endfor
        @for($d = 1; $d <= $daysInMonth; $d++)
          <div class="cal-day {{ $d == $today ? 'today' : '' }} {{ in_array($d, $rdvDays) ? 'has-rdv' : '' }}">
            {{ $d }}
          </div>
        @endfor
      </div>
    </div>
  </div>

  {{-- Right: recent bookings --}}
  <div class="col-lg-7">
    <div class="tc">
      <div class="th">
        <h6>Historique des réservations</h6>
        <a href="{{ route('client.reservation') }}" class="btn-g" style="padding:0.4rem 1rem;font-size:0.82rem">
          <i class="bi bi-plus me-1"></i>Nouveau RDV
        </a>
      </div>
      <div class="table-responsive">
        <table class="tt">
          <thead><tr><th>Service</th><th>Date</th><th>Heure</th><th>Statut</th></tr></thead>
          <tbody>
            @forelse($recentBookings ?? [] as $b)
            <tr>
              <td>
                <i class="bi bi-scissors me-2" style="color:var(--gold)"></i>
                {{ $b->service->titre }}
              </td>
              <td>{{ \Carbon\Carbon::parse($b->date)->format('d M Y') }}</td>
              <td>{{ \Carbon\Carbon::parse($b->time)->format('H\hi') }}</td>
              <td>
                @php
                  $map = ['pending'=>['po','Confirmé'],'done'=>['pg','Terminé'],'cancelled'=>['pr','Annulé'],'upcoming'=>['pb','À venir']];
                  [$cls,$lbl] = $map[$b->status] ?? ['pb',$b->status];
                @endphp
                <span class="pill {{ $cls }}">{{ $lbl }}</span>
              </td>
            </tr>
            @empty
            <tr><td colspan="4" style="text-align:center;padding:2.5rem;color:var(--muted)">
              <i class="bi bi-calendar-x" style="font-size:1.8rem;display:block;margin-bottom:0.5rem"></i>
              Aucune réservation pour le moment.
            </td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
      @if(($recentBookings ?? collect())->count() > 0)
      <div class="p-3" style="border-top:1px solid rgba(255,255,255,0.04)">
        <a href="{{ route('client.rdvs') }}" class="btn-outline-g" style="font-size:0.82rem;padding:0.4rem 1rem">
          Voir tous mes rendez-vous <i class="bi bi-arrow-right ms-1"></i>
        </a>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection
