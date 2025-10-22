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
        Schema::create('administradors', function (Blueprint $table) {
            $table->id();
             $table->string('nombre');
$table->string('apellido');
$table->integer('num_cel');
$table->integer('num_documento');
$table->string('email')->unique();
$table->string('contrasena');
      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administradors');
    }
};
