<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index')->name("main");
Route::get('/maratones/detalle/{id}', 'HomeController@editar_maraton')->name('guardar');
Route::get('/vista/maraton/{id}', 'HomeController@vista')->name("vista");
Route::get('/minor', 'HomeController@minor')->name("minor");
Route::post('/ajax-guardar', 'HomeController@ajax_guardar')->name('guardar');
Route::post('/ajax-guardar-maratones', 'HomeController@ajax_guardar_maratones')->name('guardar');
Route::post('/ajax-guardar-respuestas', 'HomeController@ajax_guardar_respuestas')->name('guardar');
Route::post('/ajax-listar', 'HomeController@ajax_listar')->name('guardar');
Route::post('/ajax-listar-maratones', 'HomeController@ajax_listar_maratones')->name('guardar');
Route::get('/lista/detalle/{id}', 'HomeController@editar')->name('guardar');
Route::get('/lista/eliminar/{id}', 'HomeController@eliminar')->name('guardar');
Route::get('/maratones/eliminar/{id}', 'HomeController@eliminar_maratones')->name('guardar');
Route::post('/ajax-eliminar-respuestas', 'HomeController@ajax_eliminar_respuestas')->name('guardar');
Route::post('/guardar-generales', 'HomeController@guardar_generales')->name('guardar');
Route::post('/enviar-respuesta', 'HomeController@enviar_respuesta')->name('guardar');
