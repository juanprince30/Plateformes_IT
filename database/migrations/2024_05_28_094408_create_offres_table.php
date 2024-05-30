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
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('type_offre');
            $table->string('ville');
            $table->string('pays');
            $table->string('salaire');
            $table->string('experience_requis');
            $table->string('responsabilite');
            $table->string('competence_requis');
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('profil_id');
            $table->foreign('categorie_id')->references('id')->on('categories')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('profil_id')->references('id')->on('profils')->onUpdate('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
