@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Analyse des données')

@section('content')

    {{-- FLASH MESSAGES --}}
    @if(session('success'))
        <div class="alert-ok"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
    @endif
    
    @if($errors->any())
        <div class="alert-err">
            <div>
                @foreach($errors->all() as $e)
                    <p class="mb-0"><i class="bi bi-exclamation-circle me-2"></i>{{ $e }}</p>
                @endforeach
            </div>
        </div>
    @endif

    {{-- OVERVIEW STATS --}}
    <div class="row g-4">
        <div class="col-md-4 col-xl-2">
            <div class="sc">
                <div class="accent" style="background:var(--gold)"></div>
                <div class="sc-ico g"><i class="bi bi-people-fill"></i></div>
                <div class="sc-val">{{ $totalClients ?? 0 }}</div>
                <div class="sc-lbl">Clients</div>
            </div>
        </div>

        <div class="col-md-4 col-xl-2">
            <div class="sc">
                <div class="accent" style="background:var(--purple)"></div>
                <div class="sc-ico p"><i class="bi bi-scissors"></i></div>
                <div class="sc-val">{{ $totalBarbers ?? 0 }}</div>
                <div class="sc-lbl">Coiffeurs</div>
            </div>
        </div>

        <div class="col-md-4 col-xl-2">
            <div class="sc">
                <div class="accent" style="background:var(--blue)"></div>
                <div class="sc-ico b"><i class="bi bi-tag"></i></div>
                <div class="sc-val">{{ $totalCategories ?? 0 }}</div>
                <div class="sc-lbl">Catégories</div>
            </div>
        </div>

        <div class="col-md-4 col-xl-2">
            <div class="sc">
                <div class="accent" style="background:var(--green)"></div>
                <div class="sc-ico gr"><i class="bi bi-list-stars"></i></div>
                <div class="sc-val">{{ $totalServices ?? 0 }}</div>
                <div class="sc-lbl">Services</div>
            </div>
        </div>

        <div class="col-md-4 col-xl-2">
            <div class="sc">
                <div class="accent" style="background:var(--orange)"></div>
                <div class="sc-ico o"><i class="bi bi-calendar-check"></i></div>
                <div class="sc-val">{{ $totalBookings ?? 0 }}</div>
                <div class="sc-lbl">RDV Mois</div>
            </div>
        </div>

        <div class="col-md-4 col-xl-2">
            <div class="sc">
                <div class="accent" style="background:var(--red)"></div>
                <div class="sc-ico r"><i class="bi bi-person-fill-lock"></i></div>
                <div class="sc-val">{{ $totalAdmins ?? 0 }}</div>
                <div class="sc-lbl">Admins</div>
            </div>
        </div>
    </div>

    {{-- ADD TABLES OR CHARTS BELOW THIS ROW --}}

@endsection