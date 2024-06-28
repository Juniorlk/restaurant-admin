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
            $table->unsignedBigInteger('Id_Categorie');
            $table->string('Nom');
            $table->text('Description')->nullable();
            $table->integer('Prix');
            $table->string('Photos')->nullable();
            $table->text('Allergenes')->nullable();
            $table->string('Type_plat');
            $table->boolean('isPromo')->default(false);
            $table->foreign('Id_Categorie')->references('Id_Categorie')->on('categories')->onDelete('cascade');
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
