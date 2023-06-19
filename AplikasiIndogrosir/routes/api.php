<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\DivisiController;
use App\Http\Controllers\API\KontainerBarangController;
use App\Http\Controllers\API\PegawaiController;
use App\Http\Controllers\API\ProdukController;
use App\Http\Controllers\API\ShiftController;
use App\Http\Controllers\ShiftController as ControllersShiftController;
use App\Models\KontainerBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);

Route::middleware('auth:sanctum')->group(function () {
    //route API Pegawai
    Route::apiResource('shift', ShiftController::class);
    Route::apiResource('divisi', DivisiController::class);
    Route::apiResource('pegawai', PegawaiController::class);
    //route API Produk
    Route::apiResource('produk', ProdukController::class);
    Route::apiResource('brand', BrandController::class);
    Route::apiResource('kontainerbarang', KontainerBarangController::class);


    Route::post('logout', [AuthController::class, 'logout']);
});
