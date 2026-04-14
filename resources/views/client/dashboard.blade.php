@extends('layouts.app')

@section('title', 'Mes Rendez-vous')
@section('page_title', 'Historique & Réservations')

@section('extra_css')
<style>
    /* Filtres et Header */
    .filter-card {
        background: var(--dark-card);
        border: 1px solid var(--dark-border);
        border-radius: 15px;
        padding: 1rem 1.5rem;
        margin-bottom: 2rem;
    }

    .form-select-luxe {
        background-color: var(--dark-bg);
        border: 1px solid var(--dark-border);
        color: var(--text-main);
        border-radius: 10px;
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
    }

    .form-select-luxe:focus {
        border-color: var(--gold);
        box-shadow: none;
        background-color: var(--dark-bg);
        color: white;
    }

    /* Tableau Style Luxe */
    .table-luxe {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    .table-luxe thead th {
        color: var(--text-muted);
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.7rem;
        letter-spacing: 1px;
        padding: 1rem;
        border: none;
    }

    .table-luxe tbody tr {
        background: var(--dark-card);
        transition: transform 0.2s;
    }

    .table-luxe tbody tr:hover {
        transform: scale(1.005);
        background: #1c1f26;
    }

    .table-luxe td {
        padding: 1.2rem 1rem;
        vertical-align: middle;
        border: none;
        font-size: 0.9rem;
    }

    .table-luxe td:first-child { border-radius: 12px 0 0 12px; }
    .table-luxe td:last-child { border-radius: 0 12px 12px 0; }

    /* Pills de Statut */
    .status-badge {
        padding: 6px 14px;
        border-radius: 100px;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
    }
    .st-confirm { background: rgba(201, 168, 76, 0.1); color: var(--gold); border: 1px solid rgba(201, 168, 76, 0.2); }
    .st-upcoming { background: rgba(59, 130, 246, 0.1); color: #3b82f6; border: 1px solid rgba(59, 130, 246, 0.2); }
    .st-done { background: rgba(34, 197, 94, 0.1); color: #22c55e; border: 1px solid rgba(34, 197, 94, 0.2); }
    .st-cancel { background: rgba(239, 68, 68, 0.1); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.2); }

    /* Actions */
    .btn-action {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid var(--dark-border);
        background: var(--dark-bg);
        color: var(--text-muted);
        transition: 0.2s;
    }
    .btn-action:hover {
        border-color: var(--gold);
        color: var(--gold);
    }
</style>
@endsection

@section('content')
<div class="page-section">
    
    <div class="filter-card d-flex flex-wrap justify-content-between align-items-center gap-3">
        <h6 class="m-0 font-playfair fs-5">Journal des réservations</h6>
        <div class="d-flex gap-3 align-items-center">
            <span class="text-muted small">Filtrer par :</span>
            <select class="form-select form-select-luxe">
                <option value="all">Toutes les séances</option>
                <option value="upcoming">À venir</option>
                <option value="past">Historique</option>
                <option value="cancelled">Annulés</option>
            </select>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table-luxe">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Service</th>
                    <th>Date & Heure</th>
                    <th>Durée</th>
                    <th>Prix</th>
                    <th>Statut</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($allBookings as $b)
                <tr>
                    <td class="text-muted">#{{ str_pad($b->id, 3, '0', STR_PAD_LEFT) }}</td>
                    <td>
                        <div class="fw-bold">{{ $b->service->titre }}</div>
                        <div class="small text-muted">{{ $b->barber->user->firstname ?? 'Expert' }}</div>
                    </td>
                    <td>
                        <div>{{ \Carbon\Carbon::parse($b->date)->format('D d M Y') }}</div>
                        <div class="small text-gold">{{ \Carbon\Carbon::parse($b->time)->format('H\hi') }}</div>
                    </td>
                    <td>{{ $b->service->duree ?? '30' }} min</td>
                    <td class="fw-bold text-white">{{ $b->service->prix }} MAD</td>
                    <td>
                        @php
                            $status = match($b->status) {
                                'pending' => ['st-confirm', 'Confirmé'],
                                'upcoming' => ['st-upcoming', 'À venir'],
                                'done' => ['st-done', 'Terminé'],
                                'cancelled' => ['st-cancel', 'Annulé'],
                                default => ['st-upcoming', $b->status]
                            };
                        @endphp
                        <span class="status-badge {{ $status[0] }}">{{ $status[1] }}</span>
                    </td>
                    <td class="text-end">
                        @if($b->status == 'upcoming' || $b->status == 'pending')
                            <a href="#" class="btn-action" title="Modifier"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('client.rdv.cancel', $b->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Annuler ce rendez-vous ?')">
                                @csrf @method('PATCH')
                                <button type="submit" class="btn-action text-danger" title="Annuler"><i class="bi bi-x-lg"></i></button>
                            </form>
                        @else
                            <span class="text-muted small">—</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <i class="bi bi-calendar-x d-block fs-1 text-muted mb-3"></i>
                        <p class="text-muted">Aucune réservation trouvée.</p>
                        <a href="{{ route('client.reservation') }}" class="btn-gold btn-sm mt-2">Prendre rendez-vous</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection