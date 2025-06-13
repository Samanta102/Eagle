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
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id('id_mantenimiento');
            $table->unsignedBigInteger('id_orden');
            $table->foreign('id_orden')->references('id_orden')->on('ordenes_servicio');
            $table->string('id_producto');
            $table->foreign('id_producto')->references('id_producto')->on('productos');
            $table->decimal('total', 10, 2);
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};
