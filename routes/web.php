<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfectController;



Route::get('/', [PerfectController::class, 'welcome'])->name('welcome');

Route::get('/boleto', [PerfectController::class, 'ticketMethod'])->name('ticketRoute');

Route::post('/pix', [PerfectController::class, 'pixMethod'])->name('pixRoute');

Route::post('/cartao', [PerfectController::class, 'creditCardMethod'])->name('creditCardRoute');