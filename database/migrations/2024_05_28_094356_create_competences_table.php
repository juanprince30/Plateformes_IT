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
        Schema::create('competences', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competences');
    }
};
