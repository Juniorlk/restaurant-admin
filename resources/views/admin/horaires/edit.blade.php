@extends('layout.app')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Modifier Horaire #{{ $horaire->Id_Horaire }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Modifier Horaire</li>
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
                                    <h4>Détails de l'Horaire</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('horaires.update', $horaire->Id_Horaire) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="Jour">Jour</label>
                                            <select class="form-control" id="Jour" name="Jour" required>
                                                <option value="Lundi" @if($horaire->Jour == 'Lundi') selected @endif>Lundi</option>
                                                <option value="Mardi" @if($horaire->Jour == 'Mardi') selected @endif>Mardi</option>
                                                <option value="Mercredi" @if($horaire->Jour == 'Mercredi') selected @endif>Mercredi</option>
                                                <option value="Jeudi" @if($horaire->Jour == 'Jeudi') selected @endif>Jeudi</option>
                                                <option value="Vendredi" @if($horaire->Jour == 'Vendredi') selected @endif>Vendredi</option>
                                                <option value="Samedi" @if($horaire->Jour == 'Samedi') selected @endif>Samedi</option>
                                                <option value="Dimanche" @if($horaire->Jour == 'Dimanche') selected @endif>Dimanche</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Heure_debut">Heure_debut</label>
                                            <input type="time" class="form-control" id="Heure_debut" name="Heure_debut" value="{{ $horaire->Heure_debut }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Heure_fin">Heure_fin</label>
                                            <input type="time" class="form-control" id="Heure_fin" name="Heure_fin" value="{{ $horaire->Heure_fin }}" required>
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
