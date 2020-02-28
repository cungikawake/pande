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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/barcode', 'HomeController@barcode');
Route::get('/scan', 'HomeController@scan');
Route::post('qrChecked', 'HomeController@checkQRcode');

Route::get('/pasien', 'PasienController@index')->name('pasien');
Route::get('/pasien/create', 'PasienController@create')->name('pasien.create');
Route::post('/pasien/store', 'PasienController@store')->name('pasien.store');
Route::get('/pasien/edit/{id}', 'PasienController@edit');
Route::post('/pasien/update', 'PasienController@update')->name('pasien.update');
Route::get('/pasien/barcode/{id}', 'PasienController@barcode');
Route::get('/pasien/search', 'PasienController@search')->name('pasien.search');

Route::get('/peminjam', 'PeminjamController@index')->name('peminjam');
Route::get('/peminjam/create', 'PeminjamController@create')->name('peminjam.create');
Route::post('/peminjam/store', 'PeminjamController@store')->name('peminjam.store');
Route::get('/peminjam/edit/{id}', 'PeminjamController@edit');
Route::post('/peminjam/update', 'PeminjamController@update')->name('peminjam.update');
Route::get('/peminjam/search', 'PeminjamController@search')->name('peminjam.search');

Route::get('/tmr', 'TmrController@index')->name('tmr');
Route::get('/tmr/create', 'TmrController@create')->name('tmr.create');
Route::post('/tmr/store', 'TmrController@store')->name('tmr.store');
Route::get('/tmr/edit/{id}', 'TmrController@edit');
Route::post('/tmr/update', 'TmrController@update')->name('tmr.update');
Route::post('/tmr/searchpeminjam', 'TmrController@searchpeminjam')->name('tmr.searchpeminjam');
Route::post('/tmr/searchpasien', 'TmrController@searchpasien')->name('tmr.searchpasien');
Route::get('/tmr/search', 'TmrController@search')->name('tmr.search');
Route::get('/tmr/scan', 'TmrController@scan');
Route::post('/tmr/updatePengembalian', 'TmrController@updatePengembalian')->name('tmr.updatePengembalian');

Route::get('/report', 'TmrController@getReport')->name('report');

Route::get('/report/search', 'TmrController@getReport')->name('report.search'); 
