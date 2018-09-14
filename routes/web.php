<?php

/*
|Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'FrontController@index');
Route::get('/asesorias', 'FrontController@asesorias');
Route::get('/solicitud/{id}', 'SolicitudController@mostrar');
