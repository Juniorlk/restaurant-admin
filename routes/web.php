<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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
});

Route::get('/client', [ClientController::class,'liste_Client']);
Route::get('/ajout', [ClientController::class,'ajouter_client']);
Route::post('/ajouter/traitement', [ClientController::class,'ajouter_client_traitement']);
Route::get('/update-client/{id}', [ClientController::class,'update_client']);
Route::get('/update/traitement', [ClientController::class,'update_client_traitement']);
Route::get('/delete-client/{id}', [ClientController::class,'delete_client']);

require __DIR__.'/auth.php';
