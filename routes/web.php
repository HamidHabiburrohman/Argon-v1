<?php


use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('home.Signin');
});

Route::get('/Signin', [SigninController::class, 'index'])->name('home.Signin');
Route::get('/Signup', [SignupController::class, 'index'])->name('home.Signup'); 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('home.dashboard');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang_keluar', [BarangMasukController::class, 'index'])->name('barang_keluar.index');
Route::get('/barang_masuk', [BarangKeluarController::class, 'index'])->name('barang_masuk.index');
Route::get('/jenis', [JenisController::class, 'index'])->name('jenis.index');
Route::get('/Supplier', [SupplierController::class, 'index'])->name('Supplier.index');

Route::resource('barang', BarangController::class);
    Route::resource('barang_masuk', BarangMasukController::class);
    Route::resource('barang_keluar', BarangKeluarController::class);
    Route::resource('user', UserController::class); 
    Route::resource('jenis', JenisController::class);
    Route::resource('supplier', SupplierController::class);
    