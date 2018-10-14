<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuestionario;
use App\Pregunta;
use Auth;
use Illuminate\Support\Facades\Input;

class PreguntaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function store(Request $request, Cuestionario $cuestionario) 
    {
      $arr = $request->all();
      $arr['user_id'] = Auth::id();

      $cuestionario->pregunta()->create($arr);
      return back()->with('success','Pregunta guardada');
    }

    public function edit(Pregunta $pregunta) 
    {
      return view('pregunta.editar', compact('pregunta'));
    }

    public function update(Request $request, Pregunta $pregunta) 
    {

      $pregunta->update($request->all());
      return redirect()->action('CuestionarioController@detalle', [$pregunta->cuestionario_id]);
    }
}
