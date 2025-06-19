<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
    $table->id('id_cotizacion');

    $table->unsignedBigInteger('id_diagnostico');
    $table->unsignedBigInteger('id_usuario');
    $table->unsignedBigInteger('id_forma_pago');

    $table->decimal('total', 10, 2);
    $table->date('fecha_emicion');

    $table->timestamps();

    // Claves foráneas corregidas
    $table->foreign('id_diagnostico')->references('id_diagnostico')->on('diagnosticos')->onDelete('cascade');
    $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
    $table->foreign('id_forma_pago')->references('id_forma_pago')->on('formas_pago')->onDelete('cascade'); // 👈 cambio aquí
});

    }

    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
