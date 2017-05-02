<?php

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

Route::get('/machiko', function () {
    return view('vendor.machiko.coba');
});
Route::get('/daftar', function () {
    return view('vendor.machiko.register');
});
Route::get('/masuk', function () {
    return view('vendor.machiko.login');
});

Route::get('machikokstore', 'ProdukControllerMachiko@index');
Route::get('/machikokstore/detailProduk/{id}', 'ProdukControllerMachiko@detail');

Route::post('keranjang/tambah', 'KeranjangControllerMachiko@tambah');
Route::get('keranjang', 'KeranjangControllerMachiko@index');
Route::get('keranjang/delete/{id}', 'KeranjangControllerMachiko@getDelete');

Route::get('wishlist', 'WishlistControllerMachiko@index');
Route::post('wishlist/tambah', 'WishlistControllerMachiko@tambah');

Route::get('testimoni', 'TestimoniControllerMachiko@index');
Route::get('testimoni/tambah', 'TestimoniControllerMachiko@showtambah');
Route::post('testimoni/simpan', 'TestimoniControllerMachiko@simpan');

