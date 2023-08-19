<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Cooling_type_controller;
use App\Http\Controllers\CPUController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\MotherboardController;
use App\Http\Controllers\Mouse_controller;
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

Route::get('keyboards', [KeyboardController::class, 'index']);
Route::get('keyboards/{id}', [KeyboardController::class, 'show']);
Route::post('keyboards', [KeyboardController::class, 'store']);
Route::put('keyboards/{id}', [KeyboardController::class, 'update']);
Route::delete('keyboards/{id}', [KeyboardController::class, 'destroy']);
Route::get('mouses', [Mouse_controller::class, 'getAll']);
Route::post('mouses', [Mouse_controller::class, 'create']);
Route::get('mouses/{id}', [Mouse_controller::class, 'getById']);
Route::put('mouses/{id}/update', [Mouse_controller::class, 'update']);
Route::delete('mouses/{id}/delete', [Mouse_controller::class, 'delete']);

//=============================================================//

Route::get('monitors', [MonitorController::class, 'getAll']);
Route::post('monitors', [MonitorController::class, 'create']);
Route::get('monitors/{id}', [MonitorController::class, 'getById']);
Route::put('monitors/{id}/update', [MonitorController::class, 'update']);
Route::delete('monitors/{id}/delete', [MonitorController::class, 'delete']);

//=============================================================//

Route::get('cpus', [CPUController::class, 'getAll']);
Route::post('cpus', [CPUController::class, 'create']);
Route::get('cpus/{id}', [CPUController::class, 'getById']);
Route::put('cpus/{id}/update', [CPUController::class, 'update']);
Route::delete('cpus/{id}/delete', [CPUController::class, 'delete']);

//=============================================================//

Route::get('motherboards', [MotherboardController::class, 'getAll']);
Route::post('motherboards', [MotherboardController::class, 'create']);
Route::get('motherboards/{id}', [MotherboardController::class, 'getById']);
Route::put('motherboards/{id}/update', [MotherboardController::class, 'update']);
Route::delete('motherboards/{id}/delete', [MotherboardController::class, 'delete']);
