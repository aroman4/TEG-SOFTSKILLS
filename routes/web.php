<?php
use Illuminate\Http\Request;

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
Route::get('/resultados', 'InvestigacionController@index')->name('resultados');

/* Route::get('/nombreinvpostulacion', 'PublicacionController@index')->name('nombreinvpostulacion');
 */
//route de usuario
route::group(['prefix' => 'admin'], function(){
    Route::resource('usuarios','UsersController');
    Route::get('/usuarios/borrar/{id}','UsersController@borrar')->name('usuarios.borrar');
    Route::get('/export','UsersController@export')->name('usuarios.export');
});
//Editar usuario
Route::get( '/editarusu/{id}' , 'UsersController@edit')->name('editarusu');

//route de solicitud
Route::group(['prefix' => 'solic'], function(){
    Route::resource('solicitud','RequestController')->middleware('auth');
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
    Route::get('solicpostulacionfuera/{idinv}', function($idinv){
        return view('solic.solicitud.SolicPostulacionFuera')->with('inv',$idinv);
    })->name('solicpostulacionfuera');
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
})->middleware('auth')->name('escritoriocliente');
Route::get('/escritorioasesor', function () {
    return view('asesoria.escritorioasesor');
})->middleware('auth')->name('escritorioasesor');
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
    if(auth()->user()->tipo_usu == "admin"){
        return view('admin.administracion');
    }else{
        return redirect()->route('index')->with('error','No tienes permiso para acceder aquí.');
    }
})->name('administracion');
Route::get('/postulaciones', function () {
    return view('investigaciones.postulaciones');
})->name('postulaciones');
Route::get('/resultados', function () {
    return view('investigaciones.resultados');
})->name('resultados');
Route::get('/asesoriasescritorio', function () {
    //$asesorias = \App\Asesoria::paginate(6);
    $asesoriasact = DB::table('asesoria')->where('estado','activa')->paginate(6);
    $asesoriasfin = DB::table('asesoria')->where('estado','finalizada')->paginate(6);
    //return view('asesoria.asesoriasescritorio')->with('asesorias',$asesorias);
    return view('asesoria.asesoriasescritorio',compact('asesoriasact','asesoriasfin'));
})->middleware('auth')->name('asesescritorio');
Route::get('/nombreinvpostulacion', function () {
    return view('postulacion.nombreinvpostulacion');
})->name('nombreinvpostulacion');

//ruta aceptar asesoria
Route::get('/aceptarasesoria/{id}','AsesoriaController@AceptarAsesoria', function($id){
    return redirect()->action(
        'AsesoriaController@AceptarAsesoria', ['id' => $id]
    );
});
Route::get('/aceptarasesoriaase/{id}','AsesoriaController@AceptarSolicitudAse', function($id){
    return redirect()->action(
        'AsesoriaController@AceptarSolicitudAse', ['id' => $id]
    );
});
Route::get('/rechazarasesoriaase/{id}','AsesoriaController@RechazarSolicitudAse', function($id){
    return redirect()->action(
        'AsesoriaController@RechazarSolicitudAse', ['id' => $id]
    );
});
Route::get('/rechazarasesoria/{id}','AsesoriaController@RechazarSolicitud', function($id){
    return redirect()->action(
        'AsesoriaController@RechazarSolicitud', ['id' => $id]
    );
});
Route::resource('moduloasesoria','AsesoriaController');
Route::get('/moduloasesoria/eliminar/{id}','AsesoriaController@eliminar')->name('eliminarasesoria');
Route::post('/moduloasesoria/finalizar','AsesoriaController@finalizar')->name('finalizarasesoriapost');
Route::get('/moduloasesoria/finalizar/{id}',function($id){
    $asesoria = \App\Asesoria::find($id);
    return view('asesoria.reportefinal')->with('asesoria',$asesoria);
})->name('finalizarasesoria');
Route::get('/moduloasesoria/reporte/{id}',function($id){
    $asesoria = \App\Asesoria::find($id);
    $reporte = \App\Reportefinalase::find($asesoria->reporte_id);
    return view('reportes.reportefinalase',compact('asesoria','reporte'));
})->name('reportefinalasesoria');
//presolicitud
Route::get('/presolicitud',function(){
    return view('asesoria.presolicitud');
})->name('presolicitud');
Route::post('/presolic','RequestController@storePre');
//postulacion asesor
Route::get('/postulacionasesor',function(){
    return view('asesoria.solicitudasesor');
})->name('postulacionasesor');
Route::post('/postasesor','RequestController@storePostAsesor');
Route::get('/solasedetalle/{id}',function($id){
    $solicitud = \App\Solicitud::find($id);
    return view('asesoria.solicitudasedetalle')->with('solicitud',$solicitud);
})->name('solasedetalle');



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
//''''''subir archivo final de la investigacion'''''''''''
Route::get('/subirarchivofinal/{id}', function ($id) {
    return view('investigaciones.subirarchivofinal') ->with('idinvestigacion',$id);
})->name('subirarchivofinal');
//proyecto vista de subir archivo 
Route::post('/subirarchivofinal', 'InvestigacionController@enviar')->name('subirarchivofinalpost');

//''''''''''''''''''''''''''''''''''''''''''''''''''''''''
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
//investigacion finalizada
//ruta aceptar postulacion
Route::get('/aceptarinvest/{id}','InvestigacionController@AceptarInvest', function($id){
    return redirect()->action(
        'InvestigacionController@AceptarInvest', ['id' => $id]
    );
});
//rechachar postulacion
Route::get('/rechazarinvest/{id}','InvestigacionController@RechazarInvest', function($id){
    return redirect()->action(
        'InvestigacionController@RechazarInvest', ['id' => $id]
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
Route::get('/vistaencuesta/{id}', function ($id) {
    $encuestastodas = DB::table('encuesta')->where('id_investg',$id)->get();
    return view('invproyecto.vistaencuesta')->with('encuestastodas',$encuestastodas);
})->name('vistaencuesta');
//--vista de las investigaciones
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

Route::get('/cuestionariopublico/{id}',function($id){
    $cuestionario = \App\Cuestionario::find($id);
    $cuestionario->opcion = unserialize($cuestionario->opcion);
    return view('cuestionario.encuestapublica', compact('cuestionario'));
})->name('cuestionariopublico');
Route::post('/cuestionario/ver/{cuestionario}/publico', 'RespuestaController@storepublic')->name('cuestionario.publico');
Route::get('/cuestionariopublicorespondido',function(){
    return view('cuestionario.respondido');
})->name('cuestionariopublicorespondido');

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
Route::get('/rechazarinvestigacion/{id}','InvestigacionController@RechazarInvestigacion', function($id){
    return redirect()->action(
        'InvestigacionController@RechazarInvestigacion', ['id' => $id]
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
    //$encuesta = DB::table('encuesta')->where('id_usuario',$id)->first();
    $inv = \App\Investigacion::find(DB::table('postulacion')->where('id_invest',$id)->first()->id_post);
    $postulante = $id;
    return view('encuesta.RespuestaInvInicial',compact('inv','postulante'));
})->name('encuestauno');
Route::post('/encuestauno', 'EncuestaController@storerespuestauno')->name('encuestaunopost');

//encuesta 1 pregunta
Route::get('/encuestaunopreg/{id}', function ($id) {
    $inv = \ App\ Investigacion::find($id);
    return view('encuesta.EncuestaInvInicial')->with('inv',$inv);
})->name('encuestaunopreg');
Route::post('/encuestaunopreg', 'EncuestaController@store')->name('encuestaunopregpost');
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
Route::get('/chat/{id}','AsesoriaController@getChat')->name('getChat');

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

//actividad
//---------vista de actividad de Lider
Route::get('/crearactividad/{id}', function ($id) {
    $inv = \ App\ Postulacion::find($id);
    return view('actividad.crearactividad')->with('inv',$inv);
})->name('crearactividad');
Route::post('crearactividad','ActividadController@store');

//--actividad asignada
Route::get('/veractividadasignada/{id}', function ($id) {
    $actividad = DB::table('actividad')->where('id_postulacion',$id)->first();
    return view('actividad.veractividadasignada')->with('actividad',$actividad);
})->name('veractividadasignada');


//mensajes
Route::get('/mensajes/{id}',function($id){
    //$recibidos = DB::table('mensaje')->where('id_destinatario',$id)->get();
    $recibidos = DB::table('mensaje')->where('id_destinatario',$id)->orderBy('id','desc')->get();
    //$enviados = DB::table('mensaje')->where('id_remitente',$id)->get();
    $enviados = DB::table('mensaje')->where('id_remitente',$id)->orderBy('id','desc')->get();
    return view('mensajes.bandejaentrada',compact('recibidos','enviados'));
})->middleware('auth')->name('mensajes');

Route::get('/crearmensaje/{id_destinatario}',function($id_destinatario){
    $id_remitente = auth()->user()->id;
    return view('mensajes.nuevomensaje',compact('id_destinatario','id_remitente'));
})->middleware('auth')->name('crearmensaje');

Route::post('/crearmensaje',function(Request $request){
    $mensaje = new \App\Mensaje($request->all());
    if($request->hasFile('archivo')){
        $archivo = $request->file('archivo');
        $nombreArch = time().$archivo->getClientOriginalName();
        $archivo->move(public_path().'/archivoproyecto/',$nombreArch);
        $mensaje->archivo = $nombreArch;
    }
    $mensaje->save();
    /* Mail::send('email.mensajerecibido',$mensaje->toArray(),function($correo) use ($mensaje){
        $correo->to(\App\User::find($mensaje->id_destinatario)->email,\App\User::find($mensaje->id_destinatario)->nombre)
        ->subject('Mensaje recibido - SoftSkills');
        $correo->from('desarrollohabilidadesblandas@gmail.com','SoftSkills');
    }); */
    return redirect()->route('mensajes',auth()->user()->id);
})->name('crearmensajepost');
Route::get('/vermensaje/{id}',function($id){
    $mensaje = \App\Mensaje::find($id);
    if($mensaje->estado == "recibido"){
        $mensaje->estado = "leido";
        $mensaje->save();
    }
    return view('mensajes.vermensaje')->with('mensaje',$mensaje);
})->middleware('auth')->name('vermensaje');
Route::get('/borrarmensaje/{id}',function($id){
    $mensaje = \App\Mensaje::find($id);
    $mensaje->delete();
    return redirect()->route('mensajes',auth()->user()->id);
})->name('borrarmensaje');

//me gusta
Route::get('/like/{id}', function($id){
    //si no hay votos por este usuario o no ha votado por esta inv
    if((DB::table('voto')->where('user_id',auth()->user()->id)->count() == 0)||(DB::table('voto')->where('id_inv',$id)->count() == 0)){
        //guardar voto
        $voto = new \App\Voto();
        $voto->user_id = auth()->user()->id;
        $voto->id_inv = $id;
        $voto->save();

        //contar like
        $inv = \App\Investigacion::find($id);
        $inv->cantidad = $inv->cantidad + 1;
        $inv->save();
        return back()->with('success','Te ha gustado esta publicación');
    }
    return back();
})->name('like');