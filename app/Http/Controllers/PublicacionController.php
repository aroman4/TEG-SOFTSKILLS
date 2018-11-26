<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Controllers;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Solicitud;
use App\Investigacion;
use App\Postulacion;

//use Cache;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //metodo de Paginacion
        $pub = Investigacion::paginate(2);
        return view('investigaciones.publicacioninvestigacion', compact('pub'));
    }
    public function indexp()
    {
        //metodo de Paginacion
        $paginacionp = Postulacion::paginate(1);
        return view('postulacion.nombreinvpostulacion', compact('paginacionp'));
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
    //Aceptar las solocitud de postulacion al investigador lo acepta el "lider"
   /* public function AceptarPostulacion($id){
        $solicitud = Solicitud::find($id);
        //cambiar el estado de la solicitud
        $Postulacion = new Investigacion();
        $Postulacion->id_post = $solicitud->id;
        $Postulacion->titulo = $solicitud->titulo;
        $Postulacion->caracteristica = $solicitud->caracteristica;
        $Postulacion->actividades = $solicitud->actividades;
        $Postulacion->user_id = $solicitud->user_id; //guardando id de usuario activo
        $Investigacion->save();       
        $solicitud->estado = "aceptada";
        $solicitud->save();
        return redirect('/escritoriocomite')->with('success','Investigación aceptada');
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Show
        //$pub = Investigacion::find($id);
        //return view('investigaciones.publicacionshow')->with('publicacion',$pub);
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
