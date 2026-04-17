<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MediaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    });


Route::get('/prodi', [ProdiController::class, 'index']);
Route::get('/prodi/tambah', [ProdiController::class, 'tambah']);
Route::get('/prodi/edit/{id}', [ProdiController::class, 'edit']);
Route::post('/prodi/simpan', [ProdiController::class, 'simpan']);
Route::post('/prodi/update/{id}', [ProdiController::class, 'update']);
Route::get('/prodi/hapus/{id}', [ProdiController::class, 'hapus']);

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/tambah', [MahasiswaController::class, 'tambah']);
Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit']);
Route::post('/mahasiswa/simpan', [MahasiswaController::class, 'simpan']);
Route::post('/mahasiswa/update/{id}', [MahasiswaController::class, 'update']);
Route::get('/mahasiswa/hapus/{id}', [MahasiswaController::class, 'hapus']);

Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/tambah', [KategoriController::class, 'tambah']);
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit']);
Route::post('/kategori/simpan', [KategoriController::class, 'simpan']);
Route::post('/kategori/update/{id}', [KategoriController::class, 'update']);
Route::get('/kategori/hapus/{id}', [KategoriController::class, 'hapus']);

Route::get('/media', [MediaController::class, 'index']);
Route::get('/media/tambah', [MediaController::class, 'tambah']);
Route::get('/media/edit/{id}', [MediaController::class, 'edit']);
Route::post('/media/simpan', [MediaController::class, 'simpan']);
Route::post('/media/update/{id}', [MediaController::class, 'update']);
Route::get('/media/hapus/{id}', [MediaController::class, 'hapus']);
