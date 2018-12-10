<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cuestionario;
use App\Respuesta;
use App\Http\Requests;

class RespuestaController extends Controller
{
    public function store(Request $request, Cuestionario $cuestionario) 
    {
        // quitar el token
        $arr = $request->except('_token');
        foreach ($arr as $key => $value) {
            $newRespuesta = new Respuesta();
            if (! is_array( $value )) {
                $newValue = $value['respuesta'];
            } else {                
                $newValue = json_encode($value['respuesta']);
            }
            $newRespuesta->respuesta = $newValue;
            $newRespuesta->pregunta_id = $key;
            $newRespuesta->user_id = Auth::id();
            $newRespuesta->cuestionario_id = $cuestionario->id;

            $newRespuesta->save();
            //guardar el cuestionario como respondido
            $cuestionario->respondido = true;
            $cuestionario->save();

            $respuestaArray[] = $newRespuesta;
        };
        //return redirect()->action('CuestionarioController@ver_respuestas_cuestionario', [$cuestionario->id]);
        return redirect()->route('escritoriocliente')->with('Success','Cuestionario respondido exitosamente');
    }
    public function storepublic(Request $request, Cuestionario $cuestionario) 
    {
        // quitar el token
        $arr = $request->except('_token');
        foreach ($arr as $key => $value) {
            $newRespuesta = new Respuesta();
            if (! is_array( $value )) {
                $newValue = $value['respuesta'];
            } else {                
                $newValue = json_encode($value['respuesta']);
            }
            $newRespuesta->respuesta = $newValue;
            $newRespuesta->pregunta_id = $key;
            $newRespuesta->user_id = 0; //publico
            $newRespuesta->cuestionario_id = $cuestionario->id;

            $newRespuesta->save();
            //guardar el cuestionario como respondido
            $cuestionario->respondido = true;
            $cuestionario->save();

            $respuestaArray[] = $newRespuesta;
        };
        return redirect()->route('cuestionariopublicorespondido');
    }
}
