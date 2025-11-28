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
      Schema::create('obra_materiales', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->foreignId('obra_id')->constrained('obras')->cascadeOnDelete();
            $table->foreignId('material_id')->constrained('materials')->cascadeOnDelete();
            $table->decimal('cantidad', 10, 2)->nullable();
            $table->date('fecha_requerida')->nullable();
            $table->enum('estado', ['solicitado', 'en_camino', 'recibido', 'utilizado'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obra_materiales');
    }
};
