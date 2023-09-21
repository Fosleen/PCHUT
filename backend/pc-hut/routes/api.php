<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ComponentImageController;
use App\Http\Controllers\CoolingController;
use App\Http\Controllers\CoolingTypeController;
use App\Http\Controllers\CPUController;
use App\Http\Controllers\GPUController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\MotherboardController;
use App\Http\Controllers\MouseController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\PcCaseController;
use App\Http\Controllers\PSUController;
use App\Http\Controllers\RAMController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\SwitchTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/logged-user', [AuthController::class, 'getLoggedUser'])->middleware('auth:sanctum');

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

Route::get('coolings', [CoolingController::class, 'index']);
Route::get('coolings/{id}', [CoolingController::class, 'show']);
Route::post('coolings', [CoolingController::class, 'store']);

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
Route::get('cpus/socket/{socketId}', [CPUController::class, 'indexWithSocket']);
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

//=============================================================//

Route::get('rams', [RAMController::class, 'index']);
Route::get('rams/ram_types/{ram_type_id}', [RAMController::class, 'indexWithRamType']);
Route::get('rams/{id}', [RAMController::class, 'show']);
Route::post('rams', [RAMController::class, 'store']);
Route::delete('rams/{id}', [RAMController::class, 'destroy']);
//=============================================================//

Route::get('storages', [StorageController::class, 'index']);
Route::get('storages/{id}', [StorageController::class, 'show']);
Route::post('storages', [StorageController::class, 'store']);
Route::delete('storages/{id}', [StorageController::class, 'destroy']);
//=============================================================//


Route::get('psus', [PSUController::class, 'index']);
Route::get('psus/{id}', [PSUController::class, 'show']);
Route::post('psus', [PSUController::class, 'store']);
Route::delete('psus/{id}', [PSUController::class, 'destroy']);
//=============================================================//

Route::get('pccases', [PcCaseController::class, 'index']);
Route::get('pccases/{id}', [PcCaseController::class, 'show']);
Route::post('pccases', [PcCaseController::class, 'store']);
Route::delete('pccases/{id}', [PcCaseController::class, 'destroy']);
//=============================================================//

Route::get('manufacturers', [ManufacturerController::class, 'index']);
Route::get('manufacturers/{id}', [ManufacturerController::class, 'show']);
Route::post('manufacturers', [ManufacturerController::class, 'store']);
Route::delete('manufacturers/{id}', [ManufacturerController::class, 'destroy']);

//=============================================================//

Route::get('component-images', [ComponentImageController::class, 'index']);
Route::get('component-images/{id}', [ComponentImageController::class, 'show']);
Route::post('component-images', [ComponentImageController::class, 'store']);

//=============================================================//

Route::get('component', [ComponentController::class, 'index']);
Route::get('component/{id}', [ComponentController::class, 'show']);

//=============================================================//

Route::get('order', [OrderController::class, 'index']);
Route::get('user-orders/{id}', [OrderController::class, 'getOrdersByUser']);
Route::get('order/{id}', [OrderController::class, 'show']);
Route::post('order', [OrderController::class, 'store']);
Route::delete('order/{id}', [OrderController::class, 'destroy']);
Route::get('discount-components', [ComponentController::class, 'indexDiscount']);

//=============================================================//

Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::put('users/{id}', [UserController::class, 'update']);
