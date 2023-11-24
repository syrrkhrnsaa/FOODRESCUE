<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\UlasanController;

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
Route::get('/donatur/data', [DonaturController::class, 'donaturData'])->name('donatur.data');
Route::get('donatur/export-pdf', [DonaturController::class, 'exportPdf'])->name('donatur.exportPdf');


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
Route::get('/mitra/data', [MitraController::class, 'mitraData'])->name('mitra.data');
Route::get('mitra/export-pdf', [MitraController::class, 'exportPdf'])->name('mitra.exportPdf');
Route::get('/mitra/create', [MitraController::class, 'create'])->name('mitra.create');
Route::post('/mitra', [MitraController::class, 'store'])->name('mitra.store');
Route::get('/mitra/{mitra}', [MitraController::class, 'show'])->name('mitra.show');
Route::get('/mitra/{mitra}/edit', [MitraController::class, 'edit'])->name('mitra.edit');
Route::put('/mitra/{mitra}', [MitraController::class, 'update'])->name('mitra.update');
Route::delete('/mitra/{mitra}', [MitraController::class, 'destroy'])->name('mitra.destroy');


Route::get('makanan', [MakananController::class, 'index'])->name('makanan.index');
Route::get('makanan/getData', [MakananController::class, 'makananData'])->name('makanan.data');
Route::get('makanan/create', [MakananController::class, 'create'])->name('makanan.create');
Route::post('makanan/store', [MakananController::class, 'store'])->name('makanan.store');
Route::get('makanan/{id}', [MakananController::class, 'show'])->name('makanan.show');
Route::get('makanan/{id}/edit', [MakananController::class, 'edit'])->name('makanan.edit');
Route::put('makanan/{id}', [MakananController::class, 'update'])->name('makanan.update');
Route::delete('makanan/{id}', [MakananController::class, 'destroy'])->name('makanan.destroy');


// Route untuk menampilkan halaman daftar ulasan
Route::get('ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
Route::get('ulasan/data', [UlasanController::class, 'indexData'])->name('ulasan.data');
Route::get('ulasan/export-pdf', [UlasanController::class, 'exportPdf'])->name('ulasan.exportPdf');

// Route untuk menampilkan form tambah ulasan
Route::get('/ulasan/create', [UlasanController::class, 'create'])->name('ulasan.create');

// Route untuk menyimpan ulasan baru dari form create
Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');

// Route untuk menampilkan detail ulasan
Route::get('/ulasan/{id}', [UlasanController::class, 'show'])->name('ulasan.show');

// Route untuk menampilkan form edit ulasan
Route::get('/ulasan/{id}/edit', [UlasanController::class, 'edit'])->name('ulasan.edit');

// Route untuk menyimpan perubahan pada ulasan dari form edit
Route::put('/ulasan/{id}', [UlasanController::class, 'update'])->name('ulasan.update');

// Route untuk menghapus ulasan
Route::delete('/ulasan/{id}', [UlasanController::class, 'destroy'])->name('ulasan.destroy');


