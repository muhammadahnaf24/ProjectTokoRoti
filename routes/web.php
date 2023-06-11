<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


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

Route::get('/halamanUtama', function () {
    return view('halamanUtama');
})->name('homeUtama');

Route::get('/product',[AdminController::class,'dataMakanan'] )->name('product');

Route::get('/detail', function () {
    return view('detail');
})->name('detail');

Route::get('/formTambah', function () {
    return view('formTambah');
})->name('formTambah');

Route::get('/pesanan', function () {
    return view('pesanan');
})->name('pesanan');

Route::post('/formTambah/store',[AdminController::class,'store'] );
Route::get('/product/delete/{id}',[AdminController::class,'delete']);
Route::get('/product/{id}',[AdminController::class,'detail'])->name('detail');
Route::post('/product/update',[AdminController::class,'update']);
Route::get('/pesanan',[AdminController::class,'dataPesanan'] )->name('pesanan');
Route::get('/pesanan/{id}',[AdminController::class,'verif'])->name('verif');

// Route::get('/homeUser', function () {
//     return view('user/homeUser');
// })->name('homeUser');

// Route::get('/riwayat', function () {
//     return view('user/riwayat');
// })->name('riwayat');
Route::get('/riwayat',[UserController::class,'dataRiwayat'] )->name('riwayat');
Route::get('/produk',[UserController::class,'dataMakanan'])->name('produk');
Route::get('/produk/{id}',[UserController::class,'detail'])->name('detailProduct');
Route::post('/produk/beli/{id}',[UserController::class,'beli'] );

//login
Auth::routes();
Route::get('/', function () {
    return view('auth/login');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homeUser');
Route::get('/loginAdmin', function () {
    return view('loginAdmin');
});
Route::get('/loginAdmin/proses',[AdminController::class,'login'] )->name('loginAdmin');
