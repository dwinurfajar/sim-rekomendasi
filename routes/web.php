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
Auth::routes();

//Route::get('/admin', 'HomeController@index')->middleware(['admin','auth'])->name('admin');
Route::resource('tempat', 'TempatController')->middleware(['admin','auth']);
Route::get('/user', 'HomeController@user')->name('user');

Route::resource('rating', 'RatingController')->middleware(['auth']);

//Route::get('/tempat/{nama}/edit', 'TempatController@edit');



