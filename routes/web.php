<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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
    // return view('welcome');
    return redirect()->to(url('/mahasiswa'));
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);
Route::get('/mahasiswa/detail/{nim}', [MahasiswaController::class, 'detail']);
Route::get('/mahasiswa/edit/{nim}', [MahasiswaController::class, 'edit']);
Route::post('/mahasiswa/update/{nim}', [MahasiswaController::class, 'update']);
Route::post('/mahasiswa/delete', [MahasiswaController::class, 'delete']);
