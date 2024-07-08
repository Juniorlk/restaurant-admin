@extends('layout.app')

@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                {{-- <h1>Liste des reservations</h1> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Ajouter un Reservation</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="card alert">
                        <div class="card-header text-center">
                            <h3>Ajouter une réservation</h3>
                        </div>
                        {{-- <div>
                            <p>jour de reservation</p>
                            @for($i = 0; $i < 7; $i++)
                                <th>{{ \Carbon\Carbon::now()->addDays($i)->format('d M') }}</th>
                            @endfor
                        </div> --}}

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('reservations.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="Id_Client">Client</label>
                                <input type="number" class="form-control" id="Id_Client" name="Id_Client" required>
                            </div>

                            <div class="form-group">
                                <label for="Jour">Jour</label>
                                <select class="form-control" id="Jour" name="Jour" required>
                                    <option value="">-- Choisir --</option>
                                    <option value="{{$jours[$jour % 7]}} ">{{$jours[$jour % 7]}} {{ \Carbon\Carbon::now()->addDays(0)->format('d M') }}</option>
                                    <option value="{{$jours[($jour + 1) % 7]}} ">{{$jours[($jour + 1) % 7]}} {{ \Carbon\Carbon::now()->addDays(1)->format('d M') }}</option>
                                    <option value="{{$jours[($jour + 2) % 7]}} ">{{$jours[($jour + 2) % 7]}} {{ \Carbon\Carbon::now()->addDays(2)->format('d M') }}</option>
                                    <option value="{{$jours[($jour + 3) % 7]}} ">{{$jours[($jour + 3) % 7]}} {{ \Carbon\Carbon::now()->addDays(3)->format('d M') }}</option>
                                    <option value="{{$jours[($jour + 4) % 7]}} ">{{$jours[($jour + 4) % 7]}} {{ \Carbon\Carbon::now()->addDays(4)->format('d M') }}</option>
                                    <option value="{{$jours[($jour + 5) % 7]}} ">{{$jours[($jour + 5) % 7]}} {{ \Carbon\Carbon::now()->addDays(5)->format('d M') }}</option>
                                    <option value="{{$jours[($jour + 6) % 7]}} ">{{$jours[($jour + 6) % 7]}} {{ \Carbon\Carbon::now()->addDays(6)->format('d M') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Id_Horaire">Horaire</label>
                                <select class="form-control" id="Id_Horaire" name="Id_Horaire" required></select>
                            </div>
                            <div class="form-group">
                                <label for="Nombre_personnes">Nombre de personnes</label>
                                <input type="number" class="form-control" id="Nombre_personnes" name="Nombre_personnes" required>
                            </div>
                            <div class="form-group">
                                <label for="Id_Table">Table</label>
                                <select class="form-control" id="Id_Table" name="Id_Table" required></select>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter la réservation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#Jour').change(function() {
                var day = $(this).val();
                console.log(day);
                $.ajax({
                    url: '/reservations/horaires/' + day,
                    type: 'GET',
                    success: function(data) {
                        $('#Id_Horaire').empty();
                        $.each(data, function(key, horaire) {
                            $('#Id_Horaire').append('<option value="' + horaire.Id_Horaire + '">' + horaire.Heure_debut + ' - ' + horaire.Heure_fin + '</option>');
                        });
                    }
                });
            });

            $('#Id_Horaire, #Nombre_personnes').change(function() {
                var horaireId = $('#Id_Horaire').val();
                var persons = $('#Nombre_personnes').val();
                if (horaireId && persons) {
                    $.ajax({
                        url: '/reservations/tables/' + horaireId + '/' + persons,
                        type: 'GET',
                        success: function(data) {
                            $('#Id_Table').empty();
                            $.each(data, function(key, table) {
                                $('#Id_Table').append('<option value="' + table.Id_Table + '">Table ' + table.Numero_de_table + ' (Capacité: ' + table.Capacite + ')</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
