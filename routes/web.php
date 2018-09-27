<?php
/**********************************************************************/
/* Route del proyecto TEG realizado por Alvaro Roman y Felicia Jardim */
/**********************************************************************/

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
    //Eliminar
    Route::get('solicitud/{id}/destroy',[
        'uses' => 'RequestController@destroy',
        'as' => 'solicitud.destroy'
    ]);
    Route::get('solicinvestigacion', 'RequestController@SolicInvestigacion')->name('solicinvestigacion');
    Route::get('solicasesoria', 'RequestController@SolicAsesoria')->name('solicasesoria');
    Route::get('solicpostulacion', 'RequestController@SolicPostulacion')->name('solicpostulacion');
    Route::get('x', 'RequestController@prueba'); 
});
//Editar solicitud
Route::get( '/editarinves/{id}' , 'RequestController@editarInvestigacion')->name('editarinves');
Route::get( '/editarasesor/{id}' , 'RequestController@editarAsesor')->name('editarasesor');
//Route::get( '/editarclit/{id}' , 'RequestController@editarCliente')->name('editarclit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ruta escritorios
Route::get('/escritoriocliente', function () {
    return view('asesoria.escritoriocliente');
})->name('escritoriocliente');
Route::get('/escritorioasesor', function () {
    return view('asesoria.escritorioasesor');
})->name('escritorioasesor');
Route::get('/escritorioinvestigador', function () {
    return view('investigaciones.escritorioinvestigador');
})->name('escritorioinvestigador');

//ruta de prueba BORRAR LUEGO
Route::get('/prueba', 'FrontController@prueba');
Route::get('/aprender', 'FrontController@aprender');
Route::get('/pruebablade', 'FrontController@Pruebablade');
Route::get('/prueba', 'FrontController@prueba');
Route::get('/header', 'FrontController@header');
Route::get('/footer', 'FrontController@footer');

//ruta aceptar asesoria
Route::get('/aceptarasesoria/{id}','AsesoriaController@AceptarAsesoria', function($id){
    return redirect()->action(
        'AsesoriaController@AceptarAsesoria', ['id' => $id]
    );
});

Route::resource('moduloasesoria','AsesoriaController');


