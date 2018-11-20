<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
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
        //enviar email al cliente
        /* Mail::send('email.asesoriaaceptada',$asesoria->toArray(),function($mensaje) use ($asesoria){
            $mensaje->to(User::find($asesoria->id_cliente)->email,User::find($asesoria->id_cliente)->nombre)
            ->subject('Solicitud de asesoría Aceptada - SoftSkills');
            $mensaje->from('desarrollohabilidadesblandas@gmail.com','SoftSkills');
        }); */
        return redirect('/escritorioasesor')->with('success','Asesoría aceptada');
    }
    public function AceptarSolicitudAse($id){
        //consigo la solicitud
         $solicitud = Solicitud::find($id);
         $solicitud->votoscomite = $solicitud->votoscomite + 1;

         //ver cuantos votos tiene la solicitud
         if($solicitud->votoscomite >= 2){
            //cambiar tipo de usuario si hay mas de dos votos
            $user = User::find($solicitud->user_id);
            $user->tipo_usu = "asesor";
            $user->save();
            $solicitud->estado = "aceptada";
         }
         $solicitud->save();
         //colocar que el usuario comite no pueda volver a votar
         $userC = User::find(auth()->user()->id);
         $userC->votoejercido = true;
         $userC->save();
         
         //enviar email al cliente
         /* Mail::send('email.solicitudrechazada',$solicitud->toArray(),function($mensaje) use ($solicitud){
             $mensaje->to(User::find($solicitud->user_id)->email,User::find($solicitud->user_id)->nombre)
             ->subject('Solicitud de asesoría Rechazada - SoftSkills');
             $mensaje->from('desarrollohabilidadesblandas@gmail.com','SoftSkills');
         }); */
         return redirect()->route('escritoriocomite')->with('success','Voto contado');
     }
    public function RechazarSolicitud($id){
       //consigo la solicitud
        $solicitud = Solicitud::find($id);
        $solicitud->estado = "rechazada";
        $solicitud->save();
        //enviar email al cliente
        /* Mail::send('email.solicitudrechazada',$solicitud->toArray(),function($mensaje) use ($solicitud){
            $mensaje->to(User::find($solicitud->user_id)->email,User::find($solicitud->user_id)->nombre)
            ->subject('Solicitud de asesoría Rechazada - SoftSkills');
            $mensaje->from('desarrollohabilidadesblandas@gmail.com','SoftSkills');
        }); */
        return redirect('/escritorioasesor')->with('error','Solicitud Rechazada');
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
    }
    public function eliminar($id)
    {
        //
        $ases = Asesoria::find($id);
        $ases->delete();
        return redirect('/escritorioasesor')->with('success','Asesoría eliminada');
    }
    public function finalizar(Request $request)
    {
        //
        $reporte = new \App\Reportefinalase($request->all());
        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');
            $nombreArch = time().$archivo->getClientOriginalName();
            $archivo->move(public_path().'/archivoproyecto/',$nombreArch);
            $reporte->archivo = $nombreArch;
        }
        $reporte->save();
        $asesoria = Asesoria::find($reporte->id_asesoria);
        $asesoria->estado = "finalizada"; //se coloca como finalizada
        $asesoria->reporte_id = $reporte->id; //guardo el id del reporte creado en la asesoria
        $asesoria->save();
        /* Mail::send('email.asesoriafinalizada',$asesoria->toArray(),function($mensaje) use ($asesoria){
            $mensaje->to(User::find($asesoria->id_cliente)->email,User::find($asesoria->id_cliente)->nombre)
            ->subject('Asesoría Finalizada - SoftSkills');
            $mensaje->from('desarrollohabilidadesblandas@gmail.com','SoftSkills');
        }); */
        return redirect()->route('reporteasesoria',$asesoria->id)->with('asesoria','Asesoría finalizada');
    }
    public function getChat($id){
        //al pasar un id de asesoria se conecte al chat
        //verificar si el usuario que intenta acceder no tiene permiso
        $asesoria = Asesoria::find($id);
        if(((auth()->user()->tipo_usu == "asesor") && ($asesoria->user_id == auth()->user()->id)) || ((auth()->user()->tipo_usu == "cliente") && ($asesoria->id_cliente == auth()->user()->id))){ //si es asesor o cliente autorizado
            return view('webchat.index')->with('asesoria',$id);
        }else{
            return back()->with('error','No tienes permiso para acceder a este chat');
        }
    }

    public function reporteshome(){
        return view('reportes.reporteshome');
    }
    public function reporteasesoria($id){
        $asesoria = Asesoria::find($id);
        return view('reportes.reporteasesoria')->with('asesoria',$asesoria);
    }
}
