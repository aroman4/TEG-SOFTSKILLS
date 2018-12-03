<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asesoria;
use App\Rubrica;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Dompdf\Dompdf;
use App\Exports\RubricaExport;
use Maatwebsite\Excel\Facades\Excel;

class RubricaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function nuevaRubrica($id){
        $ase = Asesoria::find($id);
        return view('rubricas.pantallaNuevo')->with('asesoria',$ase);
    }
    public function pantallaNuevo($id){
        $ase = Asesoria::find($id);
        return view('rubricas.nuevo')->with('asesoria',$ase);
    }
    public function detallepred($idrub, $idase){
        $rubrica = Rubrica::find($idrub);
        //$rubricaNueva = new Rubrica($rubrica);
        $rubricaNueva = $rubrica->replicate();
        $asesoria = Asesoria::find($idase);
        $rubricaNueva->user_id = auth()->user()->id;
        $rubricaNueva->predefinido = false;
        $rubricaNueva->id_asesoria = $idase;
        $rubricaNueva->cliente_id = $asesoria->id_cliente;
        $rubricaNueva->enviar = false;
        $rubricaNueva->predefinidoasesor = false;
        $rubricaNueva->save();
        return view('rubricas.detallepred')->with('rubrica',$rubricaNueva);
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
        //return redirect()->route('moduloasesoria.show',$rubrica->id_asesoria)->with('success','Rúbrica creada exitosamente');
        return redirect()->route('rubrica.ver',$id);
    }
    public function responderRubrica($id){
        $rubrica = Rubrica::find($id);
        if(auth()->user()->tipo_usu == "asesor"){
            return view('rubricas.responderasesor')->with('rubrica',$rubrica);
        }else{
            return view('rubricas.respondercliente')->with('rubrica',$rubrica);
        }
        
    }
    public function respuestasRubrica($id){
        //dd('sup');
        $rubrica = Rubrica::find($id); //busco la rubrica en la tabla
        return view('rubricas.resultados')->with('rubrica',$rubrica);

    }
    public function guardarRespuesta(Request $request, $id){
        //tomo los valores de la respuesta de la rubrica
        //dd($request);
        $rubrica = Rubrica::find($id); //busco la rubrica en la tabla
        $rubrica->fill($request->all()); //asigno a rubrica las respuestas
        if(auth()->user()->id == $rubrica->user_id){ //asesor
            $rubrica->respondidoa = true; //coloco la rubrica como respondida
        }else{ //cliente
            $rubrica->respondidoc = true; //coloco la rubrica como respondida
        }
        $rubrica->save(); //guardo en la bd
        //calcular los resultados de las filas
        if($rubrica->respondidoa){ //si fue respondido por el asesor
            //promediar los resultados
            $promedio = 0;
            for($i=0;$i < $rubrica->filas; $i++){ //para cada fila
                //$promedio = $promedio + $rubrica->{'respuestaa'.$i} + 1; //le sumo 1 para valorar mejor
                //guardar total cada fila
                $rubrica->{'total'.$i.'a'} = ($rubrica->{'respuestaa'.$i}) * ($rubrica->baseevaluacion/($rubrica->filas))/$rubrica->columnas;
                $promedio = $promedio + $rubrica->{'total'.$i.'a'};
                $rubrica->save();
            }
            //$promedio = $promedio/($rubrica->filas);
            //sacar valor base a 20
            //$promedio = $promedio * 20/($rubrica->columnas);
            //$promedio = intval($promedio); //convertir a entero

            //guardar total
            $rubrica->{'totala'} = $promedio;
            $rubrica->save();
        }
        if($rubrica->respondidoc){ //si fue respondido por el cliente
            //promediar los resultados
            $promedio = 0;
            for($i=0;$i < $rubrica->filas; $i++){
                //$promedio = $promedio + $rubrica->{'respuestac'.$i} + 1;
                //guardar total cada fila
                $rubrica->{'total'.$i.'c'} = ($rubrica->{'respuestac'.$i}) * ($rubrica->baseevaluacion/($rubrica->filas))/$rubrica->columnas;
                $promedio = $promedio + $rubrica->{'total'.$i.'c'};
                $rubrica->save();
            }
            /* $promedio = $promedio/($rubrica->filas);
            //sacar valor base a 20
            $promedio = $promedio * 20/($rubrica->columnas);
            $promedio = intval($promedio); //convertir a entero */
            //guardar total
            $rubrica->{'totalc'} = $promedio;
            $rubrica->save();
        }
        return redirect()->route('moduloasesoria.show',$rubrica->id_asesoria)->with('success','Rúbrica respondida exitosamente');
    }

    public function EliminarRubrica($id){
        $rubrica = Rubrica::find($id);
        $rubrica->delete();
        return redirect()->route('moduloasesoria.show',$rubrica->id_asesoria)->with('error','Rúbrica eliminada');
    }

    public function ver($id){
        $rubrica = Rubrica::find($id);
        return view('rubricas.ver')->with('rubrica',$rubrica);
    }
    public function enviar($id){
        $rubrica = Rubrica::find($id);
        $rubrica->enviar = true;
        $rubrica->save();
        return back()->with('success','Rúbrica enviada al cliente');
    }
    public function guardarpred($id){
        $rubrica = Rubrica::find($id);
        $rubrica->predefinidoasesor = true;
        $rubrica->save();
        return back()->with('success','Rúbrica guardada como predefinida');
    }
    public function exportExcel($id) 
    {
        $rubrica = Rubrica::find($id);
        return Excel::download(new RubricaExport($id), $rubrica->titulo.'.xlsx');
    }
}
