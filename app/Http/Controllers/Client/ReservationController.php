<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;


// use Illuminate\Http\Request;

// class ReservationController extends Controller
// {
//     public function createSlots(Request $request)
//     {
//         $slots = [];
//         for ($i = 0; $i < 24; $i++) {
//             $slots[$i] = $i . ':00';
//         }
//         return response()->json($slots);
//     }

//     public function getSlotsByDay(Request $request)
//     {
//         $slots = [];
//         for ($i = 0; $i < 24; $i++) {
//             $slots[$i] = $i . ':00';
//         }
//         return response()->json($slots);
//     }
// }
// app/Http/Controllers/ReservationController.php
// namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\Horaire;
use Validator;

class ReservationController extends Controller
{
    public function createSlots(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Jour' => 'required|string',
            'Heure_debut' => 'required|date_format:H:i:s',
            'Heure_fin' => 'required|date_format:H:i:s|after:Heure_debut',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $horaire = Horaire::create([
            'Jour' => $request->Jour,
            'Heure_debut' => $request->Heure_debut,
            'Heure_fin' => $request->Heure_fin,
        ]);

        return response()->json($horaire, 201);
    }

    public function getSlotsByDay($day)
    {
        $horaires = Horaire::where('Jour', $day)->get();
        return response()->json($horaires);
    }

    public function getAvailableTables($horaireId, $persons)
    {
        $reservations = Reservation::where('Id_Horaire', $horaireId)->pluck('Id_Table');
        $tables = Table::whereNotIn('Id_Table', $reservations)->where('Capacite', '>=', $persons)->get();
        // dd($horaireId, $persons, $reservations, $tables);
        return response()->json($tables);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Id_Client' => 'required|exists:clients,Id_Client',
            'Mode_paiement' => 'required|string',
            // 'Date_heure' => 'required|date',
            'Id_Table' => 'required|exists:tables,Id_Table',
            'Id_Horaire' => 'required|exists:horaires,Id_Horaire',
            'Nombre_personnes' => 'required|integer|min:1',
        ]);
        // dd($request->all());
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        // dd($request->all());
        $reservation = Reservation::create([
            'Date_heure' => $request->Date_heure,
            'Mode_paiement' => $request->Mode_paiement,
            'Id_Client' => $request->Id_Client,
            'Id_Table' => $request->Id_Table,
            'Id_Horaire' => $request->Id_Horaire,
            'Nombre_personnes' => $request->Nombre_personnes,
            // 'Statut' => $request->Statut,
        ]);

        return response()->json($reservation, 201);
    }
    public function getReservationsByClient($clientId)
    {
        $reservations = Reservation::where('Id_Client', $clientId)->get();
        return response()->json($reservations);
    }
}
