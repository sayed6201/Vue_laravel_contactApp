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

Route::get('/', 'ContactController@index');
Route::post('/additem', 'ContactController@store');
Route::get('/getitems', 'ContactController@showAll');
Route::post('/deleteitem/{id}', 'ContactController@destroy');
Route::post('/edititems/{id}', 'ContactController@editItem' );
