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
      Schema::create('reporte_diarios', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->foreignId('obra_id')->constrained('obras')->cascadeOnDelete();
            $table->date('fecha')->nullable();
            $table->text('resumen')->nullable();
            $table->text('avance')->nullable();
            $table->text('incidencias')->nullable();
            $table->string('clima',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporte_diarios');
    }
};
