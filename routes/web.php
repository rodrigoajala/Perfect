<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfectController;



Route::get('/', [PerfectController::class, 'welcome'])->name('welcome');

Route::post('/pagar', [PerfectController::class, 'ticketMethod'])->name('ticketRoute');
