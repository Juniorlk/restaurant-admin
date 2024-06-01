<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlatController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\Admin\CommandeController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/ajouter_plat', [PlatController::class, 'ajouter_plat'])->name('ajouter_plat');
    //commandes
    Route::get('commande', [CommandeController::class, 'index'])->name('commande.index');
});


Route::get('/client', [ClientController::class,'liste_Client']);
Route::get('/ajout', [ClientController::class,'ajouter_client']);
Route::post('/ajouter/traitement', [ClientController::class,'ajouter_client_traitement']);
Route::get('/update-client/{id}', [ClientController::class,'update_client']);
Route::get('/update/traitement', [ClientController::class,'update_client_traitement']);
Route::get('/delete-client/{id}', [ClientController::class,'delete_client']);

Route::get('/plat', [PlatController::class, 'liste_plat'])->name('liste_plat');
Route::get('/ajouter-plat', [PlatController::class, 'ajout_plat'])->name('ajout_plat');
Route::get('/update_plat/{id}', [PlatController::class, 'findupdated_plat'])->name('findupdated_plat');
Route::get('/delete_plat/{id}', [PlatController::class, 'delete_plat'])->name('delete_plat');


require __DIR__.'/auth.php';
