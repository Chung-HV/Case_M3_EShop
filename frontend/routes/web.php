<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/category/{slug}/{id}', 'CategoryController@index')->name('category.product');
Route::get('/products/add-to-cart/{id}', 'HomeController@addToCart')->name('Home.addToCart');
Route::get('/products/show-cart', 'HomeController@showCart')->name('Home.showCart');
Route::get('/products/update-cart', 'HomeController@updateCart')->name('Home.updateCart');
Route::get('/products/delete-cart', 'HomeController@deleteCart')->name('Home.deleteCart');
Route::get('/products/search', 'HomeController@searchProduct')->name('product.search');


