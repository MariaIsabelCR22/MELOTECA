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
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('nombre');
            $table->string('artista');
            $table->string('genero')->nullable();
            $table->unsignedSmallInteger('anio_lanzamiento')->nullable();
            $table->string('formato')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('portada')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
