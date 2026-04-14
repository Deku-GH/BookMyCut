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
        <div class="col-md-4 col-xl-3">
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
                <div class="sc-lbl">RDV</div>
            </div>
        </div>
        <div class="admin-card mt-4">

            <div class="admin-card-header d-flex justify-content-between align-items-center">
                <h6 class="font-playfair text-white mb-0">
                    <i class="bi bi-clock-history me-2 text-gold"></i>Dernières Inscriptions
                </h6>
                <a href="{{ route('admin.users') }}" class="btn-link-gold">Voir tout</a>
            </div>


            <div class="table-responsive">
                <table class="table-minimal">
                    <thead>
                        <tr>
                            <th>Utilisateur</th>
                            <th>Rôle</th>
                            <th class="text-end">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($latestUsers as $u)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="avatar-sm">
                                            {{ strtoupper(substr($u->ferstname, 0, 1)) }}
                                        </div>
                                        <div class="user-details">
                                            <span class="d-block text-white fw-bold">{{ $u->firstname }}
                                                {{ $u->lastname }}</span>
                                            <span class=" tiny">{{ $u->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="role-text ">
                                        {{ $u->role->name  }}
                                    </span>
                                </td>
                                <td class="text-end text-white tiny">
                                    {{ $u->created_at->diffForHumans() }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted small">Aucun utilisateur récent.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="admin-card mt-4">

            <div class="admin-card-header d-flex justify-content-between align-items-center">
                <h6 class="font-playfair text-white mb-0">
                    <i class="bi bi-clock-history me-2 text-gold"></i>Dernières Inscriptions
                </h6>
                <a href="{{ route('admin.users') }}" class="btn-link-gold">Voir tout</a>
            </div>

            <div class="table-responsive">
                <table class="table-minimal">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>description</th>
                            <th class="text-end">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $c)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="avatar-sm">
                                            {{ strtoupper(substr($c->name, 0, 1)) }}
                                        </div>
                                        <div class="user-details">
                                            <span class="d-block text-white fw-bold">{{ $u->firstname }}
                                                {{ $c->name }}</span>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="role-text ">
                                        {{ $c->description  }}
                                    </span>
                                </td>
                                <td class="text-end text-white tiny">
                                    {{ $u->created_at->diffForHumans() }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted small">Aucun utilisateur récent.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>


@endsection