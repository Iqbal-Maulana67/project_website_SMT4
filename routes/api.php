<?php

use App\Http\Controllers\api\ApiSiswaController;
use App\Http\Controllers\api\ApiTagihanController;
use App\Http\Controllers\api\ApiValidasiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Siswa API Routes

Route::get('api_siswa', [ApiSiswaController::class, 'getAll']);
Route::get('api_siswa/{nisn}', [ApiSiswaController::class, 'getSpecific']);
Route::post('api_siswa/', [ApiSiswaController::class, 'login']);
Route::post('api_siswa/change_password', [ApiSiswaController::class, 'changePassword']);

// Tagihan API Routes

Route::get('api_tagihan', [ApiTagihanController::class, 'getAll']);
Route::get('api_tagihan/{nisn}', [ApiTagihanController::class, 'getSpecificNISN']);
Route::get('api_tagihan/{nisn}/{bulan}', [ApiTagihanController::class, 'getSpecificMonth']);
Route::get('api_tagihan/tagihan/{id_tagihan}/detail', [ApiTagihanController::class, 'getSpecificTagihan']);

// Validasi API Routes

Route::post('api_validasi', [ApiValidasiController::class, 'sendValidation']);