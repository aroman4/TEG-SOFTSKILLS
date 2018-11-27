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
            $nombreArch = time().$archivo_inv->getClientOriginalName();
            $archivo_inv->move(public_path().'/proyecto/',$nombreArch);
            $inv->archivofinal = $nombreArch;
        }
        $inv->user_id = auth()->user()->id;  
        $inv->save();
        
        return redirect('/publicacioninve')->with('success','Investigación subida, lista para descargar');
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
        //cambiar el estado de la solicitud
        if($solicitud->votoscomite >= 2){ //si hay 2 votos o mas
            $Investigacion = new Investigacion();
            $Investigacion->id_solic = $solicitud->id;
            $Investigacion->titulo = $solicitud->titulo;
            $Investigacion->caracteristica = $solicitud->caracteristica;
            $Investigacion->actividades = $solicitud->actividades;
            $Investigacion->user_id = $solicitud->user_id; //guardando id de usuario activo
            $Investigacion->save();       
            $solicitud->estado = "aceptada";
        }
        $solicitud->save();
        //verificar voto
        $voto = new \App\Voto();
        $voto->user_id = auth()->user()->id;
        $voto->id_sol = $id;
        $voto->save();
        return redirect('/escritoriocomite')->with('success','Voto recibido');
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