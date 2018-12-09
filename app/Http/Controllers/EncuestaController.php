<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Encuesta;
use Illuminate\Support\Facades\DB;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
 //pagina encuesta - vista
    public function encuesta(){
        return view('encuesta.EncuestaInvInicial');
    }
    public function encuestados(){
        return view('encuesta.EncuestaInvFinal');
    }
//ruta de la respuesta de la encuesta -respuestas
    public function Resultencuesta(){
        return view('encuesta.RespuestaInvInicial');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        //dd($request);
        $encuesta = new Encuesta($request->all());
        $encuesta->id_usuario = auth()->user()->id;
        $encuesta->save();
        return redirect('/escritorioinvestigador');
    }
    public function storeencuestados(Request $request)
    {  
        //dd($request);
        $encuesta = new Encuesta($request->all());
        $encuesta->id_usuario = auth()->user()->id;
        $encuesta->save();
        return redirect('/escritorioinvestigador');
    }

    public function storerespuestauno(Request $request)
    {  
        //dd($request);
        $encuesta = new Encuesta($request->all());
        //el usuario es el que se esta evaluando
        //$encuesta->id_usuario = DB::table('postulacion')->where('id_post',$encuesta->id_investg)->first();
        $encuesta->id_creador = auth()->user()->id;
        
        $promedio = 0;
        for($i=0;$i < 6; $i++){
            $promedio = $promedio + ($encuesta->{'respuesta'.$i}+1) * (5/6)/5; //le añadí +1 y cambié el 20 por un 5 para que sea sobre 5
        }
        $encuesta->calificacion = $promedio; 
        $encuesta->save();
        $encuestastodas = DB::table('encuesta')->where('id_investg',1)->get(); //esto esta mal pero solo es para probar algo
        return redirect()->route('detallesinv',$encuesta->id_investg)->with('success','Evaluación Realizada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $encuesta = Encuesta::find($id);
        $encuesta = $request->all();
        $encuesta->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
