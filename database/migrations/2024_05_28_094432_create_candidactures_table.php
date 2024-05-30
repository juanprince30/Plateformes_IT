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
        Schema::create('candidactures', function (Blueprint $table) {
            $table->id();
            $table->string('motivation');
            $table->string('description');
            $table->unsignedBigInteger('profil_id');
            $table->unsignedBigInteger('offre_id');
            $table->foreign('profil_id')->references('id')->on('profils')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('offre_id')->references('id')->on('offres')->onUpdate('restrict')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidactures');
    }
};
