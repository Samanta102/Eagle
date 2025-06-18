<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormaPagoController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\DiagnosticoController;

Route::resource('formas_pago', FormaPagoController::class);
Route::resource('cotizaciones', CotizacionController::class);
Route::resource('diagnosticos', DiagnosticoController::class);


Route::get('/', function () {
    return view('welcome');
});
