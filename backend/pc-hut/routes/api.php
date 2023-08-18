<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Cooling_type_controller;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\Mouse_controller;
use App\Http\Controllers\Part_controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('cooling_types', [Cooling_type_controller::class, 'getAll']);
Route::get('parts', [Part_controller::class, 'getAll']);
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
