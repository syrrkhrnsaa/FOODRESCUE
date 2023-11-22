<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\MitraController;

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
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'dashboard/admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [HomeController::class, 'profile'])->name('profile');
        Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
    });

    Route::controller(AkunController::class)
        ->prefix('akun')
        ->as('akun.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('showdata', 'dataTable')->name('dataTable');
            Route::match(['get','post'],'tambah', 'tambahAkun')->name('add');
            Route::match(['get','post'],'{id}/ubah', 'ubahAkun')->name('edit');
            Route::delete('{id}/hapus', 'hapusAkun')->name('delete');
        });
});

// Rute untuk menampilkan daftar donatur
Route::get('/donatur', [DonaturController::class, 'index'])->name('donatur.index');

// Rute untuk menampilkan formulir tambah donatur
Route::get('/donatur/create', [DonaturController::class, 'create'])->name('donatur.create');

// Rute untuk menyimpan donatur yang baru ditambahkan
Route::post('/donatur', [DonaturController::class, 'store'])->name('donatur.store');

// Rute untuk menampilkan detail donatur
Route::get('/donatur/{donatur}', [DonaturController::class, 'show'])->name('donatur.show');

// Rute untuk menampilkan formulir edit donatur
Route::get('/donatur/{donatur}/edit', [DonaturController::class, 'edit'])->name('donatur.edit');


// Rute untuk menyimpan perubahan pada donatur yang diubah
Route::put('/donatur/{donatur}', [DonaturController::class, 'update'])->name('donatur.update');

// Rute untuk menghapus donatur
Route::delete('/donatur/{donatur}', [DonaturController::class, 'destroy'])->name('donatur.destroy');

//MITRA
Route::get('/mitra', [MitraController::class, 'index'])->name('mitra.index');
Route::get('/mitra/create', [MitraController::class, 'create'])->name('mitra.create');
Route::post('/mitra', [MitraController::class, 'store'])->name('mitra.store');
Route::get('/mitra/{mitra}', [MitraController::class, 'show'])->name('mitra.show');
Route::get('/mitra/{mitra}/edit', [MitraController::class, 'edit'])->name('mitra.edit');
Route::put('/mitra/{mitra}', [MitraController::class, 'update'])->name('mitra.update');
Route::delete('/mitra/{mitra}', [MitraController::class, 'destroy'])->name('mitra.destroy');
