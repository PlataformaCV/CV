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
        Schema::create('experiencia_laboral', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perfil_id')->constrained('users')->onDelete('cascade'); // Relación con users
            $table->string('empresa'); 
            $table->string('puesto');
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable;
            $table->text('descripcion_actividades'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiencia_laboral');
    }
};
