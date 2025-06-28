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
        Schema::create('diagnosticos', function (Blueprint $table) {
        $table->id('id_diagnostico');

        $table->unsignedBigInteger('id_cita');
        $table->foreign('id_cita')->references('id_cita')->on('citas');

        $table->unsignedBigInteger('id_usuario');
        $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');

        $table->unsignedBigInteger('id_forma_pago');
        $table->foreign('id_forma_pago')->references('id_forma_pago')->on('formas_pago');

        $table->text('descripcion');
        $table->decimal('costo_total', 10, 2);
        $table->date('fecha_emision');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosticos');
    }
};
