<?php

namespace App\Http\Controllers\Admin;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes = Commande::paginate(10);
        // dd($commandes);
        return view('admin.commandes.index', compact('commandes'));
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
        $commande = Commande::findOrFail($id);

        if ($request->input('action') == 'livrer') {
            $commande->Statut = 1; // Livré
        } elseif ($request->input('action') == 'rejeter') {
            $commande->Statut = 2; // Rejeté
        }

        $commande->save();

        return redirect()->back()->with('success', 'Commande mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
