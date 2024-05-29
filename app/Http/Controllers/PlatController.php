<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Plat;

class PlatController extends Controller
{
    public function liste_plat ()
    {
        $plats = Plat::all();
        return view('admin/plat/liste_plat', compact('plats'));
    }
    

    /*public function ajouter_plat (Request $request)
    {
        $request->validate([
            'Nom' =>'required',
            'Description' =>'required',
            'Prix'  =>'required',
            'Photos'  =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Allergenes'  =>'required',
            'Type_plat'  =>'required',
            'Id_Categorie' =>'required',
        ]);
        $plat = new Plat();
        $plat->Nom = $request->Nom;
        $plat->Description = $request->Description;
        $plat->Prix = $request->Prix;
        if ($request->hasFile('Photos')) {
            $image = $request->file('Photos');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('Photos'), $imageName);

            // Enregistrer le chemin de l'image dans la base de données
            Image::create([
                'path' => 'images/' . $imageName,
            ]);
        }
        $plat->Allergenes = $request->Allergenes;
        $plat->Type_plat = $request->Type_plat;
        $plat->Id_Categorie = $request->Id_Categorie;
        $plat->save();

        return redirect('/admin/plat/liste_plat')->with("status",'Un nouveau plat');
    

    }*/

    public function store(Request $request)
    {
        Log::info('store method called');

        $request->validate([
            'nom_plat' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'prix' => 'required|numeric',
            'allergenes' => 'nullable|string',
            'type_plat' => 'required|string',
            'description' => 'nullable|string',
            'categorie' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            Log::info('Image file detected');
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);

            Plat::create([
                'nom_plat' => $request->nom_plat,
                'image' => 'images/' . $imageName,
                'prix' => $request->prix,
                'allergenes' => $request->allergenes,
                'type_plat' => $request->type_plat,
                'description' => $request->description,
                'categorie' => $request->categorie,
            ]);

            return redirect()->route('route_to_redirect_to_after_success')->with('success', 'Plat ajouté avec succès');
        }

        return back()->with('error', 'Erreur lors de l\'ajout du plat');
    }
}
