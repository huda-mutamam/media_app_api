<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MediaController;



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


Route::get('/prodi', [ProdiController::class, 'getData']);
Route::post('/prodi', [ProdiController::class, 'storeApi']);
Route::put('/prodi/{id}', [ProdiController::class, 'updateApi']);
Route::delete('/prodi/{id}', [ProdiController::class, 'deleteApi']);

Route::get('/mahasiswa', [MahasiswaController::class, 'getData']);

Route::get('/kategori', [KategoriController::class, 'getData']);

Route::get('/media', [MediaController::class, 'getData']);
