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
        $query = Reservation::with('client');

        // Filtrer par recherche si le paramètre 'search' est présent
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->whereHas('client', function ($q) use ($search) {
                $q->where('nom', 'like', '%' . $search . '%')
                  ->orWhere('prenom', 'like', '%' . $search . '%');
            });
        }

        // Filtrer par statut si le paramètre 'status' est présent
        $status = $request->input('status', 'all');
        if ($status == 'pending') {
            $query->where('Statut', 'en attente');
        } elseif ($status == 'validated') {
            $query->where('Statut', 'validée');
        } elseif ($status == 'cancelled') {
            $query->where('Statut', 'annulée');
        }

        // Paginer les réservations
        $reservations = $query->paginate(10);

        return view('admin.reservations.index', compact('reservations', 'status'));
    }

    public function edit($id)
    {
        $reservation = Reservation::with('client')->findOrFail($id);
        return view('admin.reservations.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        if ($request->input('action') == 'validate') {
            $reservation->Statut = 'validée';
        } elseif ($request->input('action') == 'cancel') {
            $reservation->Statut = 'annulée';
        }

        $reservation->save();

        return redirect()->back()->with('success', 'Réservation mise à jour avec succès.');
    }
}

