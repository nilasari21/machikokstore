<?php

// Backpack\CRUD: Define the resources for the entities you want to CRUD.
CRUD::resource('kategori', 'KategoriCrudController');

CRUD::resource('ukuran', 'UkuranCrudController');

CRUD::resource('metode', 'MetodeCrudController');

CRUD::resource('testimoni', 'TestimoniCrudController');

CRUD::resource('preorder', 'PreorderCrudController');

Route::get('readystock', 'ReadystockController@index');
Route::get('readystock/tambahrs', 'ReadystockController@tambah');
Route::post('readystock/simpannonukuran', 'ReadystockController@simpannonukuran');
Route::post('readystock/simpanukuran', 'ReadystockController@simpanukuran');
?>