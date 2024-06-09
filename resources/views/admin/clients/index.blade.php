@extends('layout.app')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>LISTE DES CLIENTS</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Liste des clients</li>
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
                                    <br>
                                    <div class="bootstrap-data-table-panel">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Email</th>
                                                        <th>Téléphone</th>
                                                        <th colspan="3">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($clients as $client)
                                                        <tr>
                                                            <td>{{ $client->Id_Client }}</td>
                                                            <td>{{ $client->Nom }}</td>
                                                            <td>{{ $client->Prenom }}</td>
                                                            <td>{{ $client->AdresseMail }}</td>
                                                            <td>{{ $client->Telephone }}</td>
                                                            <td>
                                                                <button class="btn btn-warning btn-addon m-b-5 m-r-5" data-toggle="modal" data-target="#modalClient{{ $client->Id_Client }}">
                                                                    <i class="ti-pencil"></i>Consulter
                                                                </button>
                                                            </td>
                                                            <td>
                                                                @if ($client->Statut == 'actif')
                                                                    <a href="{{ route('clients.desactiver', $client) }}">
                                                                        <button class="btn btn-dark btn-addon m-b-5 m-r-5"><i class="ti-thumb-down"></i>Désactiver</button>
                                                                    </a>
                                                                @else
                                                                    <a href="{{ route('clients.reactiver', $client) }}">
                                                                        <button class="btn btn-info btn-addon m-b-5 m-r-5"><i class="ti-thumb-up"></i>Réactiver</button>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="/delete-client/{{ $client->Id_Client }}">
                                                                    <button class="btn btn-danger btn-addon m-b-5 m-l-5"><i class="ti-trash"></i>Supprimer</button>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <!-- Modal for Client Details -->
                                                        <div class="modal fade" id="modalClient{{ $client->Id_Client }}" tabindex="-1" role="dialog" aria-labelledby="modalLabelClient{{ $client->Id_Client }}" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalLabelClient{{ $client->Id_Client }}">Détails du client #{{ $client->Id_Client }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h4>Informations du Client</h4>
                                                                        <p><strong>Nom: </strong>{{ $client->Nom }}</p>
                                                                        <p><strong>Prénom: </strong>{{ $client->Prenom }}</p>
                                                                        <p><strong>Email: </strong>{{ $client->AdresseMail }}</p>
                                                                        <p><strong>Téléphone: </strong>{{ $client->Telephone }}</p>

                                                                        <h4>Historique des Commandes</h4>
                                                                        @php
                                                                            $commandes = $client->commandes->where('Statut', 1); // Assuming you have a relationship set up in the Client model
                                                                        @endphp
                                                                        @if ($commandes->isNotEmpty())
                                                                            <ul>
                                                                                @foreach ($commandes as $commande)
                                                                                    <li>Commande #{{ $commande->Id_Commande }} - {{ $commande->Mode_paiement }} - {{ $commande->Prix }} FCFA - {{ $commande->Date_heure }}</li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @else
                                                                            <p class="color-danger">Aucune commande passée par ce client.</p>
                                                                        @endif
                                                                    </div>
                                                                    <div class="modal-footer">
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
                                                        {{ $clients->links('vendor.pagination.default') }}
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
                                    <p>This dashboard was generated on <span id="date-time"></span> <a href="#" class="page-refresh">Refresh Dashboard</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
