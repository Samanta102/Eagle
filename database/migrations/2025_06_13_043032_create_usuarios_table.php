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
            $table->id('id_usuario');
            $table->unsignedBigInteger('id_rol');
            $table->foreign('id_rol')->references('id_rol')->on('roles');
            $table->string('nombre_usuario', 50);
            $table->string('apellido', 50);
            $table->string('doc_identidad', 15);
            $table->string('direccion', 50);
            $table->string('telefono', 50);
            $table->string('correo', 50)->unique();
            $table->char('contrasena');
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
