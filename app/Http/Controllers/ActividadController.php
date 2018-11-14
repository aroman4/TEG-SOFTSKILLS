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
        //actividad crear
        $actividad = new Actividad($request->all());
        //id de la postulacion
        $actividad->id_postulacion  = DB::table('postulacion')->where('id_post',$actividad->id_investigacion)->first()->id;    
        //id de la investigador
        //dd($actividad);
        $actividad->id_investigador = Postulacion::find($actividad->id_postulacion)->id_invest;
        $postulacion = Postulacion::find($actividad->id_postulacion);
        $postulacion->estado = "aceptada";
        $postulacion->save();

        $actividad->save();
        return redirect('/nombreinvpostulacion')->with('success','Actividad Creada');

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
