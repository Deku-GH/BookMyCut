@extends('layouts.admin')

@section('title', 'Utilisateurs')
@section('page-title', 'Gestion des Utilisateurs')

@section('content')
    <div class="tc">
        <div class="th">
            <div>
                <h6 class="mb-0" style="font-family:'Playfair Display', serif; font-size: 1.2rem;">
                    <i class="bi bi-people me-2" style="color:var(--gold)"></i>Tous les utilisateurs
                </h6>
                <small style="color:var(--text-muted)">{{ $users->count() }} membres enregistrés</small>
            </div>
            <button class="btn-g"><i class="bi bi-plus-lg me-1"></i> Nouveau</button>
        </div>

        <div class="table-responsive">
            <table class="tt">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom & Prénom</th>
                        <th>Contact</th>
                        <th>Rôle</th>
                        <th>Inscrit le</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $i => $u)
                        <tr>
                            <td style="color:var(--text-muted); font-family: monospace;">
                                {{ str_pad($i + 1, 3, '0', STR_PAD_LEFT) }}
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="user-init">
                                        {{ strtoupper(substr($u->firstname, 0, 1) . substr($u->lastname, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div style="color:var(--text-main); font-weight: 600;">{{ $u->firstname }}
                                            {{ $u->lastname }}
                                        </div>
                                        <div style="font-size: 0.75rem; color: var(--text-muted)">ID: #{{ $u->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div style="color:var(--text-main); font-size: 0.85rem;">{{ $u->email }}</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted)">{{ $u->telephone ?? 'Non renseigné' }}
                                </div>
                            </td>
                            <td>
                                @php $rc = match ($u->role->name ?? '') { 'Admin' => 'pp', 'Barber' => 'po', default => 'pb'}; @endphp
                                <span class="pill {{ $rc }}">{{ $u->role->name ?? 'Client' }}</span>
                            </td>
                            <td style="color:var(--text-muted); font-size: 0.85rem;">
                                {{ $u->created_at->translatedFormat('d M Y') }}
                            </td>
                            <td>
                                <span class="pill {{ $u->status == 'Acteve' ? 'text-success' : 'text-danger' }}">
                                    ●{{ $u->status }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('admin.user.update', $u->id, $u->status) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-sm {{ $u->status == 'Acteve' ? 'btn-danger' : 'btn-success' }}">
                                        {{ $u->status == 'Acteve' ? 'Dexactiver' : 'Actever' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="py-5 text-center" style="color:var(--text-muted)">
                                    <i class="bi bi-person-exclamation" style="font-size: 3rem; opacity: 0.2;"></i>
                                    <p class="mt-3">Aucun utilisateur trouvé dans la base de données.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection