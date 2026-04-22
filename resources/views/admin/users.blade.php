@extends('layouts.admin')

@section('title', 'Utilisateurs')
@section('page-title', 'Gestion des Utilisateurs')

@section('content')
    <div class="tc border-0 shadow-lg mb-4">
        <div class="th d-flex justify-content-between align-items-center p-4">
            <div>
                <h6 class="mb-0 text-white" style="font-family:'Playfair Display', serif; font-size: 1.25rem;">
                    <i class="bi bi-people me-2 text-gold"></i>Tous les utilisateurs
                </h6>
                <small class="text-white-50">{{ $users->count() }} membres enregistrés</small>
            </div>
            <button class="btn-g"><i class="bi bi-plus-lg me-1"></i> Nouveau</button>
        </div>

        <div class="table-responsive px-2 pb-3">
            <table class="tt w-100">
                <thead>
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Nom & Prénom</th>
                        <th>Contact</th>
                        <th>Rôle</th>
                        <th>Inscrit le</th>
                        <th>Statut</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $i => $u)
                        <tr class="align-middle">
                            <td class="ps-4" style="color:var(--text-muted); font-family: monospace; font-size: 0.8rem;">
                                {{ str_pad($i + 1, 3, '0', STR_PAD_LEFT) }}
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="user-init shadow-sm" style="background: var(--dark3); border: 1px solid var(--border); color: var(--gold); font-weight: bold; width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; border-radius: 10px;">
                                        {{ strtoupper(substr($u->firstname, 0, 1) . substr($u->lastname, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="text-white fw-bold mb-0" style="font-size: 0.9rem;">{{ $u->firstname }} {{ $u->lastname }}</div>
                                        <div class="text-white-50" style="font-size: 0.75rem;">ID: #{{ $u->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-white" style="font-size: 0.85rem;">{{ $u->email }}</div>
                                <div class="text-white-50" style="font-size: 0.75rem;"><i class="bi bi-telephone me-1 small"></i>{{ $u->telephone ?? 'N/A' }}</div>
                            </td>
                            <td>
                                @php 
                                    $rc = match ($u->role->name ?? '') { 
                                        'Admin' => 'pp', 
                                        'Barber' => 'po',
                                        
                                        default => 'pb'   
                                    }; 
                                @endphp
                                <span class="pill {{ $rc }} small px-2 py-1">{{ $u->role->name ?? 'Client' }}</span>
                            </td>
                            <td class="text-white-50" style="font-size: 0.85rem;">
                                {{ $u->created_at->translatedFormat('d M Y') }}
                            </td>
                            <td>
                                @if($u->status == 'Acteve')
                                    <span class="badge rounded-pill bg-success-dim text-success border border-success-subtle" style="font-size: 0.7rem; background: rgba(25, 135, 84, 0.1);">
                                        <i class="bi bi-circle-fill me-1" style="font-size: 0.5rem;"></i> ACTIF
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-danger-dim text-danger border border-danger-subtle" style="font-size: 0.7rem; background: rgba(220, 53, 69, 0.1);">
                                        <i class="bi bi-circle-fill me-1" style="font-size: 0.5rem;"></i> INACTIF
                                    </span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <form action="{{ route('admin.user.update', $u->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="status" value="{{ $u->status == 'Active' ? 'Inactive' : 'Active' }}">
                                    
                                    @if($u->status == 'Active')
                                        <button class="btn btn-sm btn-outline-danger border-0 bg-transparent shadow-none" title="Désactiver">
                                            <i class="bi bi-person-x-fill fs-5"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-sm btn-outline-success border-0 bg-transparent shadow-none" title="Activer">
                                            <i class="bi bi-person-check-fill fs-5"></i>
                                        </button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="py-5 text-center" style="color:var(--text-muted)">
                                    <i class="bi bi-person-exclamation opacity-25" style="font-size: 3.5rem;"></i>
                                    <p class="mt-3 mb-0">Aucun utilisateur trouvé dans la base de données.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection