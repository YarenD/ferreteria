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


Route::get('/clasificaciones', 'ClasificationController@index')->name('clasificaciones');
Route::post('create_clasificacion', 'ClasificationController@store');
Route::post('update_clasificacion', 'ClasificationController@update');
Route::get('list_clasificacion', 'ClasificationController@list');
Route::get('/edit_clasificacion/{id}',['as'=>'/edit_clasificacion','uses'=>'ClasificationController@edit']);
Route::any('/delete_clasificacion/{id}',['as'=>'/delete_clasificacion','uses'=>'ClasificationController@destroy']);

Route::get('/productos', 'ProductController@index')->name('productos');
