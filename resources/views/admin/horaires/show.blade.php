@extends('layout.app')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Détails de la table</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Détails de la table</li>
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
                                    <div class="form-group">
                                        <label for="Numero_de_table">Numéro de table</label>
                                        <input type="text" class="form-control" id="Numero_de_table" value="{{ $table->Numero_de_table }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="Capacite">Capacité</label>
                                        <input type="number" class="form-control" id="Capacite" value="{{ $table->Capacite }}" readonly>
                                    </div>
                                    <a href="{{ route('tables.edit', $table->Id_Table) }}" class="btn btn-success">Modifier</a>
                                    <form action="{{ route('tables.destroy', $table->Id_Table) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
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
