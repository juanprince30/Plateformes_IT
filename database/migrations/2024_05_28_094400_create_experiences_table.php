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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profil_id');
            $table->unsignedBigInteger('pays_id')->nullable();
            $table->string('titre');
            $table->string('entreprise',100);
            $table->string('nom_superviseur',100)->nullable();
            $table->string('contact_superviseur')->nullable();
            $table->unsignedBigInteger('ville')->nullable();
            $table->string('responsabilite');
            $table->string('Description');
            $table->boolean('travail_actuellement')->default(0);
            
            $table->date('date_debut');
            $table->date('date_fin')->nullable();

            $table->foreign('pays_id')->references('id')->on('pays')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->foreign('profil_id')->references('id')->on('profils')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
