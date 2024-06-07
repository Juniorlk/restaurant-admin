@extends('layout.app')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Liste des plats</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Liste des plats</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card alert">
                            <div class="card-header">
                                <a href="{{ Route('ajout_plat') }}">
                                    <button type="button" class="btn btn-warning btn-block m-b-10"><strong>Ajouter un plat</strong></button>
                                </a>
                                <br>
                                <div class="row">
                                    <form method="GET" action="{{ route('liste_plat') }}" class="position-relative col-lg-10">
                                        <div class="search-type col-lg-8">
                                            <input class="form-control input-rounded" type="search" name="search" placeholder="Recherche par Nom, Type" aria-label="Search" value="{{ request('search') }}" />
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="submit" class="btn btn-primary">Rechercher</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nom</th>
                                                <th>Photos</th>
                                                <th>Prix</th>
                                                <th>Allergenes</th>
                                                <th>Type de plat</th>
                                                <th>Description</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($plats as $plat)
                                                <tr>
                                                    <td>{{ $plat->Id_Plat }}</td>
                                                    <td>{{ $plat->Nom }}</td>
                                                    <td>
                                                        @php
                                                            $images = json_decode($plat->Photos);
                                                            $firstImage = $images ? asset('storage/' . $images[0]) : asset('assets/images/3.jpg');
                                                        @endphp
                                                        <img src="{{ $firstImage }}" class="img-fluid" alt="{{ $plat->Nom }}" width="100" height="100" />
                                                    </td>
                                                    <td class="color-primary">{{ $plat->Prix }}</td>
                                                    <td>{{ $plat->Allergenes }}</td>
                                                    <td>{{ $plat->Type_plat }}</td>
                                                    <td>{{ $plat->Description }}</td>
                                                    <td>
                                                        <a href="/update_plat/{{ $plat->Id_Plat }}" class="btn btn-warning btn-rounded m-b-10 m-l-5">Update</a>
                                                        <a href="/delete_plat/{{ $plat->Id_Plat }}" class="btn btn-danger btn-rounded m-b-10 m-l-5">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="page-nation text-center">
                                                {{ $plats->appends(request()->query())->links('vendor.pagination.default') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
@endsection
