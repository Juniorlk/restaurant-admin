<?php

namespace App\Http\Controllers\Client;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::all();
        return response()->json($commandes);
    }
    public function commandesByClient($id, $status)
    {
        $commandes = Commande::where('id_client', $id)->where('statut', $status)->get();

        return response()->json($commandes);
    }

    public function show(Commande $commande)
    {
        $this->authorize('view', $commande);
        return response()->json($commande);
    }

    public function store(Request $request)
    {
        // $this->authorize('create', Commande::class);

        $validator = Validator::make($request->all(), [
            'Id_Client' => 'required|exists:clients,Id_Client',
            'Mode_paiement' => 'required|string',
            'Prix' => 'required|numeric',
            'plats' => 'required|array',
            'plats.*.Id_Plat' => 'exists:plats,Id_Plat',
            'plats.*.quantite' => 'integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $commande = Commande::create([
            'Id_Client' => $request->Id_Client,
            'Date_heure' => now(),
            'Mode_paiement' => $request->Mode_paiement,
            'Prix' => $request->Prix,
        ]);

        foreach ($request->plats as $plat) {
            $commande->plats()->attach($plat['Id_Plat'], ['quantite' => $plat['quantite']]);
        }

        return response()->json($commande, 201);
    }
    public function update(Request $request, Commande $commande)
    {
        $this->authorize('update', $commande);

        $validated = $request->validate([
            'Mode_paiement' => 'string',
            'Prix' => 'integer',
            'Statut' => 'integer',
        ]);

        $commande->update($validated);
        return response()->json($commande, 200);
    }

    public function destroy(Commande $commande)
    {
        $this->authorize('delete', $commande);
        $commande->delete();
        return response()->json(null, 204);
    }
}
