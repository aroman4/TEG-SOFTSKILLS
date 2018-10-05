<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Solicitud;
use App\Investigacion;

class InvestigacionController extends Controller
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
    public function AceptarInvestigacion($id){
        $solicitud = Solicitud::find($id);
        //cambiar el estado de la solicitud
        $Investigacion = new Investigacion();
        $Investigacion->titulo = $solicitud->titulo;
        $Investigacion->caracteristica = $solicitud->caracteristica;
        $Investigacion->descripcion = $solicitud->descripcion;
        $Investigacion->tipo_inv = Auth::user()->tipo_inv;
        $Investigacion->user_id = Auth::user()->id; 
        $Investigacion->save();       
        $solicitud->estado = "aceptada";
        $solicitud->save();
        return redirect('/escritorioinvestigador')->with('success','Investigación aceptada');
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
        $inv = Investigaciones::find($id);
        $inv->delete();
        return redirect('/escritorioinvestigador')->with('success','Investigación eliminada');
    }
}
