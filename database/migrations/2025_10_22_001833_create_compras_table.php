<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('boleta_id')->constrained('boletas')->onDelete('cascade');
            $table->string('documento');
            $table->integer('cantidad');
            $table->decimal('valor_total', 10, 2);
            $table->string('metodo_pago', 20);
            $table->string('estado')->default('exitosa');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
