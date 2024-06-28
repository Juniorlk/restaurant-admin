@extends('layout.app')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Liste des horaires</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Horaires</li>
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
                                            <a href="{{ route('horaires.create') }}">
                                                <button type="button" class="btn btn-primary">Ajouter un horaire</button>
                                            </a>
                                        </div>
                                        <form method="GET" action="{{ route('horaires.index') }}" class="position-relative col-lg-10">
                                            <div class="search-type col-lg-8">
                                                <input class="form-control input-rounded" type="search" name="search" placeholder="Recherche par Jour" aria-label="Search" value="{{ request('search') }}" />
                                            </div>
                                            <div class="col-lg-2"><button type="submit" class="btn btn-primary">Rechercher</button></div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Numéro de table</th>
                                                    <th colspan="2">Creneau horaires</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($horaires as $horaire)
                                                    <tr>
                                                        <td>{{ $horaire->Id_Horaire }}</td>
                                                        <td>{{ $horaire->Jour }}</td>
                                                        <td>{{ $horaire->Heure_debut }}</td>
                                                        <td>{{ $horaire->Heure_fin }}</td>
                                                        <td>
                                                            <a href="{{ route('horaires.edit', $horaire->Id_Horaire) }}" class="btn btn-success btn-outline">Modifier</a>
                                                            <form action="{{ route('horaires.destroy', $horaire->Id_Horaire) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-outline">Supprimer</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="page-nation text-center">
                                                    {{ $horaires->appends(request()->query())->links('vendor.pagination.default') }}
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
