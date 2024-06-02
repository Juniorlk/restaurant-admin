@extends('layout.app')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>LISTE DES CLIENTS</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">liste des clients</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->

                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">

                                    <!-- <button type="button" class="btn btn-primary btn-rounded m-b-10 m-l-150">Ajouter un client</button>-->
                                    <br>
                                    <div class="bootstrap-data-table-panel">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nom</th>
                                                        <th>Prenom</th>
                                                        <th>Email</th>
                                                        <th>Téléphone</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($clients as $client)
                                                        <tr>
                                                            <td>{{ $client->Id_Client }}</td>
                                                            <td>{{ $client->Nom }}</td>
                                                            <td>{{ $client->Prenom }}</td>
                                                            <td>{{ $client->AdresseMail }}</td>
                                                            <td>{{ $client->Telephone }}</td>
                                                            <td>
                                                                {{-- <a href="/update_client/{{ $client->Id_client }}">
                                                                    <button class="btn btn-warning   btn-addon m-b-10 m-l-5"><i class="ti-pencil"></i>Modifier</button>
                                                                </a> --}}
                                                                <a href="/delete-client/{{ $client->Id_Client }}">
                                                                    <button class="btn btn-danger  btn-addon m-b-10 m-l-5"><i class="ti-trash"></i>Supprimer</button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="page-nation text-center">
                                                        {{ $clients->links('vendor.pagination.default') }}
                                                    </div>
                                                </div>
                                            </div>
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
