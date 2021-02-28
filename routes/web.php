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

Route::get('/', 'FrontController@index');
Route::get('/detail/{id}', 'FrontController@detail')->name('detail');
Route::get('/acs', 'FrontController@acs')->name('acs');
Route::get('/ws', 'FrontController@weight_sum')->name('ws');

Route::get('/pilih-kategori/{id}', 'FrontController@kategori')->name('pilihkategori');
Auth::routes();

//Route::get('/admin', 'HomeController@index')->middleware(['admin','auth'])->name('admin');
Route::resource('tempat', 'TempatController')->middleware(['admin','auth']);
Route::get('/tambah/tempat', 'TempatController@userCreate')->name('tambah')->middleware(['auth']);
Route::post('/tambah/store', 'TempatController@userStore')->name('store')->middleware(['auth']);
Route::post('/konfirmasi/{tempat}', 'TempatController@konfirmasi')->name('konfirmasi')->middleware(['admin','auth']);

Route::get('/user', 'HomeController@user')->name('user');

Route::resource('rating', 'RatingController')->middleware(['auth']);

Route::resource('kategori', 'KategoriController')->middleware(['admin','auth']);

//Route::get('/tempat/{nama}/edit', 'TempatController@edit');



