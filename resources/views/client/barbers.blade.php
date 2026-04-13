{{-- resources/views/client/barbers.blade.php --}}
@extends('layouts.client')

@section('title', 'Nos coiffeurs')
@section('page_title', 'Nos coiffeurs')

@section('extra_css')
<style>
.barber-card{background:var(--dark2);border:1px solid rgba(255,255,255,0.06);border-radius:16px;overflow:hidden;transition:all 0.25s;}
.barber-card:hover{border-color:rgba(201,168,76,0.3);transform:translateY(-4px);box-shadow:0 12px 40px rgba(0,0,0,0.35);}
.barber-header{background:linear-gradient(135deg,#1a1610 0%,var(--dark3) 100%);padding:1.8rem 1.4rem 1rem;text-align:center;position:relative;}
.barber-header::before{content:'';position:absolute;inset:0;background:radial-gradient(circle at 50% 0%,rgba(201,168,76,0.06),transparent 60%);}
.barber-avatar{width:72px;height:72px;background:var(--gold-dim);border-radius:50%;border:2px solid rgba(201,168,76,0.25);display:flex;align-items:center;justify-content:center;margin:0 auto 0.9rem;font-family:'Playfair Display',serif;font-size:1.5rem;color:var(--gold);font-weight:700;position:relative;z-index:1;}
.barber-name{font-family:'Playfair Display',serif;font-size:1.1rem;color:var(--white);position:relative;z-index:1;}
.barber-role{font-size:0.78rem;color:var(--gold);font-weight:500;margin-top:0.2rem;position:relative;z-index:1;}
.barber-body{padding:1.2rem 1.4rem;}
.barber-stat{display:flex;align-items:center;justify-content:space-between;padding:0.5rem 0;border-bottom:1px solid rgba(255,255,255,0.05);}
.barber-stat:last-of-type{border-bottom:none;}
.barber-stat .label{font-size:0.82rem;color:var(--muted);display:flex;align-items:center;gap:0.4rem;}
.barber-stat .label i{font-size:0.9rem;color:var(--gold);}
.barber-stat .value{font-size:0.85rem;color:var(--white);font-weight:500;}
.barber-services{display:flex;flex-wrap:wrap;gap:0.35rem;margin-top:0.8rem;margin-bottom:1rem;}
.tag{background:var(--dark3);border:1px solid rgba(255,255,255,0.07);color:var(--muted);border-radius:20px;padding:0.18rem 0.65rem;font-size:0.74rem;}
.star-row{display:flex;align-items:center;gap:0.25rem;}
.star-row i{color:var(--gold);font-size:0.85rem;}
.status-dot{width:8px;height:8px;border-radius:50%;background:var(--green);box-shadow:0 0 6px rgba(34,197,94,0.5);display:inline-block;margin-right:0.4rem;}
</style>
@endsection

@section('topbar_actions')
<a href="{{ route('client.reservation') }}" class="btn-g">
  <i class="bi bi-calendar-plus"></i>Prendre RDV
</a>
@endsection

@section('content')

{{-- Stats --}}
<div class="row g-3 mb-4">
  <div class="col-6 col-xl-3">
    <div class="sc">
      <div class="sc-ico g"><i class="bi bi-person-badge"></i></div>
      <div class="sc-val">{{ $barbers->count() }}</div>
      <div class="sc-lbl">Coiffeurs disponibles</div>
    </div>
  </div>
  <div class="col-6 col-xl-3">
    <div class="sc">
      <div class="sc-ico gr"><i class="bi bi-star-fill"></i></div>
      <div class="sc-val">4.8</div>
      <div class="sc-lbl">Note moyenne</div>
    </div>
  </div>
  <div class="col-6 col-xl-3">
    <div class="sc">
      <div class="sc-ico b"><i class="bi bi-calendar-check"></i></div>
      <div class="sc-val">{{ $barbers->sum(fn($b) => $b->bookings_count ?? 0) }}</div>
      <div class="sc-lbl">RDV réalisés</div>
    </div>
  </div>
  <div class="col-6 col-xl-3">
    <div class="sc">
      <div class="sc-ico o"><i class="bi bi-scissors"></i></div>
      <div class="sc-val">{{ $barbers->sum(fn($b) => $b->services_count ?? 0) }}</div>
      <div class="sc-lbl">Services proposés</div>
    </div>
  </div>
</div>

{{-- Barbers grid --}}
<div class="row g-4">
  @forelse($barbers as $barber)
  <div class="col-md-6 col-xl-4">
    <div class="barber-card">
      <div class="barber-header">
        <div class="barber-avatar">
          {{ strtoupper(substr($barber->user->firstname,0,1).substr($barber->user->lastname,0,1)) }}
        </div>
        <div class="barber-name">{{ $barber->user->firstname }} {{ $barber->user->lastname }}</div>
        <div class="barber-role">
          <span class="status-dot"></span>Coiffeur professionnel
        </div>
      </div>
      <div class="barber-body">
        {{-- Stats --}}
        <div class="barber-stat">
          <span class="label"><i class="bi bi-calendar-check"></i>RDV réalisés</span>
          <span class="value">{{ $barber->bookings_count ?? 0 }}</span>
        </div>
        <div class="barber-stat">
          <span class="label"><i class="bi bi-star-fill"></i>Note</span>
          <span class="value">
            <span class="star-row">
              <i class="bi bi-star-fill"></i>
              {{ $barber->user->note ?? '4.9' }}
            </span>
          </span>
        </div>
        <div class="barber-stat">
          <span class="label"><i class="bi bi-list-stars"></i>Services</span>
          <span class="value">{{ $barber->services_count ?? $barber->services->count() }} service(s)</span>
        </div>

        {{-- Specialties --}}
        @if($barber->services->count() > 0)
        <div class="barber-services">
          @foreach($barber->services->take(4) as $svc)
            <span class="tag">{{ $svc->titre }}</span>
          @endforeach
          @if($barber->services->count() > 4)
            <span class="tag">+{{ $barber->services->count() - 4 }} autres</span>
          @endif
        </div>
        @else
        <div class="barber-services">
          <span class="tag">Coupe</span>
          <span class="tag">Barbe</span>
        </div>
        @endif

        {{-- CTA --}}
        <a href="{{ route('client.reservation', ['barber' => $barber->id]) }}"
           class="btn-g w-100 justify-content-center">
          <i class="bi bi-calendar-plus"></i>Réserver avec ce coiffeur
        </a>
      </div>
    </div>
  </div>
  @empty
  <div class="col-12">
    <div style="text-align:center;padding:4rem;color:var(--muted)">
      <i class="bi bi-person-badge" style="font-size:3rem;display:block;margin-bottom:1rem;color:rgba(201,168,76,0.3)"></i>
      <div style="font-family:'Playfair Display',serif;font-size:1.2rem;color:var(--white);margin-bottom:0.5rem">Aucun coiffeur disponible</div>
      <div style="font-size:0.87rem">L'équipe sera bientôt disponible.</div>
    </div>
  </div>
  @endforelse
</div>
@endsection
