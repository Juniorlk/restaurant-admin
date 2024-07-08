<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\HoraireController;
use App\Http\Controllers\Admin\CommandeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\RapportController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/reservations/{id}', [ReservationController::class, 'edit'])->name('reservations.edit');
Route::get('/commande/{id}', [CommandeController::class, 'edit'])->name('commande.edit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    //commandes
    Route::get('commande', [CommandeController::class, 'index'])->name('commande.index');
    Route::put('/commandes/{id}', [CommandeController::class, 'update'])->name('commandes.update');



    //plats
    Route::get('/plat', [PlatController::class, 'liste_plat'])->name('liste_plat');
    Route::get('/plats', [PlatController::class, 'liste_plat_tableau'])->name('liste_plat_tableau');
    Route::get('/ajouter_plat', [PlatController::class, 'ajout_plat'])->name('ajout_plat');
    Route::get('/update_plat/{id}', [PlatController::class, 'findupdated_plat'])->name('findupdated_plat');
    Route::get('/delete_plat/{id}', [PlatController::class, 'delete_plat'])->name('delete_plat');

    Route::post('/ajouter_plat', [PlatController::class, 'ajouter_plat'])->name('ajouter_plat');
    Route::put('/update/{id}', [PlatController::class, 'update'])->name('plat.update');

    //catégorie
    Route::get('/categorie', [CategorieController::class, 'index'])->name('categorie.index');
    Route::get('/categorie/create', [CategorieController::class, 'create'])->name('categorie.create');
    Route::post('/categorie', [CategorieController::class, 'store'])->name('categorie.store');
    Route::get('/categorie_update/{id}', [CategorieController::class, 'show'])->name('categorie.show');
    Route::put('/updates/{id}', [CategorieController::class, 'update'])->name('categorie.update');
    Route::get('/categorie_destroy/{id}', [CategorieController::class, 'destroy'])->name('categorie.destroy');


    //Client

    Route::get('client', [ClientController::class,'index'])->name('client.index');
    Route::get('/ajout', [ClientController::class,'ajouter_client']);
    Route::post('/ajouter/traitement', [ClientController::class,'ajouter_client_traitement']);
    Route::get('/update-client/{id}', [ClientController::class,'update_client']);
    Route::get('/update/traitement', [ClientController::class,'update_client_traitement']);
    Route::get('/delete-client/{id}', [ClientController::class,'destroy'])->name('client.destroy');
    Route::get('/client/{id}', [ClientController::class, 'show_client'])->name('client.show');
    Route::get('/clients/{client}/desactiver', [ClientController::class, 'desactiver'])->name('clients.desactiver');
    Route::get('/clients/{client}/reactiver', [ClientController::class, 'reactiver'])->name('clients.reactiver');


    //réservations
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::put('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations/horaires/{day}', [ReservationController::class, 'getHorairesByDay'])->name('reservations.horaires');
    Route::get('/reservations/tables/{horaireId}/{persons}', [ReservationController::class, 'getAvailableTables'])->name('reservations.tables');
    Route::get('/reservation/details/{id}', [ReservationController::class, 'getReservationDetails'])->name('reservations.details');


    Route::get('/calendar', [ReservationController::class, 'calendar'])->name('reservations.calendar');
    Route::get('/reservations/getReservations', [ReservationController::class, 'getReservations'])->name('reservations.getReservations');



    //tables
    Route::resource('tables', TableController::class);

    //horaires
    Route::resource('horaires', HoraireController::class);

    //Rapport
    Route::get('/rapport', [RapportController::class, 'index'])->name('rapports.index');
    

});



require __DIR__.'/auth.php';
