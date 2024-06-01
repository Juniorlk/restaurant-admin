@extends('layout.app')
@section('content')

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Welcome Here</span></h1>
                            </div>
                        </div>
                    </div>
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
                    </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h1>AJOUTER UN CLIENT</h1>
                            <br>
                            
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="alert alert-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            
                            <form action="/ajouter/traitement" method="POST" class="form-group">
                                @csrf
                                <div class="form-group">
                                    <label for="Nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="Nom" name="nom">
                                </div>
                            
                                <div class="form-group">
                                    <label for="Prenom" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" id="Prenom" name="prenom">
                                </div>
                            
                                <div class="form-group">
                                    <label for="AdresseMail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="AdresseMail" name="email">
                                </div>
                            
                                <div class="form-group">
                                    <label for="MotDePasse" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="MotDePasse" name="password">
                                </div>
                            
                                <div class="form-group">
                                    <label for="Telephone" class="form-label">Téléphone</label>
                                    <input type="text" class="form-control" id="Telephone" name="tel">
                                </div>
                            
                                <br>
                                <button type="submit" class="btn btn-primary">AJOUTER</button>
                            </form>                            
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
