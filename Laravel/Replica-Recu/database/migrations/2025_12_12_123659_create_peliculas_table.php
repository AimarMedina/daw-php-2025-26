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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->engine('InnoDB');
            $table->id();
            $table->string('titulo',255);
            $table->string('director',150);
            $table->string('genero');
            $table->text('sinopsis');
            $table->date('fecha_estreno');
            $table->integer('duracion_min');
            $table->foreignId('clasificacion_id')->constrained('clasificaciones')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
