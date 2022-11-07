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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::resource('/products', 'ProductController');

Route::get('/', 'ProductController@index')->name('products');

Route::post('/', 'ProductController@store')->name('products.store');

Route::put('/', 'ProductController@update')->name('products.update');

Route::delete('/', 'ProductController@destroy')->name('products.destroy');
