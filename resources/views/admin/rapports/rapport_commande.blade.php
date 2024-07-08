@extends('layout.app')
@section('content')

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Rapport Sur les Commandes</h1>
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

                @foreach($rapport as $r)
                    <div class="col-lg-6">
                    <div class="card">
                        <div class="stat-widget-eight">
                            <div class="stat-header">
                                <div class="header-title pull-left">
                                    Date : <span class="date-text text-primary">{{ $r->date }}</span>
                                </div>
                                <div class="card-option drop-menu pull-right">
                                    <i class="ti-more-alt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                    <ul class="card-option-dropdown dropdown-menu">
                                        <li><a href="#"><i class="ti-loop"></i> Update data</a></li>
                                        <li><a href="#"><i class="ti-menu-alt"></i> Detail log</a></li>
                                        <li><a href="#"><i class="ti-pulse"></i> Statistics</a></li>
                                        <li><a href="#"><i class="ti-power-off"></i> Clear list</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr> 
                            <div>
                                <p>Nombre de Commandes : <span class="text-warning">{{ $r->nombre_commandes }}</span></p>
                                <hr>
                                <p>Somme des Montants : <span class="text-success">{{ number_format($r->somme_montant, 0, ',', ' ') }}</span> FCFA</p>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
                @endforeach

               
                
              
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
