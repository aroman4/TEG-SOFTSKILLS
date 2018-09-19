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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//ruta de prueba
Route::get('/prueba', 'FrontController@prueba');
Route::get('/aprender', 'FrontController@aprender');
Route::get('/pruebablade', 'FrontController@Pruebablade');
Route::get('/prueba', 'FrontController@prueba');
Route::get('/header', 'FrontController@header');
Route::get('/footer', 'FrontController@footer');


