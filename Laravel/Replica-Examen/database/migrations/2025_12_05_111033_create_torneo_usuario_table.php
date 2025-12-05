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
        Schema::create('torneo_usuarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_Torneo')->constrained('torneos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_Usuario')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('torneo_usuarios');
    }
};
