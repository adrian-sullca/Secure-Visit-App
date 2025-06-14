<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EntryExitController;
use App\Http\Controllers\MotiveController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', [UserController::class, 'getUserByToken']);

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
    // EntryExits
    Route::get('/entry-exits', [EntryExitController::class, 'index']);
    Route::post('/entry', [EntryExitController::class, 'storeEntry']);
    Route::post('/exit/{entry}', [EntryExitController::class, 'storeExit']);
    Route::delete('/entry/{entry}', [EntryExitController::class, 'destroy']);
    Route::get('/entry/{entry}', [EntryExitController::class, 'show']);
});
