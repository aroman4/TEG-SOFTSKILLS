<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postulacion;

class PostulacionController extends Controller
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
    public function SolicPostulacion()
    {
        return view('solic.solicitud.SolicPostulacion');
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
        //     
        $postulacion = new Postulacion($request->all());
        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');
            $nombreArch = time().$archivo->getClientOriginalName();
            $archivo->move(public_path().'/archivoproyecto/',$nombreArch);
            $postulacion->archivo = $nombreArch;
        }
        $postulacion->id_invest = auth()->user()->id;
        $postulacion->save();
        return redirect('/escritorioinvestigador')->with('success','Postulación Enviada al lider');

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
        $postulacion = Postulacion::find($id);
        return view('investigaciones.verPostulacion')->with('postulacion',$postulacion);
     
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
        $postulacion = Postulacion::find($id);
        //dd($postulacion);
        return view('postulacion.edit')->with('postulacion', $postulacion);
       
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
        $postulacion =  Postulacion::find($id);
        $postulacion = $request->all();
        $postulacion->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //eliminar postulacion ya creada.
        $postulacion = Postulacion::find($id);
        $postulacion ->delete();
        return redirect()->route('postulacion.index');//duda
    }
}
