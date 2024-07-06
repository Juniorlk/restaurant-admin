<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        // Requête de base pour les réservations avec les relations chargées
        $query = Reservation::query();

        // Filtrer par recherche si le paramètre 'search' est présent
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->whereHas('client', function ($q) use ($search) {
                $q->where('nom', 'like', '%' . $search . '%')
                  ->orWhere('prenom', 'like', '%' . $search . '%');
            });
        }

        // Filtrer par statut si le paramètre 'type' est présent
        $type = $request->input('type', 'all');
        if ($type == 'pending') {
            $query->where('Statut', 2);
        } elseif ($type == 'accepted') {
            $query->where('Statut', 1);
        } elseif ($type == 'pending') {
            $query->where('Statut', 0);
        }

        // Paginer les réservations
        $reservations = $query->paginate(10);

        return view('admin.reservations.index', compact('reservations', 'type'));


    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->paiement = 1;
        return view('admin.reservations.edit');
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        if ($request->input('action') == 'livrer') {
            $reservation->Statut = 1;
        } elseif ($request->input('action') == 'rejeter') {
            $reservation->Statut = 2;
        }

        $reservation->save();

        return redirect()->back()->with('success', 'Réservation mise à jour avec succès.');
    }

}

