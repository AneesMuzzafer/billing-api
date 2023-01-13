<?php

use App\Http\Controllers\NodeController;
use App\Http\Controllers\VendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/test', function () {
    return "Alhumdullilah";
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('nodes')->group(function () {
    Route::get('/', [NodeController::class, 'index']);
    Route::post('/', [NodeController::class, 'store']);
    Route::post('/import', [NodeController::class, 'import']);

    Route::get('/{node}', [NodeController::class, 'show']);
    Route::put('/{node}', [NodeController::class, 'update']);
    Route::delete('/{node}', [NodeController::class, 'destroy']);
});

Route::prefix('vendors')->group(function () {
    Route::get('/', [VendorController::class, 'index']);
});
