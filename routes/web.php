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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/resturants', 'ResturantController@index')->name('restos');
    Route::get('/resturants/menu/{id}', 'MenuController@index')->name('restos.menu');
    Route::get('/resturants/orders/{id}', 'RestoOrderController@index')->name('restos.orders');
    Route::get('/resturants/orders/{id}/add', 'RestoOrderController@add')->name('restos.orders.add');

});



