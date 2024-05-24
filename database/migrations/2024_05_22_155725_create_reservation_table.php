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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('Id_Reservation');
            $table->timestamp('Date_heure');
            $table->string('Mode_paiement');
            $table->unsignedBigInteger('Id_Client');
            $table->unsignedBigInteger('Id_Table');
            $table->unsignedBigInteger('Id_Horaire');
            $table->foreign('Id_Client')->references('Id_Client')->on('clients')->onDelete('cascade');
            $table->foreign('Id_Table')->references('Id_Table')->on('tables')->onDelete('cascade');
            $table->foreign('Id_Horaire')->references('Id_Horaire')->on('horaires')->onDelete('cascade');
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
