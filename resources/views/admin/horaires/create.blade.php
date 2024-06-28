@extends('layout.app')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Ajouter un nouvel horaire</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Ajouter un horaire</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <form action="{{ route('horaires.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="Jour">Jour</label>
                                            <select class="form-control" id="Jour" name="Jour" required>
                                                <option value="Lundi" >Lundi</option>
                                                <option value="Mardi" >Mardi</option>
                                                <option value="Mercredi">Mercredi</option>
                                                <option value="Jeudi">Jeudi</option>
                                                <option value="Vendredi">Vendredi</option>
                                                <option value="Samedi">Samedi</option>
                                                <option value="Dimanche">Dimanche</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Heure_debut">Heure_debut</label>
                                            <input type="time" class="form-control" id="Heure_debut" name="Heure_debut"  required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Heure_fin">Heure_fin</label>
                                            <input type="time" class="form-control" id="Heure_fin" name="Heure_fin"  required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
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
