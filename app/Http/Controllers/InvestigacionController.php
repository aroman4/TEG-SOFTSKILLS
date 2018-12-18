<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Solicitud;
use App\Investigacion;
use DB;
use App\Voto;
class InvestigacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 //funcion de descarga de archivos 
public function descargafuc(){
    $inv = DB::table('investigacion')->get();
    return view('investigaciones.moduloinvestigacion',compact('moduloinvestigacion'));
} 
    public function index()
    {
       //
    }
    public function enviar(Request $request)
    {
        //dd($request);  
        $inv =  Investigacion::find($request->idinvestigacion);
        if($request->hasFile('archivofinal')){
            $archivo_inv = $request->file('archivofinal');
            $tipo_inv = time().$archivo_inv->getClientOriginalName();
            $archivo_inv->move(public_path().'/proyecto/',$tipo_inv);
            $inv->archivofinal = $tipo_inv;
        }
        $inv->user_id = auth()->user()->id;  
        $inv->estado_com = "enviado";  
        $inv->save();
        return redirect('/publicacioninve')->with('success','Investigación Enviada al comité');
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
    //Aceptar Investigacion COMITE
    public function AceptarInvestigacion($id){
        $solicitud = Solicitud::find($id);
        $solicitud->votoscomite = $solicitud->votoscomite + 1;
        $solicitud->votosfavor = $solicitud->votosfavor + 1;
        $mensaje = ""; //para avisar el estado de la solicitud
        //cambiar el estado de la solicitud
        if($solicitud->votoscomite == 3){ //si todo el comite ya votó
            if($solicitud->votosfavor >= 2){ //si hay 2 votos o mas a favor
                $Investigacion = new Investigacion();
                $Investigacion->id_solic = $solicitud->id;
                $Investigacion->titulo = $solicitud->titulo;
                $Investigacion->objetivos = $solicitud->objetivos;
                $Investigacion->caracteristica = $solicitud->caracteristica;
                $Investigacion->actividades = $solicitud->actividades;
                $Investigacion->descripcion = $solicitud->descripcion;
                $Investigacion->user_id = $solicitud->user_id; //guardando id de usuario activo
                $Investigacion->save();       
                $solicitud->estado = "aceptada";

                //luego de guardar la investigacion, creo las actividades
                foreach(DB::table('objespecifico')->where('id_solicitud',$solicitud->id)->get() as $obj){
                    foreach(json_decode($obj->actividades) as $key=>$value){
                        $act = new \App\Actividad();
                        $act->titulo = $value;
                        $act->id_objetivo = $obj->id;
                        $act->asignado = false;
                        $act->id_investigacion = $Investigacion->id;
                        $act->id_investigador = $Investigacion->user_id; //le asigno el id del lider mientras no ha sido asignado
                        $act->save();
                    }
                    //guardar el id de la investigacion en el objetivo
                    $objetivo = \App\Objespecifico::find($obj->id);
                    $objetivo->id_investigacion = $Investigacion->id;
                    $objetivo->save();
                }
                /* $array = json_decode($Investigacion->actividades);
                foreach($array as $key=>$value){
                    $act = new \App\Actividad();
                    $act->titulo = $value;
                    $act->asignado = false;
                    $act->id_investigacion = $Investigacion->id;
                    $act->id_investigador = $Investigacion->user_id; //le asigno el id del lider mientras no ha sido asignado
                    $act->save();
                } */
                $mensaje = " Investigación aceptada";
            }else if($solicitud->votoscontra >= 2){ //si hay dos o más votos en contra
                //avisar que la solicitud fue rechazada
                $mensaje = " Investigación rechazada";
                $solicitud->estado = "rechazada";
            }
        }
        $solicitud->save();
        //verificar voto
        $voto = new \App\Voto();
        $voto->user_id = auth()->user()->id;
        $voto->id_sol = $id;
        $voto->save();
        return redirect('/escritoriocomite')->with('success','Voto recibido'.$mensaje);
    }
    public function RechazarInvestigacion($id){
        //
        $solicitud = Solicitud::find($id);
        $solicitud->votoscomite = $solicitud->votoscomite + 1;
        $solicitud->votoscontra = $solicitud->votoscontra + 1;
        $mensaje = ""; //para avisar el estado de la solicitud
        if($solicitud->votoscomite == 3){ //si todo el comite ya votó
            if($solicitud->votosfavor >= 2){ //si hay 2 votos o mas a favor
                $Investigacion = new Investigacion();
                $Investigacion->id_solic = $solicitud->id;
                $Investigacion->titulo = $solicitud->titulo;
                $Investigacion->objetivos = $solicitud->objetivos;
                $Investigacion->caracteristica = $solicitud->caracteristica;
                $Investigacion->actividades = $solicitud->actividades;
                $Investigacion->user_id = $solicitud->user_id; //guardando id de usuario activo
                $Investigacion->save();       
                $solicitud->estado = "aceptada";

                //luego de guardar la investigacion, creo las actividades
                $array = json_decode($Investigacion->actividades);
                foreach($array as $key=>$value){
                    $act = new \App\Actividad();
                    $act->titulo = $value;
                    $act->asignado = false;
                    $act->id_investigacion = $Investigacion->id;
                    $act->id_investigador = $Investigacion->user_id; //le asigno el id del lider mientras no ha sido asignado
                    $act->save();
                }
                $mensaje = " Investigación aceptada";
            }else if($solicitud->votoscontra >= 2){ //si hay dos o más votos en contra
                //avisar que la solicitud fue rechazada
                $mensaje = " Investigación rechazada";
                $solicitud->estado = "rechazada";
            }
        }
        $solicitud->save();
        //verificar voto
        $voto = new \App\Voto();
        $voto->user_id = auth()->user()->id;
        $voto->id_sol = $id;
        $voto->save();
        return redirect('/escritoriocomite')->with('success','Voto recibido'.$mensaje);
    }
    //Aceptar Investigacion finalizada de COMITE
    public function AceptarInvest($id){
        $inv = Investigacion::find($id);
        $inv->votoscomite = $inv->votoscomite + 1;
        $inv->votosfavor = $inv->votosfavor + 1;
        $mensaje = ""; //para avisar el estado de la solicitud
        //cambiar el estado de la investigacion
        if($inv->votoscomite == 3){ //si todo el comite ya votó
            if($inv->votosfavor >= 2){ //si hay 2 votos o mas a favor
                $inv->estado = 'finalizada';
                $postulacion = \App\Postulacion::find(DB::table('postulacion')->where('id_post', $inv->id)->first()->id);
                $postulacion->estado_inv = 'finalizado';
                //dd($postulacion);

                $postulacion->save();
                //dd($postulacion);

            }else if($inv->votoscontra >= 2){ //si hay dos o más votos en contra
                //avisar que la inv fue rechazada
                $mensaje = " Investigación rechazada";
                $inv->estado = 'activa';
            }
        }
        $inv->save();
        //verificar voto
        $voto = new \App\Voto();
        $voto->user_id = auth()->user()->id;
        $voto->id_inv = $id;
        $voto->save();
        return redirect('/escritoriocomite')->with('success','Voto recibido'.$mensaje);
    }

    public function RechazarInvest($id){
        //
        $inv = Investigacion::find($id);
        $inv->votoscomite = $inv->votoscomite + 1;
        $inv->votosfavor = $inv->votosfavor + 1;
        $mensaje = ""; //para avisar el estado de la solicitud
        //cambiar el estado de la inv
        if($inv->votoscomite == 3){ //si todo el comite ya votó
            if($inv->votosfavor >= 2){ //si hay 2 votos o mas a favor
                $inv->estado = 'finalizada';
            }else if($inv->votoscontra >= 2){ //si hay dos o más votos en contra
                //avisar que la inv fue rechazada
                $mensaje = " Investigación rechazada";
                $inv->estado = 'activa';
            }
        }
        $inv->save();
        //verificar voto
        $voto = new \App\Voto();
        $voto->user_id = auth()->user()->id;
        $voto->id_inv = $id;
        $voto->save();
        return redirect('/escritoriocomite')->with('success','Voto recibido'.$mensaje);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store
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
        $inv = Investigacion::find($id);
        return view('investigaciones.investigacionshow')->with('investigaciones',$inv);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Editar
        $inv = Investigacion::find($id);
        return view('investigaciones.edit')->with('investigaciones', $inv);
        
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
        //Update
        $inv = Investigacion::find($id);
        $inv = $request->all();
        $inv->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar
        $inv = Investigacion::find($id);
        $solicitud = Solicitud::find($inv->id_solic);
        $inv->delete();
        $solicitud->delete();
        return redirect('/escritorioinvestigador')->with('success','Investigación eliminada');
 
        
    }
}