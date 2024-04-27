<?php

use App\Models\transaction;
use Illuminate\Http\Request;
use App\Models\CompostHistory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\inputController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CompostHistoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::prefix('compost')->group(function () {
    Route::post('/store', [CompostHistoryController::class, 'store']);
});

Route::prefix('plant')->group(function () {
    Route::post('/store', [PlantController::class, 'store']);
    Route::delete('/delete/{id}', [PlantController::class, 'destroy']);
});

Route::prefix('sector')->group(function () {
    Route::get('/', [SectorController::class, 'index']);
    Route::get('/detail/{id}', [SectorController::class, 'detail']);
});

Route::prefix('message')->group(function () {
    Route::post('/sendMessage', [ReportController::class, 'sendMessage']);
    Route::get('/chatHistory', [reportController::class, 'getChatHistory']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
