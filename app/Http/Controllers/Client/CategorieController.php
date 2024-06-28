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
}

