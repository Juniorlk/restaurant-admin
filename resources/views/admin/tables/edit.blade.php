@extends('layout.app')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Modifier la table</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Modifier la table</li>
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
                                    <form action="{{ route('tables.update', $table->Id_Table) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="Numero_de_table">Numéro de table</label>
                                            <input type="text" class="form-control" id="Numero_de_table" name="Numero_de_table" value="{{ $table->Numero_de_table }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Capacite">Capacité</label>
                                            <input type="number" class="form-control" id="Capacite" name="Capacite" value="{{ $table->Capacite }}" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
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
