<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asesoria;
use App\Rubrica;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class RubricaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function nuevaRubrica($id){
        $ase = Asesoria::find($id);
        return view('rubricas.nuevo')->with('asesoria',$ase);
    }
    public function crear(Request $request){
        //dd($request);
        $arr = $request->all();
        $arr['user_id'] = Auth::id();
        $rub = new Rubrica($arr);
        $rub->save();
        return redirect()->route('rubrica.detalle',$rub->id);
    }
    public function detalle($id){
        $rubrica = Rubrica::find($id);
        return view('rubricas.detalle', compact('rubrica'));
    }
    public function formar(Request $request, $id){
        //en esta funcion debo mezclar y guardar la rubrica con los valores nuevos
        $rubrica = Rubrica::find($id); //busco la rubrica en la tabla
        $rubrica->fill($request->all()); //asigno a rubrica los valores nuevos
        $rubrica->save(); //guardo en la bd
        return redirect()->route('moduloasesoria.show',$rubrica->id_asesoria)->with('success','Rúbrica creada exitosamente');
    }
    public function responderRubrica($id){
        $rubrica = Rubrica::find($id);
        return view('rubricas.responder')->with('rubrica',$rubrica);
    }
    public function respuestasRubrica($id){
        
    }
    public function guardarRespuesta(Request $request, $id){
        //tomo los valores de la respuesta de la rubrica
        $rubrica = Rubrica::find($id); //busco la rubrica en la tabla
        $rubrica->fill($request->all()); //asigno a rubrica las respuestas
        $rubrica->respondido = true; //coloco la rubrica como respondida
        $rubrica->save(); //guardo en la bd
        return redirect()->route('moduloasesoria.show',$rubrica->id_asesoria)->with('success','Rúbrica respondida exitosamente');
    }
}
