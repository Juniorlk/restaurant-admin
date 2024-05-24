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
            $table->foreignId('Id_Commande')->constrained('commandes');
            $table->foreignId('Id_Plat')->constrained('plats');
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
