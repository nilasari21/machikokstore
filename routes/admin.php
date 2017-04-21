<?php

// Backpack\CRUD: Define the resources for the entities you want to CRUD.
CRUD::resource('kategori', 'KategoriCrudController');

CRUD::resource('ukuran', 'UkuranCrudController');

CRUD::resource('metode', 'MetodeCrudController');

CRUD::resource('testimoni', 'TestimoniCrudController');
?>