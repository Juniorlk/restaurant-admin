@extends('layout.app')
@section('content')
    <div class="content-wrap">

        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Liste des categories</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Liste des categories</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                @if (session('status'))
                    <div class="alert alert-success " style="color: white">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Liste des plats de la bd -->

                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <a href="{{ Route('categorie.create') }}"><button type="button"
                                            class="btn btn-warning btn-block m-b-10"><strong>Ajouter une Categorie</strong></button></a>
                                    <!-- <button type="button" class="btn btn-primary btn-rounded m-b-10 m-l-150">Ajouter un plat</button>-->
                                    <br>
                                    <div class="bootstrap-data-table-panel">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Photo</th>
                                                        <th>Nom</th>
                                                        <th>Description</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($categories as $categorie)
                                                        @php
                                                            $images = $categorie->Image;
                                                            $firstImage = $images ? asset('storage/' . $images) : asset('assets/images/3.jpg');
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $categorie->Id_Categorie }}</td>
                                                            <td><img src="{{ $firstImage }}" class="img-fluid" alt="{{ $categorie->Nom }}" width="100" height="100" /></td>
                                                            <td>{{ $categorie->Nom }}</td>
                                                            <td>{{ $categorie->Description }}</td>
                                                            <td>
                                                                <a href="/categorie_update/{{ $categorie->Id_Categorie }}"
                                                                    class="btn btn-warning btn-rounded m-b-10 m-l-5">Update</a>
                                                                <a href="/categorie_destroy/{{ $categorie->Id_Categorie }}"
                                                                    class="btn btn-danger btn-rounded m-b-10 m-l-5">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="page-nation text-center">
                                                        {{ $categories->links('vendor.pagination.default') }}
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
    @endsection
