<?php
/**********************************************************************/
/* Route del proyecto TEG realizado por Alvaro Roman y Felicia Jardim */
/**********************************************************************/

Route::get('/', 'FrontController@index')->name('index');
Route::get('/asesorias', 'FrontController@asesorias')->name('asesorias');
Route::get('/solicitud/{id}', 'SolicitudController@mostrar');
Route::get('/investigacion', 'FrontController@investigacion')->name('investigacion');
Route::get('/solicitud', 'RequestController@solicitud');

//publicacion
Route::get('/publicacioninve', 'PublicacionController@index')->name('index');

//route de usuario
route::group(['prefix' => 'admin'], function(){
    Route::resource('usuarios','UsersController');
    Route::get('/usuarios/borrar/{id}','UsersController@borrar')->name('usuarios.borrar');
    Route::get('/export','UsersController@export')->name('usuarios.export');
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
    Route::get('x', 'RequestController@prueba'); 
});

//route de postulacion
Route::group(['prefix' => 'postulacion'], function(){
    Route::resource('postulacion','PostulacionController');
    //Eliminar
    Route::get('postulacion/{id}/destroy',[
        'uses' => 'PostulacionController@destroy',
        'as' => 'postulacion.destroy'
    ]);
    Route::get('solicpostulacion/{idinv}', 'PostulacionController@SolicPostulacion')->name('solicpostulacion');
});

Route::resource('moduloinvestigacion','InvestigacionController');

//Editar solicitud
Route::get( '/editarinves/{id}' , 'RequestController@editarInvestigacion')->name('editarinves');

//otro eliminar 
Route::resource('moduloinv','InvestigacionController');
Route::get('moduloinv/{id}/destroy',[
    'uses' => 'InvestigacionController@destroy',
    'as' => 'moduloinv.destroy'
]);

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
Route::get('/escritoriocomite', function () {
    return view('investigaciones.escritoriocomite');
})->name('escritoriocomite');//duda
Route::get('/administracion', function () {
    return view('admin.administracion');
})->name('administracion');
Route::get('/postulaciones', function () {
    return view('investigaciones.postulaciones');
})->name('postulaciones');
Route::get('/asesoriasescritorio', function () {
    $asesorias = \App\Asesoria::paginate(6);
    return view('asesoria.asesoriasescritorio')->with('asesorias',$asesorias);
})->name('asesescritorio');

//ruta aceptar asesoria
Route::get('/aceptarasesoria/{id}','AsesoriaController@AceptarAsesoria', function($id){
    return redirect()->action(
        'AsesoriaController@AceptarAsesoria', ['id' => $id]
    );
});
Route::resource('moduloasesoria','AsesoriaController');
Route::resource('moduloinvestigaciones','InvestigacionController');
Route::resource('verPostulacion','PostulacionController');

//cuestionario
Route::get('/cuestionario', 'CuestionarioController@home')->name('cuestionario.home');
Route::get('/cuestionario/nuevo/{id}','CuestionarioController@nuevoNuevo')->name('cuestionario.nuevoq');
Route::get('/cuestionario/new', 'CuestionarioController@nuevoCuest')->name('cuestionario.nuevo');
Route::get('/cuestionario/{cuestionario}', 'CuestionarioController@detalle')->name('cuestionario.detalle');
Route::get('/cuestionario/creacion/{cuestionario}', 'CuestionarioController@crearnext')->name('cuestionario.crearnext');
Route::get('/cuestionario/ver/{cuestionario}', 'CuestionarioController@ver_cuestionario')->name('cuestionario.ver');
Route::get('/cuestionario/respuesta/{cuestionario}', 'CuestionarioController@ver_respuestas_cuestionario')->name('cuestionario.respuestas');
Route::get('/cuestionario/{id}/borrar', 'CuestionarioController@delete_cuestionario')->name('cuestionario.delete');
 
Route::get('/cuestionario/{cuestionario}/editar', 'CuestionarioController@edit')->name('cuestionario.editar');
Route::patch('/cuestionario/{cuestionario}/update', 'CuestionarioController@update')->name('cuestionario.update');
 
Route::post('/cuestionario/ver/{cuestionario}/completado', 'RespuestaController@store')->name('cuestionario.completado');
Route::post('/cuestionario/crear', 'CuestionarioController@crear')->name('cuestionario.crear');
 
// preguntas
Route::post('/cuestionario/{cuestionario}/preguntas', 'PreguntaController@store')->name('pregunta.guardar');
 
Route::get('/pregunta/{pregunta}/editar', 'preguntaController@edit')->name('pregunta.editar');
Route::patch('/pregunta/{pregunta}/update', 'preguntaController@update')->name('pregunta.update');

//Rubricas
Route::get('/rubrica/nuevo/{id}','RubricaController@nuevaRubrica')->name('rubrica.nuevo');
Route::get('/rubrica/pantallanuevo/{id}','RubricaController@pantallaNuevo')->name('rubrica.pantallanuevo');
Route::post('/rubrica/crear', 'RubricaController@crear')->name('rubrica.crear');
Route::get('/rubrica/{rubrica}', 'RubricaController@detalle')->name('rubrica.detalle');
Route::get('/rubrica/predefinida/{rubrica}/ase/{asesoria}', 'RubricaController@detallepred')->name('rubrica.detallepred');
Route::post('/rubrica/formar/{id}', 'RubricaController@formar')->name('rubrica.formar');
Route::get('/rubrica/responder/{rubrica}', 'RubricaController@responderRubrica')->name('rubrica.responder');
Route::get('/rubrica/respuesta/{rubrica}', 'RubricaController@respuestasRubrica')->name('rubrica.respuesta');
Route::post('/rubrica/guardarrespuesta{id}','RubricaController@guardarRespuesta')->name('rubrica.guardarResp');

//admin
//ruta aceptar investigacion
Route::get('/aceptarinvestigacion/{id}','InvestigacionController@AceptarInvestigacion', function($id){
    return redirect()->action(
        'InvestigacionController@AceptarInvestigacion', ['id' => $id]
    );
});

//ruta de prueba BORRAR LUEGO
Route::get('/prueba', 'FrontController@prueba');
Route::get('/aprender', 'FrontController@aprender');
Route::get('/pruebablade', 'FrontController@Pruebablade');
Route::get('/prueba', 'FrontController@prueba');
Route::get('/header', 'FrontController@header');
Route::get('/footer', 'FrontController@footer');

//webchat
Route::get('/chat/{id}','AsesoriaController@getChat')->middleware('auth')->name('getChat');

//agenda
Route::get('agenda', 'EventController@index')->middleware('auth')->name('agenda');
Route::post('eventonuevo', 'EventController@crear')->middleware('auth')->name('eventonuevo');
Route::get('/crearevento', function () {
    return view('agenda.crearevento');
})->name('crearevento');
Route::get('agenda/{idase}', 'EventController@mostrarEvAsesoria')->middleware('auth')->name('mostrarAgAs');
Route::get('crearevento/{idase}',  function ($idase) {
    return view('agenda.creareventoase')->with('idase',$idase);
})->middleware('auth')->name('creareventoAse');

//reporte
/* Route::get('/reporte', function () {
    return view('reportes.reportedetalle');
})->name('reportedetalle'); */
Route::get('/reporte', 'AsesoriaController@reporteshome')->name('reporteshome');
Route::get('/reportease/{id}', 'AsesoriaController@reporteasesoria')->name('reporteasesoria');
//pdf del reporte
Route::post('reportePdf','CuestionarioController@reportePdf');

//banco clientes
Route::get('bancoclientes',function(){
    return view('asesoria.bancoclientes');
})->middleware('auth')->name('bancoclientes');
Route::get('/exportclientes','UsersController@exportBanco')->name('exportclientes');