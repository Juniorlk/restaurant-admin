@extends('layout.app')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
             
                <!-- /# row -->

                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                        <h1>{{ $client->Nom }}</h1>
                                        <p>{{ $client->Prenom }}</p>
                                        <p>{{ $client->AdresseMail }}</p>
                                        <p>{{ $client->Telephone }}</p>
                                        <br>
                                        <h2>Historique des commandes</h2>
                                    <!-- <button type="button" class="btn btn-primary btn-rounded m-b-10 m-l-150">Ajouter un client</button>-->
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
                                                    @empty($orders)
                                                          {{-- afficher un message indiquant qu'il n'y a pas de commandes --}}
                                                          <p class="text-danger">Il n'y a pas de commandes pour ce client.</p>
                                                    @else
                                                        @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->Id_Commande }}</td>
                                                            <td>{{ $order->client->Prenom }} {{ $commande->client->Nom }}</td>
                                                            <td>{{$order->Mode_paiement }}</td>
                                                            <td class="color-primary">{{ $order->Prix }} FCFA</td>
                                                            <td>{{ $order->Date_heure }}</td>
                                                            <td>
                                                                @if ($$order->Statut == 0)
                                                                    <span class="label label-warning">En cours</span>
                                                                @elseif ($$order->Statut == 1)
                                                                    <span class="label label-success">Livré</span>
                                                                @else
                                                                    <span class="label label-danger">Rejecté</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-success btn-outline" data-toggle="modal" data-target="#modalCommande{{ $commande->Id_Commande }}">Consulter la Commande</button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        
                                                    @endempty
                                                  
                                                </tbody>
                                            </table>
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
    </div>

    <div id="search">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
@endsection
