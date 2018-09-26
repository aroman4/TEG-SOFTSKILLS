<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use Illuminate\Support\Facades\Auth;
//use Laracasts\Flash\Flash;

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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //buscar solicitud por id y mostrarla
        $solic = Solicitud::find($id);
        $tipoUser = Auth::user()->tipo_usu;
        switch($tipoUser){
            case 'investigador':
                return view('investigaciones.solicitud')->with('solicitud',$solic);
            break;
            case 'asesor':
                return view('asesoria.solicitud')->with('solicitud',$solic);
            break;
            case 'cliente':
                return view('asesoria.solicitud')->with('solicitud',$solic);
            break;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solic = solicitud::find($id);
        return view('solicitud.edit' ->with('solicitud', $solic));
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
        $solic = solicitud::find($id);
        $tipoUser = Auth::user()->tipo_usu;
        switch($tipoUser){
            case 'investigador':
                //si el usuario es de tipo investigador tengo que actualizar
                //los datos de la solicitud, pero eso aplica para cada uno.
            break;
            case 'asesor':
              
            break;
            case 'cliente':
                
            break;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        //$solic::destroy($id);
        //session::flash('Solicitud eliminada correctamente');
        //return redirect::to('/solicitud');
        $solic = Solicitud::find($id);
        $solic->delete();
        //Flash::error('Su solicitud' . $solic->name . 'ha sido Eliminada de manera Exitosa');
        return redirect()->route('solicitud.index');//duda
        //
    }
}
