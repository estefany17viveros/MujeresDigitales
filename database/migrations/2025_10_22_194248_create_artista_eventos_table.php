<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('artista_evento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artista_id')->constrained('artistas')->onDelete('cascade');
            $table->foreignId('evento_id')->constrained('eventos')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['artista_id', 'evento_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artista_evento');
    }
};
