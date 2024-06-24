<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\CommandeController;
use App\Http\Controllers\Client\ClientAuthController;



// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('register', [ClientAuthController::class, 'register']);
Route::post('login', [ClientAuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [ClientAuthController::class, 'logout']);
Route::get('/', function(){
    return 'welcome';
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('commandes', [CommandeController::class, 'index']);
    Route::get('commandes/{commande}', [CommandeController::class, 'show']);
    Route::post('commandes', [CommandeController::class, 'store']);
    Route::put('commandes/{commande}', [CommandeController::class, 'update']);
    Route::delete('commandes/{commande}', [CommandeController::class, 'destroy']);
});
