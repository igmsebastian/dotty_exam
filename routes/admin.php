<?php

use App\Http\Controllers\Admin\ProductController;
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

Route::group(['namespace' => 'Auth'], function(){
    Route::get('/login', 'LoginController@showLoginForm')->name('login.form');
    Route::post('/login', 'LoginController@login')->name('login');
});

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::group(['prefix' => 'products', 'as' => 'product.'], function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/create', 'ProductController@create')->name('create');
        Route::post('/create', 'ProductController@store')->name('store');
        Route::get('/show/{product}', 'ProductController@show')->name('show');
        Route::get('/edit/{product}', 'ProductController@edit')->name('edit');
        Route::put('/edit/{product}', 'ProductController@update')->name('update');
        Route::delete('/{product}', 'ProductController@destroy')->name('destroy');
    });

    Route::group(['prefix' => 'orders', 'as' => 'order.'], function () {
        Route::get('/', 'DashboardController@index')->name('index');
        Route::get('/show/{order}', 'OrderController@show')->name('show');
        Route::put('/show/{order}', 'OrderController@update')->name('update');
    });
});
