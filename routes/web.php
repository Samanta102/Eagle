<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormaPagoController;
use App\Http\Controllers\CotizacionController;

Route::resource('formas_pago', FormaPagoController::class);
Route::resource('cotizaciones', CotizacionController::class);


Route::get('/', function () {
    return view('welcome');
});
