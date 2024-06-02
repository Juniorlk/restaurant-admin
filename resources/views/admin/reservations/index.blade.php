@extends('layout.app')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Liste des réservations</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Réservations</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Liste des réservations</h4>
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
                                                    <th>Date & Heure</th>
                                                    <th>Table</th>
                                                    <th>Nombre de personnes</th>
                                                    <th>Statut</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reservations as $reservation)
                                                    <tr>
                                                        <td>{{ $reservation->Id_Reservation }}</td>
                                                        <td>{{ $reservation->client->Prenom }} {{ $reservation->client->Nom }}</td>
                                                        <td>{{ $reservation->Mode_paiement }}</td>
                                                        <td>{{ $reservation->Date_heure }}</td>
                                                        <td>{{ $reservation->table->Numero_de_table }}</td>
                                                        <td>{{ $reservation->Nombre_personnes }}</td>
                                                        <td>
                                                            @if ($reservation->Statut == 'en_cours')
                                                                <span class="label label-warning">En cours</span>
                                                            @elseif ($reservation->Statut == 'confirmé')
                                                                <span class="label label-success">Confirmé</span>
                                                            @else
                                                                <span class="label label-danger">Annulé</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-success btn-outline" data-toggle="modal" data-target="#modalReservation{{ $reservation->Id_Reservation }}">Consulter la Réservation</button>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modalReservation{{ $reservation->Id_Reservation }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Détails de la Réservation #{{ $reservation->Id_Reservation }}</h5>
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

                                                                    <h4>Détails de la Réservation</h4>
                                                                    <p><strong>Mode de Paiement: </strong>{{ $reservation->Mode_paiement }}</p>
                                                                    <p><strong>Date et Heure: </strong>{{ $reservation->Date_heure }}</p>
                                                                    <p><strong>Table: </strong>{{ $reservation->table->Numero_de_table }}</p>
                                                                    <p><strong>Nombre de personnes: </strong>{{ $reservation->Nombre_personnes }}</p>
                                                                    <p><strong>Statut: </strong>
                                                                        @if ($reservation->Statut == 'en_cours')
                                                                            En cours
                                                                        @elseif ($reservation->Statut == 'confirmé')
                                                                            Confirmé
                                                                        @else
                                                                            Annulé
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form id="reservationForm{{ $reservation->Id_Reservation }}" action="{{ route('reservations.update', $reservation->Id_Reservation) }}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="button" class="btn btn-success" onclick="submitForm('{{ $reservation->Id_Reservation }}', 'confirmé', '{{ $reservation->client->Nom }}')">Confirmer la Réservation</button>
                                                                        <button type="button" class="btn btn-danger" onclick="submitForm('{{ $reservation->Id_Reservation }}', 'annulé', '{{ $reservation->client->Nom }}')">Annuler la Réservation</button>
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
                                                    {{ $reservations->links('vendor.pagination.default') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>This dashboard was generated on <span id="date-time"></span> <a href="#"
                                        class="page-refresh">Refresh Dashboard</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        function submitForm(reservationId, action, nomClient) {
            var form = $('#reservationForm' + reservationId);
            var url = form.attr('action');

            $.ajax({
                url: url,
                type: 'POST',
                data: form.serialize() + '&action=' + action,
                success: function(response) {
                    alert('Réservation de Mr/Mme/Mlle '+ nomClient +' est ' + action + ' avec succès.');
                    location.reload();  // Reload the page to reflect changes
                },
                error: function(xhr) {
                    alert('Une erreur s\'est produite. Veuillez réessayer.');
                }
            });
        }
    </script>
@endsection
