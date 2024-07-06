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
            $table->string('image')->nullable();
            $table->string('email');
            $table->unsignedInteger('prix')->nullable();
            $table->unsignedInteger('salaire')->nullable();
            $table->unsignedInteger('experience_requis')->nullable();
            $table->string('niveau_etude');
            $table->string('entreprise');
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->string('responsabilite');
            $table->string('competence_requis');
            $table->string('etat_offre')->default('en cours');
            $table->date('date_debut_offre');
            $table->date('date_fin_offre');
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('categorie_id')->references('id')->on('categories')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('restrict')->onUpdate('restrict');
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
