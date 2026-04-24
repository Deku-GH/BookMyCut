@extends('layouts.client')

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

        .table-luxe td:first-child {
            border-radius: 12px 0 0 12px;
        }

        .table-luxe td:last-child {
            border-radius: 0 12px 12px 0;
        }

        /* Pills de Statut */
        .status-badge {
            padding: 6px 14px;
            border-radius: 100px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .st-confirm {
            background: rgba(201, 168, 76, 0.1);
            color: var(--gold);
            border: 1px solid rgba(201, 168, 76, 0.2);
        }

        .st-upcoming {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .st-done {
            background: rgba(34, 197, 94, 0.1);
            color: #22c55e;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        .st-cancel {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

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
    <div class="tc overflow-hidden">
        <div class="th d-flex justify-content-between align-items-center p-4 border-bottom border-white border-opacity-5">
            <h6 class="mb-0 fw-bold text-white" style="font-family: 'Playfair Display', serif;">
                <i class="bi bi-list-ul me-2 text-gold"></i>Your Réservations
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

                            <td class="ps-4 small" style="font-family: monospace;">
                                #{{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}
                            </td>

                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="fw-medium">
                                        {{ $booking->user->ferstname }} {{ $booking->user->lastname }}
                                    </div>
                                </div>
                            </td>

                            <td>
                                <span class="badge"
                                    style="background: rgba(254, 127, 1, 0.95); color: var(--white); border: 1px solid var(--border); font-weight: 400; padding: 6px 12px;">
                                    {{ $booking->service->titre }}
                                </span>
                            </td>

                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-clock text-gold" style="font-size: 0.8rem;"></i>
                                    <span>{{ $booking->timeSlot->start_time }}</span>
                                </div>
                            </td>

                            <td>
                                <form action="{{ route('barber.booking.update', $booking->id) }}" method="POST"
                                    class="d-flex align-items-center gap-2 m-0">

                                    @csrf
                                    @method('PUT')


                                    <select name="status"
                                        class="form-select form-select-sm bg-transparent  border-secondary shadow-none m-0"
                                        style="background-color:black; width: auto; border-radius: 8px; cursor: pointer;">

                                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>
                                            ⏳ En attente
                                        </option>
                                        <option style="color: black;" value="canceled" {{ $booking->status == 'canceled' ? 'selected' : '' }}>
                                            ❌ Annulé
                                        </option>

                                    </select>

                                    <button type="submit" class="btn btn-sm btn-primary m-0">
                                        Update
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="text-center py-5">
                                    <i class="bi bi-inbox mb-3 d-block opacity-25"
                                        style="font-size: 3rem; color: var(--black);"></i>
                                    <p class="text-muted">Aucune réservation pour le moment.</p>
                                    <a href="{{ route('barber.dashboard') }}" class="btn btn-sm px-4"
                                        style="background: var(--gold); color: var(--dark); border-radius: 6px; font-weight: 600;">
                                        Actualiser
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <h6 class="mb-4 fw-bold text-white" style="font-family: 'Playfair Display', serif;">
                <i class="bi bi-star-fill me-2 text-gold"></i>Évaluer vos services passés
            </h6>
            <div class="row g-3">
                @foreach($bookings as $b)
                    <div class="col-md-4">
                        <div class="filter-card p-3 shadow-sm"
                            style="background: var(--dark-card); border: 1px solid var(--gold-dim);">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="text-gold small fw-bold">#{{ $b->id}}</span>
                                    <h6 class="text-white mb-1 mt-1">{{ $b->service->titre }}</h6>
                                    <p class="text-black small mb-2"><i class="bi bi-clock me-1"></i> Terminé le
                                        {{ $b->timeSlot->start_time }}
                                    </p>
                                </div>
                                <span class="status-badge st-done">Terminé</span>
                            </div>
                            <button class="btn btn-sm w-100 mt-2"
                                style="background: var(--gold); color: black; font-weight: 600;" data-bs-toggle="modal"
                                data-bs-target="#ratingModal{{ $b->id }}">
                                <i class="bi bi-chat-left-heart me-1"></i> Laisser un avis
                            </button>
                        </div>
                    </div>

                    <div class="modal fade" id="ratingModal{{ $b->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0" style="background: #15181f; border-radius: 20px;">
                                <div class="modal-header border-bottom border-white border-opacity-5">
                                    <h5 class="modal-title text-white">Évaluer : {{ $b->service->titre }}</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="text-center mb-4">
                                            <label class="text-muted d-block mb-2">Votre note</label>
                                            <div class="rating-stars fs-2" style="color: var(--gold); cursor: pointer;">

                                                <i class="bi bi-star-fill" data-value="1"></i>
                                                <i class="bi bi-star-fill" data-value="2"></i>
                                                <i class="bi bi-star-fill" data-value="3"></i>
                                                <i class="bi bi-star-fill" data-value="4"></i>
                                                <i class="bi bi-star-fill" data-value="5"></i>

                                                <input type="hidden" name="rating" id="rating" value="5">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-white small mb-2">Votre commentaire</label>
                                            <textarea name="comment" class="form-control bg-dark border-secondary text-white"
                                                rows="3" placeholder="Parlez-nous de votre expérience..."
                                                style="border-radius: 12px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top border-white border-opacity-5">
                                        <button type="button" class="btn btn-sm text-white"
                                            data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-sm"
                                            style="background: var(--gold); color: black; font-weight: 600;">Envoyer
                                            l'avis</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
        <script>
            const stars = document.querySelectorAll('.rating-stars i');
            const ratingInput = document.getElementById('rating');

            stars.forEach(star => {

                star.addEventListener('click', function () {

                    let value = this.dataset.value;

                    ratingInput.value = value;

                    stars.forEach(s => {
                        s.classList.remove('bi-star-fill');
                        s.classList.add('bi-star');
                    });

                    for (let i = 0; i < value; i++) {
                        stars[i].classList.remove('bi-star');
                        stars[i].classList.add('bi-star-fill');
                    }
                });

            });
        </script>
@endsection