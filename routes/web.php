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


//rutas de clasificacion
Route::get('/clasificacion', 'ClasificacionController@index')->name('clasificacion.index');
Route::get('/clasificacion/create', 'ClasificacionController@create')->name('clasificacion.create');
Route::post('/clasificacion','ClasificacionController@store')->name('clasificacion.store');
Route::get('/clasificacion/{clasificacion}', 'ClasificacionController@show')->name('clasificacion.show');
Route::get('/clasificacion/{clasificacion}/edit', 'ClasificacionController@edit')->name('clasificacion.edit');
Route::put('/clasificacion/{clasificacion}', 'ClasificacionController@update')->name('clasificacion.update');
Route::delete('/clasificacion/{clasificacion}','ClasificacionController@destroy')->name('clasificacion.destroy');
///
//rutas de productos
Route::get('/producto', 'ProductoController@index')->name('producto.index');
Route::get('/producto/create', 'ProductoController@create')->name('producto.create');
Route::post('/producto','ProductoController@store')->name('producto.store');
Route::get('/productos', 'ProductoController@show')->name('producto.show');
Route::get('/producto/{producto}/edit', 'ProductoController@edit')->name('producto.edit');
Route::put('/producto/{producto}', 'ProductoController@update')->name('producto.update');
Route::delete('/producto/{producto}','ProductoController@destroy')->name('producto.destroy');

//