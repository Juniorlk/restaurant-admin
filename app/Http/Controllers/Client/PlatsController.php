<?php

namespace App\Http\Controllers\Client;

use App\Models\Plat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlatsController extends Controller
{
    public function index()
    {
        $dishes = Plat::all();
        return response()->json($dishes);
    }

    public function promotions()
    {
        $promotions = Plat::where('isPromo', true)->get();
        return response()->json($promotions);
    }

    public function getImage($id){
        $photos = Plat::where('Id_Plat',$id)->select('photos')->first();
        $images = json_decode($photos->photos);
        // dd($images);
        return response()->file(\public_path('storage/'.$images[0]));
    }

}
