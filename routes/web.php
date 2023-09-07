<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\FrontendAntrianController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;

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

Auth::routes();
Route::get('/dashboard', [HomeController::class, 'index']);

Route::get('/layanan/slug', [LayananController::class, 'slug']);
Route::resource('/layanan', LayananController::class);

Route::get('/antrian-masuk/{slug}', [AntrianController::class, 'index']);



