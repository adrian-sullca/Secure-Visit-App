<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MotiveController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    // Motives
    Route::get('/motives', [MotiveController::class, 'index']);
    Route::post('/motive', [MotiveController::class, 'store']);
    Route::get('/motive/{motive}', [MotiveController::class, 'show']);
    Route::put('/motive/{motive}', [MotiveController::class, 'update']);
    Route::delete('/motive/{motive}', [MotiveController::class, 'destroy']);
    
});
