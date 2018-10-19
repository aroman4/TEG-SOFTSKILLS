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
Route::get('/publicacioninve', 'RequestController@publicacioninvestigacion')->name('publicacioninve');

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
    Route::get('solicpostulacion', 'RequestController@SolicPostulacion')->name('solicpostulacion');
    Route::get('x', 'RequestController@prueba'); 
});
//Editar solicitud
Route::get( '/editarinves/{id}' , 'RequestController@editarInvestigacion')->name('editarinves');

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

//ruta aceptar asesoria
Route::get('/aceptarasesoria/{id}','AsesoriaController@AceptarAsesoria', function($id){
    return redirect()->action(
        'AsesoriaController@AceptarAsesoria', ['id' => $id]
    );
});
Route::resource('moduloasesoria','AsesoriaController');
Route::resource('moduloinvestigaciones','InvestigacionController');

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

//admin
//ruta aceptar investigacion
Route::get('/aceptarinvestigacion/{id}','InvestigacionController@AceptarInvestigacion', function($id){
    return redirect()->action(
        'InvestigacionController@AceptarInvestigacion', ['id' => $id]
    );
});
Route::resource('moduloinvestigacion','InvestigacionController');

//ruta de prueba BORRAR LUEGO
Route::get('/prueba', 'FrontController@prueba');
Route::get('/aprender', 'FrontController@aprender');
Route::get('/pruebablade', 'FrontController@Pruebablade');
Route::get('/prueba', 'FrontController@prueba');
Route::get('/header', 'FrontController@header');
Route::get('/footer', 'FrontController@footer');


//mensajes
Route::get('/messages',function(){
    return view('messages');
})->middleware('auth');

Route::get('/getMessages',function(){
    //toma los usuarios con los que el usuario actual ha tenido conversaciones
    $allUsers1 = DB::table('usuario')
    ->join('conversation','usuario.id','conversation.user_one')
    ->where('conversation.user_two',Auth::user()->id)->get();

    $allUsers2 = DB::table('usuario')
    ->join('conversation','usuario.id','conversation.user_two')
    ->where('conversation.user_one',Auth::user()->id)->get();

    return array_merge($allUsers1->toArray(),$allUsers2->toArray());
});

Route::get('/getMessages/{id}',function($id){
    //ver si existe la conversacion
    /* $checkCon = DB::table('conversation')->where('user_one', Auth::user()->id)->where('user_two',$id)->get();
    if(count($checkCon)!=0){
        //get mensajes de la conversacion
        $userMsg = DB::table('messages')->where('messages.conversation_id',$checkCon[0]->id)->get();
        return $userMsg;
    }else{
        echo "no hay mensajes";
    } */
    $userMsg = DB::table('messages')
    ->join('usuario','usuario.id','messages.user_from')
    ->where('messages.conversation_id',$id)->get();
    return $userMsg;
});

Route::post('/sendMessage', function(Request $request){
    //echo $request->msg;
    //en esa funcion tomo lo que se envia
    $conID = $request->conID;
    $msg = $request->msg;

    //aqui busco cual es el usuario al cual se le envia el mensaje
    $fetch_userTo = DB::table('messages')->where('conversation_id',$conID)
    ->where('user_to','!=',Auth::user()->id)->get();
    $userTo = $fetch_userTo[0]->user_to;

    //guardar
    $sendM = DB::table('messages')->insert([
        'user_to' => $userTo,
        'user_from' => Auth::user()->id,
        'msg' => $msg,
        'status' => 1,
        'conversation_id' => $conID
    ]);
    if($sendM){
        echo "mensaje enviado";
    }
});