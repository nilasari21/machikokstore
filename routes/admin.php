<?php

// Backpack\CRUD: Define the resources for the entities you want to CRUD.
CRUD::resource('kategori', 'KategoriCrudController');

CRUD::resource('ukuran', 'UkuranCrudController');

CRUD::resource('metode', 'MetodeCrudController');

//CRUD::resource('testimoni', 'TestimoniCrudController');

//Route::delete('testimoni', 'TestimoniCrudController@destroy');
Route::get('testimoni','TestimoniCrudController@index');
Route::get('testimoni/{testimoni}','TestimoniCrudController@destroy');

Route::get('preorder', 'PreorderController@index');
Route::get('preorder/tambahpo', 'PreorderController@tambah');
Route::get('preorder/simpannonukuran', 'PreorderController@simpannonukuran');
Route::post('preorder/simpanukuran', 'PreorderController@simpanukuran');

Route::get('readystock', 'ReadystockController@index');
Route::get('readystock/tambahrs', 'ReadystockController@tambah');
Route::post('readystock/simpannonukuran', 'ReadystockController@simpannonukuran');
Route::post('readystock/simpanukuran', 'ReadystockController@simpanukuran');

Route::get('transaksi', 'KelolaTransaksiController@index');
?>