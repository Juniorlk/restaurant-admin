<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\PlatsController;
use App\Http\Controllers\Client\CommandeController;
use App\Http\Controllers\Client\CategorieController;
use App\Http\Controllers\Client\ClientAuthController;
use App\Http\Controllers\Client\ReservationController;




// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('register', [ClientAuthController::class, 'register']);
Route::post('login', [ClientAuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [ClientAuthController::class, 'logout']);
Route::get('/', function(){
    return 'welcome';
});

Route::get('commandes', [CommandeController::class, 'index']);
Route::get('commandes/{id_client}/{status}', [CommandeController::class, 'commandesByClient']);
Route::post('commandes', [CommandeController::class, 'store']);
Route::put('commandes/{commande}', [CommandeController::class, 'update']);
Route::delete('commandes/{commande}', [CommandeController::class, 'destroy']);
Route::get('categories', [CategorieController::class, 'categories']);
Route::get('plats', [PlatsController::class, 'index']);
Route::get('promotions', [PlatsController::class, 'promotions']);

Route::get('/photos-{id}',[PlatsController::class,'getImage']);
Route::get('/categories_photo-{id}', [CategorieController::class, 'getPhoto']);

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('commandes/{commande}', [CommandeController::class, 'show']);
//     Route::post('commandes', [CommandeController::class, 'store']);
//     Route::put('commandes/{commande}', [CommandeController::class, 'update']);
//     Route::delete('commandes/{commande}', [CommandeController::class, 'destroy']);

//     Route::get('categories', [CategorieController::class, 'categories']);
//     Route::get('plats', [PlatController::class, 'index']);
//     Route::get('plats/promotions', [PlatController::class, 'promotions']);
// });

Route::post('/admin/slots', [ReservationController::class, 'createSlots']);
Route::get('/slots/{day}', [ReservationController::class, 'getSlotsByDay']);
Route::get('/tables/{horaireId}/{persons}', [ReservationController::class, 'getAvailableTables']);
Route::post('/reservations', [ReservationController::class, 'store']);
Route::get('/reservations/{clientId}', [ReservationController::class, 'getReservationsByClient']);
