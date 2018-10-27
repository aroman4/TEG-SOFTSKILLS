<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuestionario;
use App\Respuesta;
use App\Asesoria;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CuestionarioController extends Controller
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
        return view('cuestionario.qhome');
    }

    //pagina para crear
    public function nuevoCuest(){
        return view('cuestionario.nuevo');
    }

    public function nuevoNuevo($id){
        $ase = Asesoria::find($id);
        return view('cuestionario.nuevo')->with('asesoria',$ase);
    }

    public function crear(Request $request, Cuestionario $cuest){
        $arr = $request->all();
        $arr['user_id'] = Auth::id();
        //$arr['cliente_id'] = Asesoria::find($arr['id_asesoria'])->id_cliente;
        $qItem = new Cuestionario($arr);
        //dd($qItem);
        $qItem = $cuest->create($arr);
        return Redirect::to("/cuestionario/{$qItem->id}");
    }

    public function home() // Homepage function
    {
        $cuestionarios = Cuestionario::get();
        return view('cuestionario.qhome', compact('cuestionarios'));
    }
    
    # Show page to create new survey
    /* public function new_survey() 
    {
        return view('survey.new');
    } */
    
    # retrieve detail page and add questions here
    public function detalle(Cuestionario $cuestionario) 
    {
        $cuestionario->load('pregunta.user');
        return view('cuestionario.detalle', compact('cuestionario'));
    }
    
    
    public function edit(Cuestionario $cuestionario) 
    {
        return view('cuestionario.editar', compact('cuestionario'));
    }
    
    # edit survey
    public function update(Request $request, Cuestionario $cuestionario) 
    {
        $cuestionario->update($request->only(['titulo', 'descripcion']));
        return redirect()->action('CuestionarioController@detalle', [$cuestionario->id]);
    }
    
    # view survey publicly and complete survey
    public function ver_cuestionario(Cuestionario $cuestionario) 
    { 
        $cuestionario->opcion = unserialize($cuestionario->opcion);
        return view('cuestionario.ver', compact('cuestionario'));
    }
    
    # view submitted answers from current logged in user
    public function ver_respuestas_cuestionario(Cuestionario $cuestionario) 
    {
        $cuestionario->load('user.pregunta.respuesta');
        return view('respuesta.ver', compact('cuestionario'));
    }
    public function delete_cuestionario($id)
    {
        $cuestionario = Cuestionario::find($id);
        $cuestionario->delete();
        return redirect()->route('escritorioasesor');
    }
}
