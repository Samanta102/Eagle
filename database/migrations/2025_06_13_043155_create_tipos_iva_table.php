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
        Schema::create('tipos_iva', function (Blueprint $table) {
            $table->id('id_iva');
            $table->string('id_producto');
            $table->foreign('id_producto')->references('id_producto')->on('productos');
            $table->string('nombre_iva', 50);
            $table->string('porcentaje');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_iva');
    }
};
