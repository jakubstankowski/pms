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

Route::get('/','ProductsController@product_show');

Route::get('/show/{product}','ProductsController@product_view');

Route::resource('/products','ProductsController');

Route::get('products/{product}', 'ProductsController@show');

Route::get('photos/create/{id}','PhotoController@create');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/album', 'AlbumController');




