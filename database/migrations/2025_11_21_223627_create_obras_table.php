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
        Schema::create('obras', function (Blueprint $table) {
                    $table->id()->unsigned();
                    $table->string('nombre');
                    $table->text('descripcion')->nullable();
                    $table->text('direccion')->nullable();
                    $table->string('cliente')->nullable();
                    $table->date('fecha_inicio')->nullable();
                    $table->date('fecha_fin_estimada')->nullable();
                    $table->decimal('presupuesto', 15, 2)->nullable();
                    $table->enum('estado', ['planificada', 'en_proceso', 'pausada', 'finalizada', 'cancelada'])->nullable();
                    $table->timestamps();
                });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
