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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VistaController;

// Rutas principales con controladores
Route::resource('usuarios', UsuarioRolController::class);
Route::resource('formas_pago', FormaPagoController::class);
Route::resource('cotizaciones', CotizacionController::class);
Route::resource('diagnosticos', DiagnosticoController::class);
Route::resource('citas', CitaController::class);
Route::resource('ordenes_servicio', OrdenServicioController::class);
Route::resource('mantenimientos', MantenimientoController::class);
Route::resource('productos', ProductoController::class);
Route::resource('tipos-iva', TipoIvaController::class);
Route::resource('patinetas', PatinetaController::class);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.attempt');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/vista', [VistaController::class, 'mostrarVista'])->name('vista');


// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Redirección por rol (rutas con nombre correctas)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente');

// Ruta de inicio
Route::get('/', function () {
    return view('welcome');
});
