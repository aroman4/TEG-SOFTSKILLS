<?php

/*
|Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'FrontController@index');
Route::get('/asesorias', 'FrontController@asesorias');
Route::get('/solicitud/{id}', 'SolicitudController@mostrar');
Route::get('/investigacion', 'FrontController@investigacion');
Route::get('/solicitud', 'RequestController@solicitud');

//route de usuario
route::group(['prefix' => 'admin'], function(){
    Route::resource('usuarios','UsersController');
});
//route de solicitud
Route::group(['prefix' => 'solic'], function(){
    Route::resource('solicitud','RequestController');
});