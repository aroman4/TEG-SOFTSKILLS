<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use Illuminate\Http\Request;
use App\Solicitud;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        //solicitudes de asesoria paginadas
        $solicitudesace = DB::table('solicitud')->where('estado','aceptada')->paginate(6);
        $solicitudespen = DB::table('solicitud')->where('estado','pendiente')->paginate(6);
        //return view('asesoria.asesoriasescritorio')->with('asesorias',$asesorias);
        

        switch($tipoUser){
            case 'investigador':           
                return redirect('/escritorioinvestigador');
            break;
            case 'asesor':
                //return redirect('/escritorioasesor');
                /* $solicitudesA = Solicitud::paginate(6);
                return view('asesoria.solicitudesescritorio')->with('solicitudes', $solicitudesA); */
                return view('asesoria.solicitudesescritorio',compact('solicitudesace','solicitudespen'));
            break;
            case 'cliente':
                /* $solicitudesA = Solicitud::paginate(6);
                return view('asesoria.solicitudesescritorio')->with('solicitudes', $solicitudesA); */
                return view('asesoria.solicitudesescritorio',compact('solicitudesace','solicitudespen'));
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
//-----------------------------Boton de Editar -------------------------------------------
    public function editarInvestigacion($id){
        $sol = Solicitud::find($id);
        return view('investigaciones.editarInvestigacion')->with('solicitud', $sol);
    }
    public function editarAsesoria($id){
        $sol = Solicitud::find($id);
        return view('asesoria.editarAsesoria')->with('solicitud', $sol);
    }
    public function editarCliente($id){
        $sol = Solicitud::find($id);
        return view('asesoria.editarCliente')->with('solicitud', $sol);
    }
//----------------------------------------------------------------------------------------
//-------------------------publicaciones de investigaciones-------------------------------
public function publicacioninvestigacion()
{
    return view('investigaciones.publicacioninvestigacion');
    //
}
//----------------------------------------------------------------------------------------

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
                Mail::send('email.emailsolicitud',$solicitud->toArray(),function($mensaje){
                    $mensaje->to(User::find(auth()->user()->id)->email,User::find(auth()->user()->id)->nombre)
                    ->subject('Creación de solicitud - SoftSkills');
                    $mensaje->from('desarrollohabilidadesblandas@gmail.com','SoftSkills');
                });
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
        //dd($solic);
        return view('solicitud.edit')->with('solicitud', $solic);
        
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
        $soluc = Solicitud::find($id);
        $soluc = $request->all();
        $soluc->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //eliminar solicitud ya creada.
        $solic = solicitud::find($id);
        $solic ->delete();
        return redirect()->route('solicitud.index');//duda
    
    }
}
