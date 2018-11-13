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
Route::get('/publicacioninve', 'PublicacionController@index')->name('publicacioninve');
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
Route::get('/escritorioinv', function () {
    return view('investigaciones.escritorioinv');
})->name('escritorioinv');
Route::get('/escritorioinvestigador', function () {
    return view('investigaciones.escritorioinvestigador');
})->name('escritorioinvestigador');
Route::get('/escritoriocomite', function () {
    return view('investigaciones.escritoriocomite');
})->name('escritoriocomite');
Route::get('/administracion', function () {
    return view('admin.administracion');
})->name('administracion');
Route::get('/postulaciones', function () {
    return view('investigaciones.postulaciones');
})->name('postulaciones');
Route::get('/asesoriasescritorio', function () {
    //$asesorias = \App\Asesoria::paginate(6);
    $asesoriasact = DB::table('asesoria')->where('estado','activa')->paginate(6);
    $asesoriasfin = DB::table('asesoria')->where('estado','finalizada')->paginate(6);
    //return view('asesoria.asesoriasescritorio')->with('asesorias',$asesorias);
    return view('asesoria.asesoriasescritorio',compact('asesoriasact','asesoriasfin'));
})->name('asesescritorio');
Route::get('/nombreinvpostulacion', function () {
    return view('postulacion.nombreinvpostulacion');
})->name('nombreinvpostulacion');

//ruta aceptar asesoria
Route::get('/aceptarasesoria/{id}','AsesoriaController@AceptarAsesoria', function($id){
    return redirect()->action(
        'AsesoriaController@AceptarAsesoria', ['id' => $id]
    );
});

Route::resource('moduloasesoria','AsesoriaController');
Route::get('/moduloasesoria/eliminar/{id}','AsesoriaController@eliminar')->name('eliminarasesoria');
Route::get('/moduloasesoria/finalizar/{id}','AsesoriaController@finalizar')->name('finalizarasesoria');
Route::resource('moduloinvestigaciones','InvestigacionController');
//''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
//-------------postulacion
//''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

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
//---------vista de investigacion gru
Route::get('/proyectogrupal', function () {
    return view('invproyecto.proyectogrupal');
})->name('proyectogrupal');
Route::get('/proyectogrupalpost', function () {
    return view('invproyecto.proyectogrupalpost');
})->name('proyectogrupalpost');

Route::get('/proyectoverpost/{id}','PostulacionController@showproyectoverpost')->name('proyectoverpost.showproyectoverpost');
//----------subir archivo a la investigacion
Route::get('/proyectovista/{id}', function ($id) {
    return view('invproyecto.proyectovista') ->with('idpostulacion',$id);
})->name('proyectovista');
//proyecto vista de subir archivo 
Route::post('/proyectovista', 'PostulacionController@enviar')->name('proyectovista');

//---------vista de investigaciones
Route::get('/investigacionprincipal', function () {
    return view('invproyecto.investigacionprincipal');
})->name('investigacionprincipal');

//---------vista de las postulaciones por el boton
Route::get('/postulaciones/{id}', function ($id) {
    $inv = \ App\ Investigacion::find($id);
    return view('postulacion.postulaciones')->with('inv',$inv);
})->name('postulaciones');

//--vista de lista de postulaciones
Route::get('/listapostulaciones', function () {//postulacion
    return view('postulacion.listapostulaciones');
})->name('listapostulaciones');
//ruta aceptar postulacion
Route::get('/aceptarpostulacion/{id}','PostulacionController@AceptarPostulacion', function($id){
    return redirect()->action(
        'PostulacionController@AceptarPostulacion', ['id' => $id]
    );
});
//rechachar postulacion
Route::get('/rechazarpostulacion/{id}','PostulacionController@RechazarPostulacion', function($id){
    return redirect()->action(
        'PostulacionController@RechazarPostulacion', ['id' => $id]
    );
});

//Eliminar postulacion rechazada
Route::resource('modulopost','PostulacionController');
Route::get('modulopost/{id}/destroy',[
    'uses' => 'PostulacionController@destroy',
    'as' => 'modulopost.destroy'
]);
//showsPost
Route::get('/listapostulaciones/{id}','PostulacionController@showPost', function($id){
    return redirect()->action(
        'PostulacionController@showPost', ['id' => $id]
    );
});
Route::resource('modulopostulacion','PostulacionController');
//ver postulacion
Route::resource('verPostulacion','PostulacionController');
//ver postulacion de solicitud de postulacion
Route::get('/verSolPostulaciones/{id}','PostulacionController@showverpost')->name('verSolPostulaciones');
//boton de ver investigacion
Route::get('/modpost/{id}' , 'PostulacionController@invtg')->name('modpost');//estaaa
//--vista de encuesta 1 y dos
Route::get('/vistaencuesta', function () {
    return view('invproyecto.vistaencuesta');
})->name('vistaencuesta');
//''vista de las investigaciones
Route::get('/vistainvestigaciones', function () {
    return view('invproyecto.vistainvestigaciones');
})->name('vistainvestigaciones');

//-------------Ruta nuevas---------------------------------
Route::get('/detallesinv/{id}', 'PostulacionController@detalle')->name('detallesinv');
//-----------------------------------------------------------

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

//---------------------Encuesta de Ivestigadores---------------------------------
//route de encuesta 1
Route::get('encuesta',[
    'uses' => 'EncuestaController@encuesta',
    'as' =>'encuesta.encuesta'
]);
Route::post('/encuesta', 'EncuestaController@store')->name('encuesta');
//route de encuesta 2
Route::get('encuestados',[
    'uses' => 'EncuestaController@encuestados',
    'as' =>'encuesta.encuestados'
]);
Route::post('/encuestados', 'EncuestaController@storeencuestados')->name('encuestados');
//----------------------------------------------------------------------------------------
//respuesta encuesta 1
Route::get('/encuestauno/{id}', function ($id){
    $encuesta = DB::table('encuesta')->where('id_usuario',$id)->first();
        //dd($encuesta);
    return view('encuesta.RespuestaInvInicial')->with('encuesta',$encuesta);
})->name('encuestauno');
Route::post('/encuestauno', 'EncuestaController@storerespuestauno')->name('encuestauno');

//encuesta 1 pregunta
Route::get('/encuestaunopreg/{id}', function ($id) {
    $inv = \ App\ Investigacion::find($id);
    return view('encuesta.EncuestaInvInicial')->with('inv',$inv);
})->name('encuestaunopreg');
Route::post('/encuestaunopreg', 'EncuestaController@store')->name('encuestaunopreg');
//----------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------
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