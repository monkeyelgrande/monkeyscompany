<?php

use App\Http\Controllers\Api\RepairOrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->middleware(['auth:sanctum', 'throttle:60,1'])
    ->group(function () {
        Route::post('/orders', [RepairOrderController::class, 'upsert']);
        Route::get('/orders/{uuid}', [RepairOrderController::class, 'show'])
            ->whereUuid('uuid');
        Route::post('/orders/{uuid}/status', [RepairOrderController::class, 'recordStatus'])
            ->whereUuid('uuid');
    });
