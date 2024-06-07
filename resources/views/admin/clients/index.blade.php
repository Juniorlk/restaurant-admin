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
                <div data-list='{"valueNames":["customer","email","total-orders","total-spent","city","last-seen","last-order"]}'>
                    <div class="main-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card alert">
                                    <div class="card-header pr">
                                        <div class="search-type dib">
                                            <form class="position-relative" data-toggle="search" data-display="static">
                                                <input class="form-control input-rounded search" type="search" placeholder="Recherche par Nom" aria-label="Search" />
                                            </form>
                                        </div>
                                    </div>
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
                                                <tbody class="list">
                                                    @foreach ($clients as $client)
                                                        <tr>
                                                            <td>{{ $client->Id_Client }}</td>
                                                            <td  class="customer">{{ $client->Nom }}</td>
                                                            <td  class="customer">{{ $client->Prenom }}</td>
                                                            <td  class="email">{{ $client->AdresseMail }}</td>
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
                                        </div>
                                    </div>
                                </div>
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
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    <script>
        function submitForm(commandeId, action, nomClient) {
            var form = $('#commandeForm' + commandeId);
            var url = form.attr('action');

            $.ajax({
                url: url,
                type: 'POST',
                data: form.serialize() + '&action=' + action,
                success: function(response) {
                    alert('Commande de Mr/Mme/Mlle '+ nomClient+' est ' + action + ' avec succès.');
                    location.reload();  // Reload the page to reflect changes
                },
                error: function(xhr) {
                    alert('Une erreur s\'est produite. Veuillez réessayer.');
                }
            });
        }
    </script>
    <script>
        (function (global, factory) {
            typeof exports === "object" && typeof module !== "undefined"
                ? (module.exports = factory())
                : typeof define === "function" && define.amd
                ? define(factory)
                : ((global =
                    typeof globalThis !== "undefined" ? globalThis : global || self),
                (global.config = factory()));
        })(this, function () {
            "use strict";

            const initialConfig = {
                phoenixIsNavbarVerticalCollapsed: false,
                phoenixTheme: "light",
                phoenixNavbarTopStyle: "default",
                phoenixNavbarVerticalStyle: "default",
                phoenixNavbarPosition: "vertical",
                phoenixNavbarTopShape: "default",
                phoenixIsRTL: false,
                phoenixSupportChat: true,
            },
            CONFIG = { ...initialConfig },
            setConfig = (e, a = true) => {
                Object.keys(e).forEach((t) => {
                    (CONFIG[t] = e[t]), a && localStorage.setItem(t, e[t]);
                });
            },
            resetConfig = () => {
                Object.keys(initialConfig).forEach((e) => {
                    (CONFIG[e] = initialConfig[e]),
                    localStorage.setItem(e, initialConfig[e]);
                });
            },
            urlSearchParams = new URLSearchParams(window.location.search),
            params = Object.fromEntries(urlSearchParams.entries());

            var config = { config: CONFIG, reset: resetConfig, set: setConfig };

            return config;
        });
    </script>
@endsection
