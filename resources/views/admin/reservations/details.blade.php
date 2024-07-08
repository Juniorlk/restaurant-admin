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
                                    <h3>Détails d'une reservation</h3>
                                </div>

                                <div class="container">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                {{-- <th>Jour</th> --}}
                                                <th>Heure</th>
                                                <th>Table</th>
                                                <th>Client</th>
                                                <th>Nombre de personnes</th>
                                                <th>Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    {{-- <td>{{ $reservation->horaire->Jour }}</td> --}}
                                                    <td>{{ $reservation->horaire->Heure_debut }} - {{ $reservation->horaire->Heure_fin }}</td>
                                                    <td>Table {{ $reservation->table->Numero_de_table }}</td>
                                                    <td>{{ $reservation->client->Nom }}</td>
                                                    <td>{{ $reservation->Nombre_personnes }}</td>
                                                    <td>{{ $reservation->Statut }}</td>
                                                    <td>
                                                        @if ($reservation->paiement == 1)
                                                            Payé
                                                        @else
                                                            Non payé
                                                        @endif
                                                    </td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


@endsection
