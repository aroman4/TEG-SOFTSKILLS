<?php

/*
|Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'FrontController@index')->name('index');
Route::get('/asesorias', 'FrontController@asesorias')->name('asesorias');
Route::get('/solicitud/{id}', 'SolicitudController@mostrar');
Route::get('/investigacion', 'FrontController@investigacion')->name('investigacion');
Route::get('/solicitud', 'RequestController@solicitud');

//route de usuario
route::group(['prefix' => 'admin'], function(){
    Route::resource('usuarios','UsersController');
});
//route de solicitud
Route::group(['prefix' => 'solic'], function(){
    Route::resource('solicitud','RequestController');
    Route::get('solicinvestigacion', 'RequestController@SolicInvestigacion')->name('solicinvestigacion');
    Route::get('solicasesoria', 'RequestController@SolicAsesoria')->name('solicasesoria');
    Route::get('solicpostulacion', 'RequestController@SolicPostulacion')->name('solicpostulacion');
    Route::get('x', 'RequestController@prueba');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ruta escritorios
Route::get('/escritoriocliente', function () {
    return view('asesoria.escritoriocliente');
});

//ruta de prueba
Route::get('/prueba', 'FrontController@prueba');
Route::get('/aprender', 'FrontController@aprender');
Route::get('/pruebablade', 'FrontController@Pruebablade');
Route::get('/prueba', 'FrontController@prueba');
Route::get('/header', 'FrontController@header');
Route::get('/footer', 'FrontController@footer');


