<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Solicitud;
use App\Asesoria;

class AsesoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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

    public function AceptarAsesoria($id){
        //$solicitud = Solicitud::where('id',$id); //consigo la solicitud
        $solicitud = Solicitud::find($id);
        $asesoria = new Asesoria();
        //dd($solicitud);
        $asesoria->id_cliente = $solicitud->user_id;
        $asesoria->titulo = $solicitud->titulo;
        $asesoria->mensaje = $solicitud->mensaje;
        $asesoria->archivo = $solicitud->archivo;
        $asesoria->user_id = auth()->user()->id;
        $asesoria->save();
        //cambiar el estado de la solicitud
        $solicitud->estado = "aceptada";
        $solicitud->save();
        //dd('asesoria creada '.$id);
        return redirect('/escritorioasesor')->with('success','Asesoría aceptada');
    }

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
        //
        $ase = Asesoria::find($id);
        return view('asesoria.asesoriadetalle')->with('asesoria',$ase);
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
        $ases = Asesoria::find($id);
        $ases->delete();
        return redirect('/escritorioasesor')->with('success','Asesoría eliminada');
    }
    public function getChat($id){
        //aqui lo que quiero es que al pasar un id de asesoria, se conecte al chat directamente
        //tambien aqui se puede verificar si el usuario que intenta acceder no tiene permiso
        return view('webchat.index')->with('asesoria',$id);
    }
}
