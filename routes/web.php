<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormaPagoController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrdenServicioController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TipoIvaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioRolController;
use App\Http\Controllers\PatinetaController;

Route::resource('usuarios', UsuarioRolController::class);
Route::resource('formas_pago', FormaPagoController::class);
Route::resource('cotizaciones', CotizacionController::class);
Route::resource('diagnosticos', DiagnosticoController::class);
Route::resource('citas', CitaController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('ordenes_servicio', OrdenServicioController::class);
Route::resource('mantenimientos', MantenimientoController::class);
Route::resource('productos', ProductoController::class);
Route::resource('tipos-iva', TipoIvaController::class);
Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente');
Route::resource('patinetas', PatinetaController::class);




Route::get('/', function () {
    return view('welcome');
});
