<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoolingTypeController;
use App\Http\Controllers\CPUController;
use App\Http\Controllers\GPUController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\MotherboardController;
use App\Http\Controllers\MouseController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\SwitchTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('cooling_types', [CoolingTypeController::class, 'index']);
Route::get('parts', [PartController::class, 'index']);

Route::get('switch-types', [SwitchTypeController::class, 'index']);
Route::get('switch-types/{id}', [SwitchTypeController::class, 'show']);

Route::get('keyboards', [KeyboardController::class, 'index']);
Route::get('keyboards/{id}', [KeyboardController::class, 'show']);
Route::post('keyboards', [KeyboardController::class, 'store']);
Route::put('keyboards/{id}', [KeyboardController::class, 'update']);
Route::delete('keyboards/{id}', [KeyboardController::class, 'destroy']);

Route::get('mouses', [MouseController::class, 'index']);
Route::post('mouses', [MouseController::class, 'store']);
Route::get('mouses/{id}', [MouseController::class, 'show']);
Route::put('mouses/{id}/update', [MouseController::class, 'update']);
Route::delete('mouses/{id}/delete', [MouseController::class, 'destroy']);

//=============================================================//

Route::get('monitors', [MonitorController::class, 'index']);
Route::post('monitors', [MonitorController::class, 'store']);
Route::get('monitors/{id}', [MonitorController::class, 'show']);
Route::put('monitors/{id}/update', [MonitorController::class, 'update']);
Route::delete('monitors/{id}/delete', [MonitorController::class, 'destroy']);

//=============================================================//

Route::get('cpus', [CPUController::class, 'index']);
Route::post('cpus', [CPUController::class, 'store']);
Route::get('cpus/{id}', [CPUController::class, 'show']);
Route::put('cpus/{id}/update', [CPUController::class, 'update']);
Route::delete('cpus/{id}/delete', [CPUController::class, 'destroy']);

//=============================================================//

Route::get('motherboards', [MotherboardController::class, 'index']);
Route::post('motherboards', [MotherboardController::class, 'store']);
Route::get('motherboards/{id}', [MotherboardController::class, 'show']);
Route::put('motherboards/{id}/update', [MotherboardController::class, 'update']);
Route::delete('motherboards/{id}/delete', [MotherboardController::class, 'destroy']);
//=============================================================//
Route::get('gpus', [GPUController::class, 'index']);
Route::get('gpus/{id}', [GPUController::class, 'show']);
Route::post('gpus', [GPUController::class, 'store']);
Route::put('gpus/{id}', [GPUController::class, 'update']);
Route::delete('gpus/{id}', [GPUController::class, 'destroy']);

Route::get('manufacturers', [ManufacturerController::class, 'index']);
Route::get('manufacturers/{id}', [ManufacturerController::class, 'show']);
Route::post('manufacturers', [ManufacturerController::class, 'store']);
Route::delete('manufacturers/{id}', [ManufacturerController::class, 'destroy']);
