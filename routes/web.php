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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/orders', function(){
//    return 'Orders homepage';
//});
Route::get('/orders', 'OrderController@index')->name('order_index');
Route::get('/orders/create', 'OrderController@create')->name('order_create');
Route::post('/orders', 'OrderController@store')->name('order_store');
Route::get('/orders/{id}', 'OrderController@show')->name('order_show');
Route::get('/orders/{id}/edit', 'OrderController@edit')->name('order_edit');
Route::put('/orders/{id}', 'OrderController@update')->name('order_update');
Route::delete('/orders/{id}/delete', 'OrderController@destroy')->name('order_destroy');

Route::get('/order-items', 'OrderItemController@index')->name('order_item_index');
Route::get('/order-items/create', 'OrderItemController@create')->name('order_item_create');
Route::post('/order-items', 'OrderItemController@store')->name('order_item_store');
Route::get('/order-items/{id}', 'OrderItemController@show')->name('order_item_show');
Route::get('/order-items/{id}/edit', 'OrderItemController@edit')->name('order_item_edit');
Route::put('/order-items/{id}', 'OrderItemController@update')->name('order_item_update');
Route::delete('/order-items/{id}/delete', 'OrderItemController@destroy')->name('order_item_destroy');

Route::get('/item-options', 'ItemOptionController@index')->name('item_option_index');
Route::get('/item-options/create', 'ItemOptionController@create')->name('item_option_create');
Route::post('/item-options', 'ItemOptionController@store')->name('item_option_store');
Route::get('/item-options/{id}', 'ItemOptionController@show')->name('item_option_show');
Route::get('/item-options/{id}/edit', 'ItemOptionController@edit')->name('item_option_edit');
Route::put('/item-options/{id}', 'ItemOptionController@update')->name('item_option_update');
Route::delete('/item-options/{id}/delete', 'ItemOptionController@destroy')->name('item_option_destroy');