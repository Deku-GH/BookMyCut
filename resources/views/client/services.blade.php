
@extends('layouts.client')

@section('title', 'Services & tarifs')
@section('page_title', 'Services & tarifs')

@section('extra_css')
<style>
.svc-card{background:var(--dark2);border:1px solid rgba(255,255,255,0.06);border-radius:14px;padding:1.6rem;transition:all 0.25s;position:relative;overflow:hidden;}
.svc-card:hover{border-color:rgba(201,168,76,0.35);transform:translateY(-3px);box-shadow:0 8px 30px rgba(0,0,0,0.3);}
.svc-card::before{content:'';position:absolute;top:0;right:0;width:80px;height:80px;background:radial-gradient(circle,rgba(201,168,76,0.05),transparent 70%);}
.svc-icon{width:54px;height:54px;background:var(--gold-dim);border-radius:12px;display:flex;align-items:center;justify-content:center;margin-bottom:1rem;}
.svc-icon i{font-size:1.5rem;color:var(--gold);}
.svc-name{font-family:'Playfair Display',serif;font-size:1.1rem;color:var(--white);margin-bottom:0.4rem;}
.svc-desc{color:var(--muted);font-size:0.84rem;line-height:1.6;margin-bottom:1rem;}
.svc-meta{display:flex;align-items:center;justify-content:space-between;padding-top:0.9rem;border-top:1px solid rgba(255,255,255,0.06);}
.svc-price{font-family:'Playfair Display',serif;font-size:1.2rem;color:var(--gold);font-weight:700;}
.svc-duration{display:flex;align-items:center;gap:0.3rem;font-size:0.8rem;color:var(--muted);}
.cat-badge{display:inline-block;background:rgba(59,130,246,0.1);color:var(--blue);font-size:0.72rem;padding:0.15rem 0.6rem;border-radius:20px;font-weight:600;margin-bottom:0.7rem;}
.filter-bar{background:var(--dark2);border:1px solid rgba(255,255,255,0.06);border-radius:10px;padding:0.8rem 1.2rem;display:flex;align-items:center;gap:0.6rem;flex-wrap:wrap;margin-bottom:1.5rem;}
.filter-btn{background:var(--dark3);border:1px solid rgba(255,255,255,0.07);color:var(--muted);border-radius:20px;padding:0.3rem 1rem;font-size:0.82rem;cursor:pointer;transition:all 0.2s;text-decoration:none;}
.filter-btn:hover,.filter-btn.active{background:var(--gold-dim);border-color:rgba(201,168,76,0.3);color:var(--gold);}
</style>
@endsection

@section('topbar_actions')
<a href="{{ route('client.reservation') }}" class="btn-g">
  <i class="bi bi-calendar-plus"></i>Réserver
</a>
@endsection

@section('content')

{{-- Stats row --}}
<div class="row g-3 mb-4">
  <div class="col-6 col-xl-3">
    <div class="sc">
      <div class="sc-ico g"><i class="bi bi-scissors"></i></div>
      <div class="sc-val">{{ $services->count() }}</div>
      <div class="sc-lbl">Services disponibles</div>
    </div>
  </div>
  <div class="col-6 col-xl-3">
    <div class="sc">
      <div class="sc-ico b"><i class="bi bi-tag"></i></div>
      <div class="sc-val">{{ $categories->count() }}</div>
      <div class="sc-lbl">Catégories</div>
    </div>
  </div>
  <div class="col-6 col-xl-3">
    <div class="sc">
      <div class="sc-ico gr"><i class="bi bi-cash-coin"></i></div>
      <div class="sc-val">{{ $services->min('prix') ?? '—' }}</div>
      <div class="sc-lbl">À partir de (MAD)</div>
    </div>
  </div>
  <div class="col-6 col-xl-3">
    <div class="sc">
      <div class="sc-ico o"><i class="bi bi-clock"></i></div>
      <div class="sc-val">{{ $services->min('duration') ?? '—' }}</div>
      <div class="sc-lbl">Durée min (min)</div>
    </div>
  </div>
</div>

{{-- Category filter --}}
<div class="filter-bar">
  <span style="font-size:0.8rem;color:var(--muted);font-weight:500">Filtrer :</span>
  <a href="{{ route('client.services') }}" class="filter-btn {{ !request('category') ? 'active' : '' }}">
    Tous
  </a>
  @foreach($categories as $cat)
    <a href="{{ route('client.services', ['category' => $cat->id]) }}"
       class="filter-btn {{ request('category') == $cat->id ? 'active' : '' }}">
      {{ $cat->name }}
    </a>
  @endforeach
</div>

{{-- Services grid --}}
<div class="row g-4">
  @forelse($services as $service)
  <div class="col-md-6 col-xl-4">
    <div class="svc-card">
      @if($service->category)
        <div class="cat-badge">{{ $service->category->name }}</div>
      @endif
      <div class="svc-icon">
        <i class="bi bi-scissors"></i>
      </div>
      <div class="svc-name">{{ $service->titre }}</div>
      <div class="svc-desc">{{ $service->description ?? 'Service professionnel de qualité, réalisé par nos coiffeurs experts.' }}</div>
      <div class="svc-meta">
        <div class="svc-price">{{ $service->prix }} MAD</div>
        <div class="svc-duration">
          <i class="bi bi-clock"></i>{{ $service->duration }} min
        </div>
      </div>
      <a href="{{ route('client.reservation', ['service' => $service->id]) }}"
         class="btn-g w-100 mt-3 justify-content-center">
        <i class="bi bi-calendar-plus"></i>Réserver ce service
      </a>
    </div>
  </div>
  @empty
  <div class="col-12">
    <div style="text-align:center;padding:4rem;color:var(--muted)">
      <i class="bi bi-scissors" style="font-size:3rem;display:block;margin-bottom:1rem;color:rgba(201,168,76,0.3)"></i>
      <div style="font-family:'Playfair Display',serif;font-size:1.2rem;color:var(--white);margin-bottom:0.5rem">Aucun service disponible</div>
      <div style="font-size:0.87rem">Revenez bientôt, de nouveaux services seront ajoutés.</div>
    </div>
  </div>
  @endforelse
</div>
@endsection
