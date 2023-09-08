<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\FrontendAntrianController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LoketController;
use App\Models\Antrian;

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
    return view('index');
});
Route::get('/home', [FrontendHomeController::class, 'index']);

Route::get('/antrian/daftar/{slug}', [FrontendAntrianController::class, 'daftar']);
Route::post('/antrian/daftar/{slug}', [FrontendAntrianController::class, 'store']);
Route::get('/antrian/antrian-saya', [FrontendAntrianController::class, 'antrianSaya']);
Route::delete('/antrian/antrian-saya/{id}', [FrontendAntrianController::class, 'hapusAntrian']);
Route::get('/antrian/cetak-antrian/{id}', [FrontendAntrianController::class, 'cetakAntrian']);

Auth::routes();
Route::get('/dashboard', [HomeController::class, 'index']);

Route::get('/layanan/slug', [LayananController::class, 'slug']);
Route::resource('/layanan', LayananController::class);

Route::get('/antrian-masuk/{antrian:slug}', [AntrianController::class, 'index']);
Route::delete('/antrian-masuk/{antrian:id}', [AntrianController::class, 'ada']);
Route::put('/antrian-masuk/{antrian:id}/lewati', [AntrianController::class, 'lewati']);

Route::get('/tampilan-loket', [LoketController::class, 'index']);



