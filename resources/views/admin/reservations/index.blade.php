@extends('layout.app')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Liste des reservations</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Reservations</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header text-center">
                                    <a href="{{ Route('reservations.create') }}">
                                        <button type="button" class="btn btn-addon m-b-10" style="background-color: #1bac4b"><strong style="color: white"><i><i class="fa fa-plus"></i></i>AJOUTER UN RESERVATION</strong></button>
                                    </a>
                                    <br>
                                    <br>
                                    <hr>
                                </div>
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <a href="{{ route('reservations.index', ['type' => 'all']) }}">
                                                <button type="button" class="btn btn-warning">Liste Complète</button>
                                            </a>
                                        </div>
                                        <form method="GET" action="{{ route('reservations.index') }}" class="position-relative col-lg-10">
                                            <div class="search-type col-lg-8">
                                                <input class="form-control input-rounded" type="search" name="search" placeholder="Recherche par Nom" aria-label="Search" value="{{ request('search') }}" />
                                                {{-- <input type="hidden" name="type" value="{{ $type }}"> --}}
                                            </div>
                                            <div class="col-lg-2"><button type="submit" class="btn btn-primary">Rechercher</button></div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <div class="card-header">
                                    <p><strong>filtrer par :</strong></p>
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <a href="{{ route('reservations.index', ['type' => 'rejected']) }}">
                                                <button type="button" class="btn btn-danger btn-outline">Reservations Rejetées</button>
                                            </a>
                                        </div>
                                        <div class="col-lg-2">
                                            <a href="{{ route('reservations.index', ['type' => 'accepted']) }}">
                                                <button type="button" class="btn btn-success btn-outline">Reservations Acceptées</button>
                                            </a>
                                        </div>
                                        <div class="col-lg-2">
                                            <a href="{{ route('reservations.index', ['type' => 'pending']) }}">
                                                <button type="button" class="btn btn-warning btn-outline">Reservations en Attente</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Noms & Prénoms du client</th>
                                                    <th>Mode de Paiement</th>
                                                    <th>Prix</th>
                                                    <th>Date & heure</th>
                                                    <th>Statut</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reservations as $reservation)
                                                    <tr>
                                                        <td>{{ $reservation->Id_Reservation }}</td>
                                                        <td class="customer">{{ $reservation->client->Prenom }} {{ $reservation->client->Nom }}</td>
                                                        <td>{{ $reservation->Mode_paiement }}</td>
                                                        <td class="color-primary">{{ $reservation->Prix }} FCFA</td>
                                                        <td>{{ $reservation->Date_heure }}</td>
                                                        <td>
                                                            @if ($reservation->Statut == 0)
                                                                <span class="label label-warning">En cours</span>
                                                            @elseif ($reservation->Statut == 1)
                                                                <span class="label label-success">Confirmé</span>
                                                            @else
                                                                <span class="label label-danger">Rejeté</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('reservations.edit', $reservation->Id_Reservation) }}" class="btn btn-primary btn-outline">Modifier</a>
                                                            <button class="btn btn-success btn-outline" data-toggle="modal" data-target="#modalReservation{{ $reservation->Id_Reservation }}">Consulter la Reservation</button>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modalReservation{{ $reservation->Id_Reservation }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Détails de la Reservation #{{ $reservation->Id_Reservation }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h4>Informations du Client</h4>
                                                                    <p><strong>Nom: </strong>{{ $reservation->client->Nom }}</p>
                                                                    <p><strong>Prénom: </strong>{{ $reservation->client->Prenom }}</p>
                                                                    <p><strong>Email: </strong>{{ $reservation->client->Email }}</p>
                                                                    <p><strong>Téléphone: </strong>{{ $reservation->client->Telephone }}</p>

                                                                    {{-- <h4>Plats Commandés</h4>
                                                                    @if ($reservation->plats->count() > 0)
                                                                        <ul>
                                                                            @foreach ($reservation->plats as $plat)
                                                                                <ol>
                                                                                    <li>{{ $plat->Nom }}</li>
                                                                                    <li>{{ $plat->Prix }} FCFA</li>
                                                                                    <li>Quantité: {{ $plat->pivot->quantite }}</li>
                                                                                    <li>Total: {{ $plat->Prix * $plat->pivot->quantite }} FCFA</li>
                                                                                </ol>
                                                                                <hr>
                                                                                <li>{{ $plat->Nom }} - {{ $plat->pivot->quantite }} x {{ $plat->Prix }} FCFA</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @else
                                                                        <p>Aucun plat commandé.</p>
                                                                    @endif --}}

                                                                    <h4>Détails de la Reservation</h4>
                                                                    <p><strong>Mode de Paiement: </strong>{{ $reservation->Mode_paiement }}</p>
                                                                    <p><strong>Prix Total: </strong>{{ $reservation->Prix }} FCFA</p>
                                                                    <p><strong>Date et Heure: </strong>{{ $reservation->Date_heure }}</p>
                                                                    <p><strong>Statut: </strong>

                                                                        @if ($reservation->Statut == 0)
                                                                            <span class="label label-warning">En cours</span>
                                                                        @elseif ($reservation->Statut == 1)
                                                                            <span class="label label-success">Confirmé</span>
                                                                        @else
                                                                            <span class="label label-danger">Rejeté</span>
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form id="reservationForm{{ $reservation->Id_Reservation }}" action="{{ route('reservations.update', $reservation->Id_Reservation) }}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="button" class="btn btn-success" onclick="submitForm('{{ $reservation->Id_Reservation }}', 'confirmer', '{{ $reservation->client->Nom }}')">Confirmer la Reservation</button>
                                                                        <button type="button" class="btn btn-danger" onclick="submitForm('{{ $reservation->Id_Reservation }}', 'rejeter', '{{ $reservation->client->Nom }}')">Rejeter la Reservation</button>
                                                                    </form>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="page-nation text-center">
                                                    {{ $reservations->appends(request()->query())->links('vendor.pagination.default') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    <script>
        function submitForm(reservationId, action, nomClient) {
            var form = $('#reservationForm' + reservationId);
            var url = form.attr('action');

            $.ajax({
                url: url,
                type: 'POST',
                data: form.serialize() + '&action=' + action,
                success: function(response) {
                    alert('Reservation de Mr/Mme/Mlle ' + nomClient + ' est ' + action + ' avec succès.');
                    location.reload();  // Reload the page to reflect changes
                },
                error: function(xhr) {
                    alert('Une erreur s\'est produite. Veuillez réessayer.');
                }
            });
        }
    </script>
@endsection
