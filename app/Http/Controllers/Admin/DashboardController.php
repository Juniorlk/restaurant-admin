<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;




class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function dashboard()
        {
            $numberOfClients = Client::count();
            $sommePrix = Commande::sum('Prix');
            $numberOfCommande = Commande::where('statut', 1)->count();
            $numberOfReservation = Reservation::count();

            $client = DB::table('commandes')
            ->select('clients.nom', DB::raw('count(commandes.Id_Client) as nombre_commandes'))
            ->join('clients', 'commandes.Id_Client', '=', 'clients.Id_Client')
            ->groupBy('clients.Nom')
            ->orderByDesc('nombre_commandes')
            ->first();
            return view('dashboard', compact('client','numberOfClients','sommePrix','numberOfCommande','numberOfReservation'));
        }

}
