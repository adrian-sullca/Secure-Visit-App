<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MotiveController;
use App\Http\Controllers\ServiceController;
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
    // Services
    Route::get('/services', [ServiceController::class, 'index']);
    Route::post('/service', [ServiceController::class, 'store']);
    Route::get('/service/{service}', [ServiceController::class, 'show']);
    Route::put('/service/{service}', [ServiceController::class, 'update']);
    Route::delete('/service/{service}', [ServiceController::class, 'destroy']);
});
