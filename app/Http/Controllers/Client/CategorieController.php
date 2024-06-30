<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function categories()
    {
        $categories = Categorie::all();
        // dd($categories);
        return response()->json($categories);
    }

    public function getPhoto($id)
    {
        $photo = Categorie::where('Id_Categorie', $id)->first();

        if ($photo) {
            return response()->file(public_path('storage/' . $photo->Image));
        }

        return response()->json(['error' => 'Photo not found'], 404);
    }
}

