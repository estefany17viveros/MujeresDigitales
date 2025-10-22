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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
                    $table->string('nombre');
$table->string('apellido');
$table->string('num_cel', 15);
$table->string('num_documento', 20);

$table->string('contrasena');
$table->string('email')->unique();  
$table->enum('metodo_pago', ['tarjeta', 'paypal', 'transferencia']);
$table->foreignId('compra_id')->nullable()->constrained('compras')->onDelete('cascade');
$table->foreignId('evento_id')->nullable()->constrained('eventos')->onDelete('cascade');
   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
