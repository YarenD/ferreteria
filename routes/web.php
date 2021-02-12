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
#--------------------------- Clasificaciones ---------------------------------------#
Route::get('Clasificaciones','ClasificacionesController@index');
Route::post('Clasificaciones/Registro','ClasificacionesController@Registro');
Route::post('Clasificaciones/Editar','ClasificacionesController@Editar');
Route::get('Clasificaciones/Eliminar/{id}','ClasificacionesController@Eliminar');

#--------------------------- Unidad Medida ---------------------------------------#
Route::get('UnidadMedida','UnidadMedidaController@index');
Route::post('UnidadMedida/Registro','UnidadMedidaController@Registro');
Route::post('UnidadMedida/Editar','UnidadMedidaController@Editar');
Route::get('UnidadMedida/Eliminar/{id}','UnidadMedidaController@Eliminar');

#--------------------------- Productos ---------------------------------------#
Route::get('Productos','ProductosController@index');
Route::post('Productos/Registro','ProductosController@Registro');
Route::post('Productos/Editar','ProductosController@Editar');
Route::get('Productos/Eliminar/{id}','ProductosController@Eliminar');
Route::get('Galeria','ProductosController@Galeria');

#--------------------------- Formularios ---------------------------------------#
Route::get('Formularios/ProductoRegistro','FormulariosController@ProductoRegistro');
Route::get('Formularios/ClasificacionRegistro','FormulariosController@ClasificacionesRegistro');
Route::get('Formularios/ClasificacionEditar/{id}','FormulariosController@ClasificacionEditar');
Route::get('Formularios/UnidadMedidaRegistro','FormulariosController@UnidadMedidaRegistro');
Route::get('Formularios/UnidadMedidaEditar/{id}','FormulariosController@UnidadMedidaEditar');
Route::get('Formularios/ProductoEditar/{id}','FormulariosController@ProductoEditar');

