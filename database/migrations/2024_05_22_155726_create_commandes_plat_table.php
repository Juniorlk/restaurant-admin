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
        Schema::create('commandes_plat', function (Blueprint $table) {
            $table->unsignedBigInteger('Id_Commande');
            $table->unsignedBigInteger('Id_Plat');
            $table->Integer('quantite');
            $table->foreign('Id_Commande')->references('Id_Commande')->on('commandes')->onDelete('cascade');
            $table->foreign('Id_Plat')->references('Id_Plat')->on('plats')->onDelete('cascade');
            $table->primary(['Id_Commande', 'Id_Plat']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes_plat');
    }
};
