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
Route::get('/{product}/addToCart', 'HomeController@addToCart')->name('addToCart');
Route::post('/purchase', 'HomeController@purchase')->name('purchase');
Route::post('/logout', 'Auth\LoginController@logout')->middleware('auth:user')->name('logout');

Route::group(['namespace' => 'Auth', 'middleware' => 'guest:user'], function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('login.form');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register.form');
    Route::post('/register', 'RegisterController@register')->name('register');
});

Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
    Route::get('/checkout', 'CheckoutController@index')->name('checkout');
    Route::delete('/{rowId}/destroy', 'CheckoutController@destroy')->name('destroy');
});

Route::group(['prefix' => 'orders', 'as' => 'order.'], function () {
    Route::get('/', 'OrderController@index')->name('index');
    Route::get('/{order}', 'OrderController@show')->middleware('can:view,order')->name('show');
    Route::post('/{order}/items/{product}/download', 'OrderController@download')->middleware('can:download,order,product')->name('item.download');
});
