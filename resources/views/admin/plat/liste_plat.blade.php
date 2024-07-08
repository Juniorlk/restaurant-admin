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
                @if (session('status'))
                    <div class="alert alert-success " style="color: white">
                        {{ session('status') }}
                    </div>
                @endif


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card alert">
                            {{-- <div class="card-header">
                                <a href="{{ Route('ajout_plat') }}">
                                    <button type="button" class="btn btn-warning btn-block m-b-10"><strong>Ajouter un plat</strong></button>
                                </a>
                                <br>
                                {{-- <div class="row">
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
                            <br>
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
                                                    <td class="customer">{{ $plat->Nom }}</td>
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
                            </div> --}}
                            <div class="card-header">
                                <a href="{{ Route('ajout_plat') }}">
                                    <button type="button" class="btn btn-addon m-b-10" style="background-color: #1bac4b"><strong style="color: white"><i><i class="fa fa-plus"></i></i>AJOUTER UN PLAT</strong></button>
                                </a>
                                <a href="{{ Route('liste_plat_tableau') }}">
                                    <button type="button" class="btn btn-addon m-b-10 text-right" style="background-color: #1b5fac"><strong style="color: white"><i><i class="fa fa-list"></i></i>TABLEAU DES PLATS</strong></button>
                                </a>
                                <br>
                                {{-- <div class="row">
                                    <form method="GET" action="{{ route('liste_plat') }}" class="position-relative col-lg-10">
                                        <div class="search-type col-lg-8">
                                            <input class="form-control input-rounded" type="search" name="search" placeholder="Recherche par Nom, Type" aria-label="Search" value="{{ request('search') }}" />
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="submit" class="btn btn-primary">Rechercher</button>
                                        </div>
                                    </form>
                                </div> --}}
                            </div>
                            <div >
                                <div class="main-content">
                                    <div class="row">
                                        @foreach ($plats as $plat)
                                        <div class="col-lg-4" >
                                            <div class="card alert" style="border-color: #1bac4b; border-style: solid; border-width: 3px">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="product-3-img">
                                                            @php
                                                                $images = json_decode($plat->Photos);
                                                                $firstImage = $images ? asset('storage/' . $images[0]) : asset('assets/images/3.jpg');
                                                            @endphp
                                                            <img src="{{ $firstImage }}" class="img-fluid" alt="{{ $plat->Nom }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="product_details_3">
                                                            <div class="product_name">
                                                                <h4>{{ $plat->Nom }}</h4>
                                                            </div>
                                                            <div class="product_des">
                                                                <p>{{ $plat->Description }}</p>
                                                            </div>
                                                            <div class="prdt_add_to_cart">
                                                                <p class=" m-b-10">{{ $plat->Prix }} FCFA</p>
                                                                <br>
                                                            </div>
                                                            <div class="prdt_add_to_cart">
                                                                <div class="text-right">
                                                                    {{-- {{ Route('detail_plat', $plat->Id_Plat) }} --}}
                                                                    <a href="/update_plat/{{ $plat->Id_Plat }}" class="btn btn-warning btn-addon m-b-10 m-l-1"><i class="ti-pencil"></i>Modifier</a>
                                                                    <a href="/delete_plat/{{ $plat->Id_Plat }}" class="btn btn-danger btn-addon m-b-10 m-l-1" ><i class="ti-trash"></i>Supprimer</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /# card -->
                                        </div>
                                    @endforeach
                                    </div>
                                    <!-- /# row -->
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
                <!-- Liste des plats de la bd -->



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
