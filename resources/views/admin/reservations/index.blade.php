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
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <a href="{{ route('reservations.index', ['status' => 'all']) }}">
                                                <button type="button" class="btn btn-warning">Liste Complète</button>
                                            </a>
                                        </div>
                                        <form method="GET" action="{{ route('reservations.index') }}" class="position-relative col-lg-10">
                                            <div class="search-type col-lg-8">
                                                <input class="form-control input-rounded" type="search" name="search" placeholder="Recherche par Nom" aria-label="Search" value="{{ request('search') }}" />
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
                                            <a href="{{ route('reservations.index', ['status' => 'pending']) }}">
                                                <button type="button" class="btn btn-warning btn-outline">En Attente</button>
                                            </a>
                                        </div>
                                        <div class="col-lg-2">
                                            <a href="{{ route('reservations.index', ['status' => 'validated']) }}">
                                                <button type="button" class="btn btn-success btn-outline">Validées</button>
                                            </a>
                                        </div>
                                        <div class="col-lg-2">
                                            <a href="{{ route('reservations.index', ['status' => 'cancelled']) }}">
                                                <button type="button" class="btn btn-danger btn-outline">Annulées</button>
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
                                                    <th>Nom du Client</th>
                                                    <th>Date</th>
                                                    <th>Heure</th>
                                                    <th>Statut</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reservations as $reservation)
                                                    <tr>
                                                        <td>{{ $reservation->Id_Reservation }}</td>
                                                        <td>
                                                            @if ($reservation->client)
                                                                {{ $reservation->client->Nom }} {{ $reservation->client->Prenom }}
                                                            @else
                                                                <em>Client non trouvé</em>
                                                            @endif
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($reservation->Date_heure)->format('d/m/Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($reservation->Date_heure)->format('H:i') }}</td>
                                                        <td>
                                                            @if ($reservation->Statut == 'en attente')
                                                                <span class="label label-warning">En attente</span>
                                                            @elseif ($reservation->Statut == 'validée')
                                                                <span class="label label-success">Validée</span>
                                                            @else
                                                                <span class="label label-danger">Annulée</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('reservations.edit', $reservation->Id_Reservation) }}" class="btn btn-success btn-outline">Modifier</a>
                                                        </td>
                                                    </tr>
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
@endsection
