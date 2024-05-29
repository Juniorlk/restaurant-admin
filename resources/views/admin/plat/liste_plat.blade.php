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
                    <!-- /# column -->
                </div>
               
                 <!-- Liste des plats de la bd -->
                 
                 <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Liste des plats </h4> 
                                   <!-- <button type="button" class="btn btn-primary btn-rounded m-b-10 m-l-150">Ajouter un plat</button>-->

                                    @if (session('status'))
                                        <div class='alert alert-sucess'>
                                            {{ session('statut')}}
                                        </div>
                                    @endif
                                   <div class="inbox-body text-center">
                                                    <a href="#myModal" data-toggle="modal" title="Compose" class="btn btn-primary btn-rounded m-b-10 m-l-150"> Ajouter un Plat</a>
                                                    <!-- Modal -->
                                                    <div aria-hidden="true" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content text-left">
                                                                <div class="modal-header">
                                                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><i class="ti-close"></i></button>
                                                                    <h4 class="modal-title">Nouveau Plat</h4>
                                                                </div>
                                                                <div class="modal-body">

                                                                <ul>
                                                                    @foreach($errors->all() as $error)
                                                                        <li class="alert alert-danger">{{$error}}</li>
                                                                    @endforeach
                                                                </ul>
                                                                <form action="{{route('ajouter_plat')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label class="col-lg-2 control-label" for="nom_plat">Nom du Plat</label>
                                                                        <div class="col-lg-10">
                                                                            <input type="text" id="nom_plat" name="nom_plat" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-lg-2 control-label" for="image">Ajouter une image</label>
                                                                        <div class="col-lg-10">
                                                                            <input type="file" class="form-control" id="image" name="image">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-lg-2 control-label" for="prix">Prix</label>
                                                                        <div class="col-lg-10">
                                                                            <input type="number" id="prix" name="prix" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-lg-2 control-label" for="allergenes">Allergènes</label>
                                                                        <div class="col-lg-10">
                                                                            <textarea rows="5" cols="30" class="form-control" id="allergenes" name="allergenes"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-lg-2 control-label" for="type_plat">Type de plat</label>
                                                                        <div class="col-lg-10">
                                                                            <select class="form-select" id="type_plat" name="type_plat">
                                                                                <option selected>Choose...</option>
                                                                                <option value="Entrée">Entrée</option>
                                                                                <option value="Resistance">Résistance</option>
                                                                                <option value="Dessert">Dessert</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-lg-2 control-label" for="description">Description</label>
                                                                        <div class="col-lg-10">
                                                                            <textarea rows="5" cols="30" class="form-control" id="description" name="description"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-lg-2 control-label" for="categorie">Catégorie</label>
                                                                        <div class="col-lg-10">
                                                                            <select class="form-select" id="categorie" name="categorie">
                                                                                <option selected>Choose...</option>
                                                                                <option value="Entrée">Entrée</option>
                                                                                <option value="Resistance">Résistance</option>
                                                                                <option value="Dessert">Dessert</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-lg-offset-2 col-lg-10">
                                                                            <input type="submit" class="btn btn-success" value="Save">
                                                                            <button class="btn btn-danger" type="reset">Reset</button>
                                                                        </div>
                                                                    </div>
                                                                </form>


                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                </div>
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table  class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nom</th>
                                                    <th>Photos</th>
                                                    <th>Prix</th>
                                                    <th>Allergenes</th>
                                                    <th>type de plat</th>
                                                    <th>Description</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($plats as $plats)
                                                <tr>
                                                    <td>{{$plats->Id_Plat}}</td>
                                                    <td>{{$plats->Nom}}</td>
                                                    <td>{{$plats->Photos}}</td>
                                                    <td class="color-primary">{{$plats->Prix}}</td> 
                                                    <td>{{$plats->Allergenes}}</td>
                                                    <td>{{$plats->Type_plat}}</td>
                                                    <td>{{$plats->Description}}</td>
                                                    <td>
                                                    <a href="" class="btn btn-warning btn-rounded m-b-10 m-l-5">Update</a>
                                                    <a href="" class="btn btn-danger btn-rounded m-b-10 m-l-5">Delete</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
										<div class="row">
                        <div class="col-md-12">
                            <div class="page-nation text-center">
                                <ul class="pagination pagination-large">
                                    <li class="disabled"><span>«</span></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li class="hidden-xs"><a href="#">3</a></li>
                                    <li class="hidden-xs"><a href="#">4</a></li>
                                    <li class="hidden-xs"><a href="#">6</a></li>
                                    <li class="hidden-xs"><a href="#">7</a></li>
                                    <li class="hidden-xs"><a href="#">8</a></li>
                                    <li class="hidden-xs"><a href="#">9</a></li>
                                    <li class="disabled hidden-xs"><span>...</span></li><li>
                                    <li><a rel="next" href="#">Next</a></li>
                                </ul>
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
                                <p>This dashboard was generated on <span id="date-time"></span> <a href="#" class="page-refresh">Refresh Dashboard</a></p>
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
