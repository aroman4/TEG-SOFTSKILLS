<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Postulacion;
use App\Solicitud;
use App\Investigacion;
use DB;

class PostulacionController extends Controller
{
    //funcion de descarga de archivos 
    public function descargafuc(){
        $postulacion = DB::table('postulacion')->get();
        return view('postulacion.nombreinvpostulacion',compact('nombreinvpostulacion'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('postulacion.SolicPostulacion')->with('inv', $idinv);
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
    public function  detalle($id){
        $inv = Investigacion::find($id);
        return view('invproyecto.investigaciondetalle')->with('inv',$inv);
    }
    public function SolicPostulacion($idinv)
    {
        return view('solic.solicitud.SolicPostulacion')->with('inv',$idinv);
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

    public function enviar(Request $request)
    {
        //dd($request);  
         
        $postulacion =  Postulacion::find($request->idpostulacion);
        if($request->hasFile('archivo_inv')){
            $archivo_inv = $request->file('archivo_inv');
            $nombreArch = time().$archivo_inv->getClientOriginalName();
            $archivo_inv->move(public_path().'/proyecto/',$nombreArch);
            $postulacion->archivo_inv = $nombreArch;
        }
        $postulacion->id_invest = auth()->user()->id;  
        $postulacion->estado_inv = "finalizado";  
        $postulacion->save();
        
        return redirect('/vistainvestigaciones')->with('success','investigacion finalizada');

    }

    //aceptar postulacion
    public function AceptarPostulacion($id){
        $postulacion = Postulacion::find($id);
        $postulacion->estado = "aceptada";
        $postulacion->save();
        return redirect('/nombreinvpostulacion')->with('success','Postulación Aceptada');
    }
    //rechazar postulacion
    public function RechazarPostulacion($id){
        $postulacion = Postulacion::find($id);
        $postulacion->estado = "rechazada";
        $postulacion->save();
        return redirect('/nombreinvpostulacion')->with('success','Postulación Rechazada');
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
        return view('postulacion.verPostulacion')->with('postulacion', $postulacion);
    }
 
    public function showverpost($id)
    {
        //Showverpost
        $postulacion = Postulacion::find($id);
        return view('postulacion.verSolPostulaciones')->with('postulacion', $postulacion);
    }
    
    public function invtg($id)
    {
        //invtg
        $postulacion = Investigacion::find($id);
        return view('postulacion.vistaverinv')->with('investigaciones',$postulacion);
    }

    public function showproyectoverpost($id)
    {
        //Showverpost
        $postulacion = Postulacion::find($id);
        return view('invproyecto.proyectoverpost')->with('postulacion', $postulacion);
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
        return redirect('/escritoriopostulacion')->with('success','Postulación Rechazada');

    }
}
