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
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id('id_cotizacion');
            $table->unsignedBigInteger('id_diagnostico');
            $table->foreign('id_diagnostico')->references('id_diagnostico')->on('diagnosticos');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->unsignedBigInteger('id_forma_pago');
            $table->foreign('id_forma_pago')->references('id_forma_pago')->on('formas_pago');
            $table->string('forma_pago', 50);
            $table->decimal('total', 10, 2);
            $table->date('fecha_emision');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
