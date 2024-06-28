<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Plat;
use App\Models\Categorie;
use Illuminate\Support\Facades\Log;

class PlatController extends Controller
{
    public function liste_plat(Request $request)
    {
        // Requête de base pour les plats
        $query = Plat::query();

        // Filtrer par recherche si le paramètre 'search' est présent
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('Nom', 'like', '%' . $search . '%')
                ->orWhere('Description', 'like', '%' . $search . '%')
                ->orWhere('Type_plat', 'like', '%' . $search . '%');
        }

        // Paginer les plats
        $plats = $query->paginate(10);

        return view('admin/plat/liste_plat', compact('plats'));
    }


    public function ajout_plat ()
    {
        $categories = Categorie::all();
        return view('admin/plat/ajouter_plat', compact('categories'));
    }


    public function ajouter_plat(Request $request)
    {
        // dd($request);
        $request->validate([
            'nom' => 'required|string|max:255',
            'photos.*' => 'required|file|image|max:10240',
            'prix' => 'required|numeric',
            'allergenes' => 'nullable|string',
            'type_plat' => 'required|string',
            'description' => 'nullable|string',
            'id_categorie' => 'required|integer', // Assurez-vous que c'est un entier
        ]);


        $imageUrls = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $image) {
                $path = $image->store('images', 'public');
                $imageUrls[] = $path;
            }
        }


        $plat = new Plat();
        $plat->nom = $request->nom;
        $plat->description = $request->description;
        $plat->prix = $request->prix;
        $plat->photos = json_encode($imageUrls);
        $plat->allergenes = $request->allergenes;
        $plat->type_plat = $request->type_plat;
        $plat->id_categorie = $request->id_categorie; // Assurez-vous d'assigner correctement id_categorie
        $plat->save();

        return redirect('/ajouter_plat')->with("status", "Un nouveau plat a été ajouté");
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
        $categories= Categorie::all();
        return view('admin/plat/update_plat', ['plats' => $plats],['categories'=> $categories]);

    }

   /* public function update(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'photos.*' => 'required|file|image|max:10240',
            'prix' => 'required|numeric',
            'allergenes' => 'nullable|string',
            'type_plat' => 'required|string',
            'description' => 'nullable|string',
            'id_categorie' => 'required|integer', // Assurez-vous que c'est un entier
        ]);

        $plat = Plat::find($request->id);
        $plat->nom = $request->nom;
        $plat->description = $request->description;
        $plat->prix = $request->prix;
        $plat->photos = json_encode($imageUrls);
        $plat->allergenes = $request->allergenes;
        $plat->type_plat = $request->type_plat;
        $plat->id_categorie = $request->id_categorie; // Assurez-vous d'assigner correctement id_categorie
        $plat->update();

        return redirect('/plat')->with("status", "Le plat a été modifié");
    }*/

   
        public function update(Request $request, string $id)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'photos.*' => 'required|file|image|max:10240',
            'prix' => 'required|numeric',
            'allergenes' => 'nullable|string',
            'type_plat' => 'required|string',
            'description' => 'nullable|string',
            'id_categorie' => 'required|integer', // Assurez-vous que c'est un entier
        ]);

        // Trouver le plat par ID
        $plat = Plat::findOrFail($id);

        // Mettre à jour les champs
        $imageUrls = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $image) {
                $path = $image->store('images', 'public');
                $imageUrls[] = $path;
            }
        }


        $plat->nom = $request->nom;
        $plat->description = $request->description;
        $plat->prix = $request->prix;
        $plat->photos = json_encode($imageUrls);
        $plat->allergenes = $request->allergenes;
        $plat->type_plat = $request->type_plat;
        $plat->id_categorie = $request->id_categorie; // Assurez-vous d'assigner correctement id_categorie
       
        // Enregistrer les modifications
        $plat->save();

        return redirect('/plat')->with("status", "Le plat a été modifié");
    }
}
