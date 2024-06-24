<?php

namespace App\Http\Controllers\Client;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = auth()->user()->commandes()->paginate(2);
        return response()->json($commandes);
    }

    public function show(Commande $commande)
    {
        $this->authorize('view', $commande);
        return response()->json($commande);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Mode_paiement' => 'required|string',
            'Prix' => 'required|integer',
            'Statut' => 'integer',
        ]);
        $commande = auth()->user()->commandes()->create($validated);

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
