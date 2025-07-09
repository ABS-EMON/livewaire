<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

Route::post('/sanctum/token', [AuthController::class, 'issueToken'])
    ->name('sanctum.token');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])
        ->name('index');

    Route::post('/tasks', [TaskController::class, 'store'])
        ->name('store');

    Route::get('/tasks/{task}', [TaskController::class, 'show'])
        ->name('show');

    Route::put('/tasks/{task}', [TaskController::class, 'update'])
        ->name('update');

    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])
        ->name('destroy');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
