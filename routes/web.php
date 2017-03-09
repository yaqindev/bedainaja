<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'homeController@index');
Route::get('/barang', 'barangController@index');
Route::get('/barang/list', 'barangController@sTable');
Route::post('/barang', 'barangController@simpan');
Route::post('/barang/delete', 'barangController@hapus');
Route::post('/barang/edit', 'barangController@dataEdit');
