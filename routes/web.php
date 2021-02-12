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

Route::get('/',  'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/clasificacion', 'HomeController@clasificacion')->name('clasificacion');

Route::resource('/clasificacion', 'ClasificacionController', ['except' => ['show']]);
Route::resource('/ver', 'VerController', ['except' => ['show']]);

Route::resource('/producto', 'ProductoController', ['except' => ['show']]);
Route::resource('/galeria', 'GaleriaController', ['except' => ['show']]);
