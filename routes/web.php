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

Route::get('/', 'HomeController@show');

Route::group(['middleware' => 'admin'], function () {

    Route::get('text/edit', 'HomeController@edit')->name('text.edit');
    Route::post('text/update', 'HomeController@update')->name('text.update');

    Route::get('news/create', 'NewsController@create')->name('news.create');
    Route::post('news/store', 'NewsController@store')->name('news.store');
    Route::get('news/edit/{id}', 'NewsController@edit')->name('news.edit');
    Route::post('news/update/{id}', 'NewsController@update')->name('news.update');
    Route::delete('news/delete/{id}', 'NewsController@destroy')->name('news.delete');

    Route::post('file-upload', 'GalleryController@store')->name('file-upload');
});

Route::get('news', 'NewsController@index')->name('news');
Route::get('show/{id}', 'NewsController@show')->name('show');

Route::get('gallery', 'GalleryController@index')->name('gallery');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
