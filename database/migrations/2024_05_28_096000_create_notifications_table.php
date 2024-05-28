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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('message');
            $table->unsignedBigInteger('candidacture_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('discussion_id')->nullable();
            $table->unsignedBigInteger('offre_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('candidacture_id')->references('id')->on('candidactures')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('discussion_id')->references('id')->on('discussions')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('offre_id')->references('id')->on('offres')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
