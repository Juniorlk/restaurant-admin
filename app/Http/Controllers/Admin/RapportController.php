<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RapportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rapport = DB::table('commandes')
        ->select(
            DB::raw('DATE(Date_heure) as date'),
            DB::raw('count(*) as nombre_commandes'),
            DB::raw('sum(Prix) as somme_montant')
        )
        ->whereNotNull('Date_heure')
        ->groupBy(DB::raw('DATE(Date_heure)'))
        ->orderBy('date', 'desc')
        ->get();
         // dd($rapport);
        return view('admin/rapports/rapport_commande', compact('rapport'));
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
}
