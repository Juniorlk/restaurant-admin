<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::paginate(10);
        return view('admin/categorie/liste_categorie', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/categorie/ajouter_categorie');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $categorie = new Categorie();
        $categorie->nom = $request->nom;
        $categorie->description = $request->description;
        $categorie->save();

        return redirect('/categorie')->with("status", "La nouvelle categorie a été ajouté");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Categorie::find($id);
        return view('admin/categorie/update_categorie', ['categories' => $categories]);
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
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $categorie = Categorie::findOrFail($id);
        $categorie->nom = $request->nom;
        $categorie->description = $request->description;
        $categorie->save();

        return redirect('/categorie')->with("status", "La nouvelle categorie a été ajouté");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
        return redirect('/categorie')->with("status", "La categorie a été supprimé");
    }
}
