<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('Id_Client');
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('AdresseMail')->unique();
            $table->string('MotDePasse');
            $table->string('Status')->default('actif');
            $table->string('Telephone', 20);
            $table->timestamp('Date_heure')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
