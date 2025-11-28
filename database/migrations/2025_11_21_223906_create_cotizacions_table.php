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
      Schema::create('cotizacions', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->foreignId('obra_id')->constrained('obras')->cascadeOnDelete();
            $table->foreignId('proveedor_id')->constrained('proveedors')->cascadeOnDelete();
            $table->string('numero_cotizacion', 100)->nullable();
            $table->date('fecha')->nullable();
            $table->decimal('monto_total', 15, 2)->nullable();
            $table->enum('estado', ['pendiente', 'aprobada', 'rechazada'])->nullable();
            $table->string('archivo_path', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizacions');
    }
};
