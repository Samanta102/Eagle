<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormaPagoController;

Route::resource('formas_pago', FormaPagoController::class);

Route::get('/', function () {
    return view('welcome');
});
