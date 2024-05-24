<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->id('Id_Reservation');
            $table->timestamp('Date_heure');
            $table->string('Mode_paiement');
            $table->foreignId('Client_Id')->constrained('clients');
            $table->foreignId('Table_Id')->constrained('tables');
            $table->foreignId('Horaire_Id')->constrained('horaires');
            $table->integer('Nombre_personnes');
            $table->string('Statut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
