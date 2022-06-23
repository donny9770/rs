<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\UserController;
Route::resource('/user', UserController::class);
use App\Http\Controllers\PelayananController;
Route::resource('/pelayanan', PelayananController::class);
use App\Http\Controllers\DokterController;
Route::resource('/dokter', DokterController::class);
use App\Http\Controllers\KunjunganController;
Route::resource('/kunjungan', KunjunganController::class);
use App\Http\Controllers\paktukangController;
Route::resource('/paktukang', paktukangController::class);