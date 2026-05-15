<?php

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/servicios', [PageController::class, 'servicios'])->name('servicios');
Route::get('/nosotros', [PageController::class, 'nosotros'])->name('nosotros');

Route::get('/contacto', [PageController::class, 'contacto'])->name('contacto');
Route::post('/contacto', [ContactController::class, 'send'])
    ->middleware('throttle:5,1')
    ->name('contacto.send');

Route::get('/consulta/{uuid}', [ConsultaController::class, 'show'])
    ->whereUuid('uuid')
    ->name('consulta.show');
