@extends('layout.app')

@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Calendrier des Réservations</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="card alert">
                        <div class="card-header text-center">
                            <h3>Calendrier des Réservations</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="calendar">
                                    <thead>
                                        <tr>
                                            <th>Horaire</th>
                                            @for($i = 0; $i < 7; $i++)
                                                <th>{{\Carbon\Carbon::now()->addDays($i)->format('l d M') }}</th>
                                            @endfor
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($horaires as $horaire)
                                            <tr>
                                                <td>{{ $horaire->Heure_debut }} - {{ $horaire->Heure_fin }}</td>
                                                @for($i = 0; $i < 7; $i++)
                                                    <td id="cell-{{ $horaire->Id_Horaire }}-{{ \Carbon\Carbon::now()->addDays($i)->format('Y-m-d') }}">
                                                        <!-- Les réservations seront chargées ici -->
                                                    </td>
                                                @endfor
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
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            @foreach($horaires as $horaire)
                @for($i = 0; $i < 7; $i++)
                    $.ajax({
                        url: '/reservations/getReservations',
                        type: 'GET',
                        data: {
                            date: '{{ \Carbon\Carbon::now()->addDays($i)->format('Y-m-d') }}',
                            horaire: '{{ $horaire->Id_Horaire }}'
                        },
                        success: function(data) {
                            var cellId = '#cell-{{ $horaire->Id_Horaire }}-{{ \Carbon\Carbon::now()->addDays($i)->format('Y-m-d') }}';
                            $(cellId).html(data);
                        }
                    });
                @endfor
            @endforeach
        });
    </script>
@endsection
