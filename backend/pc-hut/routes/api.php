<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Cooling_type_controller;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\Part_controller;
use App\Http\Controllers\SwitchTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('cooling_types', [Cooling_type_controller::class, 'getAll']);
Route::get('parts', [Part_controller::class, 'getAll']);

Route::get('switch-types', [SwitchTypeController::class, 'index']);
Route::get('switch-types/{id}', [SwitchTypeController::class, 'show']);
