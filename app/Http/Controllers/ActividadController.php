<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postulacion;
use App\Solicitud;
use App\Investigacion;
use App\Actividad;
use DB;

class ActividadController extends Controller
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
//funcion de descarga de archivos 
/* public function descargafuc(){
    $actividad = DB::table('actividad')->get();
    return view('actividad.veractividadasignada',compact('veractividadasignada'));
} */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //buscar y modificar actividad
        $actividad = DB::table('actividad')->where('id_investigacion',Postulacion::find($request->id_postulacion)->id_post)->where('titulo',$request->titulo)->first();
        $actividad = Actividad::find($actividad->id);
        //dd($actividad);
        $actividad->fill($request->all());
        $actividad->asignado = true;
        //id de investigador
        $actividad->id_investigador = Postulacion::find($actividad->id_postulacion)->id_invest;
        $postulacion = Postulacion::find($actividad->id_postulacion);
        $postulacion->estado = "aceptada";
        $postulacion->save();

        $actividad->save();
        return redirect('/nombreinvpostulacion')->with('success','Actividad asignada');
        /* //actividad crear
        $actividad = new Actividad($request->all());
        //id de la investigacion
        $actividad->id_investigacion = Postulacion::find($actividad->id_postulacion)->id_post;
        //id de investigador
        $actividad->id_investigador = Postulacion::find($actividad->id_postulacion)->id_invest;
        $postulacion = Postulacion::find($actividad->id_postulacion);
        $postulacion->estado = "aceptada";
        $postulacion->save();

        $actividad->save();
        return redirect('/nombreinvpostulacion')->with('success','Actividad Creada'); */

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
