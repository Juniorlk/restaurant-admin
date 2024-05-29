<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlatController;
use Illuminate\Support\Facades\Route;
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



    //commandes
    Route::get('commande', [CommandeController::class, 'index'])->name('commande.index');

});

Route::get('/plat', [PlatController::class, 'liste_plat'])->name('liste_plat');
//Route::post('/ajouter_plat', [PlatController::class, 'ajouter_plat'])->name('ajouter_plat');
Route::post('/ajouter_plat', [PlatController::class, 'store'])->name('ajouter_plat');
Route::get('/update_plat/{id}', [PlatController::class, 'update_plat'])->name('update_plat');


require __DIR__.'/auth.php';
