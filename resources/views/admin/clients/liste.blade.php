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
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <h1>LISTE CLIENTS</h1>
                            <br>
                            <a href="/ajout" class="btn btn-primary">Ajouter un client</a>
                            <br>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">TEL</th>
                                    <th scope="col">Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                    <tr>
                                        <th scope="row">{{$client->Id_Client}}</th>
                                        <td>{{$client->Nom}}</td>
                                        <td>{{$client->Prenom}}</td>
                                        <td>{{$client->AdresseMail}}</td>
                                        <td>{{$client->MotDePasse}}</td>
                                        <td>{{$client->Telephone}}</td>
                                        <td>
                                            <a href="/update-client/{{$client->Id_Client}}" class="btn btn-info">Update</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                        </td>
                                      </tr>
                                    @endforeach
                                
                                </tbody>
                              </table>
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
