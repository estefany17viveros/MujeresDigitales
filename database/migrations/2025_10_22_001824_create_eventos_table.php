<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id(); // RF1: código autoincremental
            $table->string('nombre');
            $table->text('descripcion')->nullable();

            // Fechas con nullable para evitar error MySQL 1067
            $table->timestamp('fecha_hora_inicio')->nullable();
            $table->timestamp('fecha_hora_fin')->nullable();

            $table->string('lugar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
