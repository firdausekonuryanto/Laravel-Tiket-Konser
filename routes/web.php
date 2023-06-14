<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenontonController;
use App\Http\Controllers\UserloginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [UserloginController::class, 'login'])->name('login');
Route::post('login', [UserloginController::class, 'authenticate']);
Route::post('logout', [UserloginController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [UserloginController::class, 'home']);
    Route::get('dashboard', [UserloginController::class, 'dashboard']);
    Route::get('transaksi', [UserloginController::class, 'transaksi']);
    Route::get('semuapenonton', [UserloginController::class, 'semuapenonton']);
    Route::get('validasitiket', [UserloginController::class, 'validasitiket']);
    Route::post('transaksi', [UserloginController::class, 'store_transaksi']);
    Route::post('check_in', [UserloginController::class, 'check_in']);
});

Route::resource('penonton', PenontonController::class)->only('create', 'store   ');
Route::resource('penonton', 'PenontonController')->only(['index', 'show', 'update', 'destroy'])->middleware('auth');
