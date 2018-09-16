<?php

/*
|Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'FrontController@index');
Route::get('/asesorias', 'FrontController@asesorias');
Route::get('/investigacion', 'FrontController@investigacion');
Route::get('/solicitud', 'RequestController@solicitud');

//route de solicitud
Route::group(['prefix' => 'solic'], function(){
    Route::resource('solicitud','RequestController');
});