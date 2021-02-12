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

Route::resource('/clasificaciones','ClasificacionesController');
Route::resource('/productos','ProductosController');
Route::get('/galeria',  'ProductosController@galery');


Route::get('/',  'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





//Productos

