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
Route::get('/', 'AdminController@loginAdmin')->name('loginAdmin');
Route::get('/create', 'AdminController@create')->name('create');
Route::post('/register', 'AdminController@register')->name('register');
Route::post('/admins', 'AdminController@postLoginAdmin')->name('postLoginAdmin');
Route::get('/logout', 'AdminController@LogoutAdmin')->name('LogoutAdmin');
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::prefix('admins')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', 'CategoryController@index')->middleware('can:category_list')->name('categories.index');
        Route::get('/create', 'CategoryController@create')->middleware('can:category_add')->name('categories.create');
        Route::post('/store', 'CategoryController@store')->name('categories.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->middleware('can:category_edit')->name('categories.edit');
        Route::get('/delete/{id}', 'CategoryController@delete')->middleware('can:category_delete')->name('categories.delete');
        Route::post('/update/{id}', 'CategoryController@update')->name('categories.update');
    });
    Route::prefix('menu')->group(function () {
        Route::get('/', 'MenuController@index')->middleware('can:menu_list')->name('menu.index');
        Route::get('/create', 'MenuController@create')->middleware('can:menu_add')->name('menu.create');
        Route::post('/store', 'MenuController@store')->name('menu.store');
        Route::get('/edit/{id}', 'MenuController@edit')->middleware('can:menu_edit')->name('menu.edit');
        Route::get('/delete/{id}', 'MenuController@delete')->middleware('can:menu_delete')->name('menu.delete');
        Route::post('/update/{id}', 'MenuController@update')->name('menu.update');
    });
    Route::prefix('product')->group(function () {
        Route::get('/', 'ProductController@index')->middleware('can:product_list')->name('product.index');
        Route::get('/create', 'ProductController@create')->middleware('can:product_add')->name('product.create');
        Route::post('/store', 'ProductController@store')->name('product.store');
        Route::get('/edit/{id}', 'ProductController@edit')->middleware('can:product_edit,id')->name('product.edit');
        Route::get('/delete/{id}', 'ProductController@delete')->middleware('can:product_delete,id')->name('product.delete');
        Route::post('/update/{id}', 'ProductController@update')->name('product.update');
        Route::get('/search', 'ProductController@search')->name('product.search');
        Route::get('/show/{id}', 'ProductController@detail')->name('product.detail');
    });
    Route::prefix('slider')->group(function () {
        Route::get('/', 'SliderController@index')->middleware('can:slider_list')->name('slider.index');
        Route::get('/create', 'SliderController@create')->middleware('can:slider_add')->name('slider.create');
        Route::post('/store', 'SliderController@store')->name('slider.store');
        Route::get('/edit/{id}', 'SliderController@edit')->middleware('can:slider_edit')->name('slider.edit');
        Route::get('/delete/{id}', 'SliderController@delete')->middleware('can:slider_delete')->name('slider.delete');
        Route::post('/update/{id}', 'SliderController@update')->name('slider.update');
    });
    Route::prefix('setting')->group(function () {
        Route::get('/', 'SettingController@index')->middleware('can:setting_list')->name('setting.index');
        Route::get('/create', 'SettingController@create')->middleware('can:setting_add')->name('setting.create');
        Route::post('/store', 'SettingController@store')->name('setting.store');
        Route::get('/edit/{id}', 'SettingController@edit')->middleware('can:setting_edit')->name('setting.edit');
        Route::get('/delete/{id}', 'SettingController@delete')->middleware('can:setting_delete')->name('setting.delete');
        Route::post('/update/{id}', 'SettingController@update')->name('setting.update');
    });
    Route::prefix('user')->group(function () {
        Route::get('/', 'UserController@index')->middleware('can:user_list')->name('user.index');
        Route::get('/create', 'UserController@create')->middleware('can:user_add')->name('user.create');
        Route::post('/store', 'UserController@store')->name('user.store');
        Route::get('/edit/{id}', 'UserController@edit')->middleware('can:user_edit')->name('user.edit');
        Route::get('/delete/{id}', 'UserController@delete')->middleware('can:user_delete')->name('user.delete');
        Route::post('/update/{id}', 'UserController@update')->name('user.update');
    });
    Route::prefix('role')->group(function () {
        Route::get('/', 'RoleController@index')->middleware('can:role_list')->name('role.index');
        Route::get('/create', 'RoleController@create')->middleware('can:role_add')->name('role.create');
        Route::post('/store', 'RoleController@store')->name('role.store');
        Route::get('/edit/{id}', 'RoleController@edit')->middleware('can:role_edit')->name('role.edit');
        Route::get('/delete/{id}', 'RoleController@delete')->middleware('can:role_delete')->name('role.delete');
        Route::post('/update/{id}', 'RoleController@update')->name('role.update');
    });
    Route::prefix('permission')->group(function () {
        Route::get('/create', 'PermissionController@create')->name('permission.create');
        Route::post('/store', 'PermissionController@store')->name('permission.store');
    });
});
