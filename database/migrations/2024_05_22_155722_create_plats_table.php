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
        Schema::create('plats', function (Blueprint $table) {
            $table->id('Id_Plat');
            $table->string('Nom');
            $table->text('Description')->nullable();
            $table->decimal('Prix', 10, 2);
            $table->string('Photos')->nullable();
            $table->text('Allergenes')->nullable();
            $table->string('Type_plat');
            $table->foreignId('Id_Categorie')->constrained('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plats');
    }
};
