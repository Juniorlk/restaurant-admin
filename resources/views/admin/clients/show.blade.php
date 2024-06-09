@extends('layout.app')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">

                <!-- /# row -->

                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <div class="user-profile m-t-15">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="user-photo m-b-30">
                                                    <img class="img-responsive" src="assets/images/user-profile.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="user-profile-name">Mr.  {{ $client->Nom }}</div>
                                                <div class="custom-tab user-profile-tab">
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">About</a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div role="tabpanel" class="tab-pane active" id="1">
                                                            <div class="contact-information">
                                                                <div class="phone-content">
                                                                    <span class="contact-title"><strong>Nom & prénom:</strong></span>
                                                                    <span class="phone-number">{{ $client->Prenom }} {{ $client->Nom }}</span>
                                                                </div>
                                                                {{-- <div class="gender-content">
                                                                    <span class="contact-title">Gender:</span>
                                                                    <span class="gender">Male</span>
                                                                </div> --}}
                                                                </div>
                                                                <div class="email-content">
                                                                    <span class="contact-title"><strong>Email:</strong> </span>
                                                                    <span class="contact-email">{{ $client->AdresseMail }}</span>
                                                                </div>
                                                                <div class="email-content">
                                                                    <span class="contact-title"><strong>Numéro de téléphone:</strong> </span>
                                                                    <span class="contact-email">{{ $client->Telephone }}</span>
                                                                </div>
                                                                {{-- <div class="address-content">
                                                                    <span class="contact-title">Address:</span>
                                                                    <span class="mail-address">ST-Canada</span>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2>Historique des commandes</h2>
                                    <br>

                                    <div class="bootstrap-data-table-panel">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Mode de Paiement</th>
                                                        <th>Prix</th>
                                                        <th>Date & heure</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($commandes == null)
                                                          {{-- afficher un message indiquant qu'il n'y a pas de commandes --}}
                                                          <p class="text-danger">Il n'y a pas de commandes pour ce client.</p>
                                                    @else
                                                        @foreach ($commandes as $commande)

                                                        @if ($commande->Statut != 1)

                                                        @else
                                                            <tr>
                                                                <td>{{ $commande->Id_Commande }}</td>
                                                                <td>{{$commande->Mode_paiement }}</td>
                                                                <td class="color-primary">{{ $commande->Prix }} FCFA</td>
                                                                <td>{{ $commande->Date_heure }}</td>
                                                            </tr>
                                                        @endif
                                                        @endforeach

                                                    @endif

                                                </tbody>
                                            </table>
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
