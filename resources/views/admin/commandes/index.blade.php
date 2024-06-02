@extends('layout.app')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Liste des commandes</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Commandes</li>
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
                                    <h4>Liste des commandes</h4>
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
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($commandes as $commande)
                                                    <tr>
                                                        <td>{{ $commande->Id_Commande }}</td>
                                                        <td>{{ $commande->client->Prenom }} {{ $commande->client->Nom }}</td>
                                                        <td>{{ $commande->Mode_paiement }}</td>
                                                        <td class="color-primary">{{ $commande->Prix }} FCFA</td>
                                                        <td>{{ $commande->Date_heure }}</td>
                                                        <td>
                                                            @if ($commande->Statut == 0)
                                                                <span class="label label-warning">En cours</span>
                                                            @elseif ($commande->Statut == 1)
                                                                <span class="label label-success">Livré</span>
                                                            @else
                                                                <span class="label label-danger">Rejecté</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-success btn-outline" data-toggle="modal" data-target="#modalCommande{{ $commande->Id_Commande }}">Consulter la Commande</button>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modalCommande{{ $commande->Id_Commande }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Détails de la Commande #{{ $commande->Id_Commande }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h4>Informations du Client</h4>
                                                                    <p><strong>Nom: </strong>{{ $commande->client->Nom }}</p>
                                                                    <p><strong>Prénom: </strong>{{ $commande->client->Prenom }}</p>
                                                                    <p><strong>Email: </strong>{{ $commande->client->Email }}</p>
                                                                    <p><strong>Téléphone: </strong>{{ $commande->client->Telephone }}</p>

                                                                    <h4>Plats Commandés</h4>
                                                                    @if ($commande->plats)
                                                                        <ul>
                                                                            @foreach ($commande->plats as $plat)
                                                                                <li>{{ $plat->Nom }} - {{ $plat->pivot->quantite }} x {{ $plat->Prix }} FCFA</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @else
                                                                        <p>Aucun plat commandé.</p>
                                                                    @endif

                                                                    <h4>Détails de la Commande</h4>
                                                                    <p><strong>Mode de Paiement: </strong>{{ $commande->Mode_paiement }}</p>
                                                                    <p><strong>Prix Total: </strong>{{ $commande->Prix }} FCFA</p>
                                                                    <p><strong>Date et Heure: </strong>{{ $commande->Date_heure }}</p>
                                                                    <p><strong>Statut: </strong>
                                                                        @if ($commande->Statut == 0)
                                                                            En cours
                                                                        @elseif ($commande->Statut == 1)
                                                                            Livré
                                                                        @else
                                                                            Rejeté
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form id="commandeForm{{ $commande->Id_Commande }}" action="{{ route('commandes.update', $commande->Id_Commande) }}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="button" class="btn btn-success" onclick="submitForm('{{ $commande->Id_Commande }}', 'livrer', '{{ $commande->client->Nom }}')">Confirmer la Commande</button>
                                                                        <button type="button" class="btn btn-danger" onclick="submitForm('{{ $commande->Id_Commande }}', 'rejeter', '{{ $commande->client->Nom }}')">Rejeter la Commande</button>
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
                                                    {{ $commandes->links('vendor.pagination.default') }}
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
        function submitForm(commandeId, action, nomClient) {
            var form = $('#commandeForm' + commandeId);
            var url = form.attr('action');

            $.ajax({
                url: url,
                type: 'POST',
                data: form.serialize() + '&action=' + action,
                success: function(response) {
                    alert('Commande de Mr/Mme/Mlle '+ nomClient+' est ' + action + ' avec succès.');
                    location.reload();  // Reload the page to reflect changes
                },
                error: function(xhr) {
                    alert('Une erreur s\'est produite. Veuillez réessayer.');
                }
            });
        }
    </script>
@endsection
