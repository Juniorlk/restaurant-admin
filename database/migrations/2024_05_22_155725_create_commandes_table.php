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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id('Id_Commande');
            $table->unsignedBigInteger('Id_Client');
            $table->timestamp('Date_heure')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('Mode_paiement');
            $table->integer('Prix');
            $table->integer('Statut')->default(0);
            $table->foreign('Id_Client')->references('Id_Client')->on('clients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
