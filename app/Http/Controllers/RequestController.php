<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return view('index');
        $tipoUser = Auth::user()->tipo_usu;

        switch($tipoUser){
            case 'investigador':            
                return '/escritorioinvestigador';
            break;
            case 'asesor':
                return '/escritorioasesor';
            break;
            case 'cliente':
                return '/escritoriocliente';
            break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('solic.solicitud.create');
        //
    }
    public function SolicInvestigacion()
    {
        return view('solic.solicitud.SolicInvestigacion');
        //
    }
    public function SolicAsesoria()
    {
        return view('solic.solicitud.SolicAsesoria');
        //
    }
    public function SolicPostulacion()
    {
        return view('solic.solicitud.SolicPostulacion');
        //
    }
    public function prueba()
    {
        return view('solic.solicitud.prueba');
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
        $solicitud = new Solicitud($request->all());
        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');
            $nombreArch = time().$archivo->getClientOriginalName();
            $archivo->move(public_path().'/archivoproyecto/',$nombreArch);
            $solicitud->archivo = $nombreArch;
        }
        $solicitud->user_id = auth()->user()->id;
        $solicitud->save();

        $tipoUser = Auth::user()->tipo_usu;
        switch($tipoUser){
            case 'investigador':
                return redirect('/escritorioinvestigador')->with('success','Solicitud Creada');
            break;
            case 'asesor':
                return redirect('/escritorioasesor')->with('success','Solicitud Creada');
            break;
            case 'cliente':
                return redirect('/escritoriocliente')->with('success','Solicitud Creada');
            break;
        }
        
        dd( $request->all());//guarda en la base de datos 
        dd('Bien...');
        //
        Movie::SolicPostulacion($request->all());
        //dd("Listo se Cargo");
        return ("listo"); 

        //if($request-->hasFile('Archivo')){
        // $file = $request->file('Archivo');
        //$name = time().$file->getClienteOriginalName();
        //$file->move(public_path().'/archivoproyecto/', $name);
        //return $name;
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
