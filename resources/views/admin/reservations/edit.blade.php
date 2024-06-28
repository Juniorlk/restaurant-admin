@extends('layout.app')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Modifier Réservation #{{ $reservation->Id_Reservation }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Modifier Réservation</li>
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
                                    <h4>Détails de la Réservation</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" class="form-control" id="date" name="date" value="{{ $reservation->date }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="heure">Heure</label>
                                            <input type="time" class="form-control" id="heure" name="heure" value="{{ $reservation->heure }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="statut">Statut</label>
                                            <select class="form-control" id="statut" name="statut" required>
                                                <option value="en attente" @if($reservation->statut == 'en attente') selected @endif>En attente</option>
                                                <option value="validée" @if($reservation->statut == 'validée') selected @endif>Validée</option>
                                                <option value="annulée" @if($reservation->statut == 'annulée') selected @endif>Annulée</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
