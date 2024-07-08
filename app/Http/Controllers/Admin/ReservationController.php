<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use App\Models\Horaire;
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
        if ($type == 'rejected') {
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
        $reservation->save();
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

    public function create()
    {
        $jour = now(+1)->dayOfWeek;
        // dd($jour);
        $jours = [ 'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
        return view('admin.reservations.create', compact('jour', 'jours'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Id_Client' => 'required|exists:clients,Id_Client',
            // 'Date_heure' => 'required|date',
            'Id_Table' => 'required|exists:tables,Id_Table',
            'Id_Horaire' => 'required|exists:horaires,Id_Horaire',
            'Nombre_personnes' => 'required|integer|min:1',
        ]);
        // dd($request->all());
        switch ($request->Jour) {
            case 'Lundi':
                $val = 1;
                break;

            case 'Mardi':
                $val = 2;
                break;

            case 'Mercredi':
                $val = 3;
                break;

            case 'Jeudi':
                $val = 4;
                break;

            case 'Vendredi':
                $val = 5;
                break;

            case 'Samedi':
                $val = 6;
                break;

            case 'Dimanche':
                $val = 7;
                break;

            default:
                # code...
                break;
        }
        $intervalle =$val - now(+1)->dayOfWeek;
        $date = now()->addDays($intervalle);
        // dd($request->all(), $date);
        $horaire = Horaire::find($request->Id_Horaire);
        $heure = $horaire->Heure_debut;
        $date = $date->format('Y-m-d') . ' ' . $heure;
        // dd($date);
        Reservation::create([
            'Date_heure' => $date,
            'Mode_paiement' => 'espece',
            'Id_Client' => $request->Id_Client,
            'Id_Table' => $request->Id_Table,
            'Id_Horaire' => $request->Id_Horaire,
            'Nombre_personnes' => $request->Nombre_personnes,
            'Statut' => 1,
        ]);

        return redirect()->route('reservations.create')->with('success', 'Réservation ajoutée avec succès');
    }


    public function getHorairesByDay($day)
    {
        $horaires = Horaire::where('Jour', $day)->get();
        return response()->json($horaires);
    }

    public function getAvailableTables($horaireId, $persons)
    {
        $reservations = Reservation::where('Id_Horaire', $horaireId)->pluck('Id_Table');
        $tables = Table::whereNotIn('Id_Table', $reservations)->where('Capacite', '>=', $persons)->get();
        return response()->json($tables);
    }

    public function getReservationDetails($id)
    {
        $reservation = Reservation::where('Id_Reservation', $id)->first();
        // dd($reservations);
        return view('admin.reservations.details', compact('reservation'));

    }


    public function calendar()
    {
        $horaires = Horaire::all();
        return view('admin.reservations.calendar', compact('horaires'));
    }

    public function getReservations(Request $request)
    {
        $date = Carbon::parse($request->date);
        // dd($date);
        $horaireId = $request->horaire;

        $reservations = Reservation::whereDate('Date_heure', $date)
                                   ->where('Id_Horaire', $horaireId)
                                   ->with('table')
                                   ->get();

        $output = '<ul>';
        foreach ($reservations as $reservation) {
            $output .= '<li>Table ' . $reservation->table->Numero_de_table . ' (Capacité: ' . $reservation->table->Capacite . ')</li>';
        }
        $output .= '</ul>';

        return response()->json($output);
    }
}


