<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/products', 'ProductController@index');

Route::get('/products/{id}', 'ProductController@get')->name('product');

Route::post('/products', 'ProductController@store');

Route::delete('/products/{id}', 'ProductController@delete');
