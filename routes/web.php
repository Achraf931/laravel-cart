<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ProductController@index')->name('home');
Route::get('/product/{id}', 'ProductController@show');
Route::get('/cart', 'ProductController@cart')->name('cart');
Route::get('/checkout', 'ProductController@checkoutPage')->name('checkoutPage');
Route::post('/product/{id}', 'ProductController@addToCart');
Route::patch('/updateCart/{id}', 'ProductController@update');
Route::delete('/removeFromCart/{id}', 'ProductController@remove');
Route::post('/checkout', 'ProductController@checkout');
Route::get('/confirm', 'ProductController@pageConfirm');
