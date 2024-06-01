<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Plat;
use Illuminate\Support\Facades\Log;

class PlatController extends Controller
{
    public function liste_plat ()
    {
        $plats = Plat::all();
        return view('admin/plat/liste_plat', compact('plats'));
    }

     public function ajout_plat ()
    {
        return view('admin/plat/ajouter_plat');
    }
    

    public function ajouter_plat(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'photos' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'prix' => 'required|numeric',
            'allergenes' => 'nullable|string',
            'type_plat' => 'required|string',
            'description' => 'nullable|string',
            'id_categorie' => 'required|integer', // Assurez-vous que c'est un entier
        ]);
            
        $plat = new Plat();
        $plat->nom = $request->nom;
        $plat->description = $request->description;
        $plat->prix = $request->prix;

        if ($request->hasFile('photos')) {
            $image = $request->file('photos');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('photos'), $imageName);

            // Enregistrer le chemin de l'image dans la base de données
            $plat->photos = 'photos/' . $imageName;
        }
        $plat->allergenes = $request->allergenes;
        $plat->type_plat = $request->type_plat;
        $plat->id_categorie = $request->id_categorie; // Assurez-vous d'assigner correctement id_categorie
        $plat->save();

        return redirect('/ajouter-plat')->with("status", "Un nouveau plat a été ajouté");
    }

    public function delete_plat($id)
    {
       $plat = Plat::find($id);
       $plat ->delete();
       return redirect('/plat')->with("status", "Le plat a été supprimé");
    }

    public function findupdated_plat ($id)
    {
        $plats = Plat::find($id);
        return view('admin/plat/update_plat', ['plat' => $plats]);
        
    }
}
