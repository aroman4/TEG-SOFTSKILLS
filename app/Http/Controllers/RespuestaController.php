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
        // remove the token
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

            $respuestaArray[] = $newRespuesta;
        };
        return redirect()->action('CuestionarioController@ver_respuestas_cuestionario', [$cuestionario->id]);
    }
}
