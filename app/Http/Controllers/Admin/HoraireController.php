<?php
namespace App\Http\Controllers\Admin;

use App\Models\Horaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HoraireController extends Controller
{
    public function index()
    {
        $horaires = Horaire::paginate(10);
        return view('admin.horaires.index', compact('horaires'));
    }

    public function create()
    {
        return view('admin.horaires.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'Jour' => 'required|string',
            'Heure_debut' => 'required|date_format:H:i',
            'Heure_fin' => 'required|date_format:H:i',
        ]);
        // dd($request);
        Horaire::create($request->all());

        return redirect()->route('horaires.index')->with('success', 'Horaire créée avec succès.');
    }

    public function show(Horaire $horaire)
    {
        return view('admin.horaires.show', compact('horaire'));
    }

    public function edit(Horaire $horaire)
    {
        return view('admin.horaires.edit', compact('horaire'));
    }

    public function update(Request $request, Horaire $horaire)
    {
        $request->validate([
            'Jour' => 'required|string',
            'Heure_debut' => 'required|string',
            'Heure_fin' => 'required|string',
        ]);

        $horaire->update($request->all());

        return redirect()->route('horaires.index')->with('success', 'Horaire mise à jour avec succès.');
    }

    public function destroy(Horaire $horaire)
    {
        $horaire->delete();

        return redirect()->route('horaires.index')->with('success', 'Horaire supprimée avec succès.');
    }
}
