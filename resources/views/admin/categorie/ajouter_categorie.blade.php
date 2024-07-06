@extends('layout.app')
@section('content')

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 p-r-0 title-margin-center">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Ajouter une Nouvelle Catégorie</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <a class="btn btn-warning btn-rounded m-t-7 m-b-10 m-l-5" href="{{ route('categorie.index') }}">Liste des Catégories</a>

                        </div>
                    </div>

                </div>
                @if (session('status'))
                    <div class="alert alert-success " style="color: white">
                        {{ session('status') }}
                    </div>
                @endif

                 <!-- Formulaire d'ajout des plats de la bd -->

                 <div class="main-content">
                    <div class="card custom-card">

                        <div class="card-body">
                            <form action="{{ route('categorie.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="nom">Nom de la Categorie</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="nom" name="nom" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="description">Description</label>
                                    <div class="col-lg-8">
                                        <textarea rows="5" cols="30" required class="form-control" id="description" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="photo">Photo</label>
                                    <div class="col-lg-8">
                                        <input type="file" id="photo" name="photo" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-offset-2 col-lg-8">
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                        <button class="btn btn-danger" type="reset">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection
