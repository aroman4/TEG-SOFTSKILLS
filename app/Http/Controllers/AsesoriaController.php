<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asesoria;
use App\Solicitud;
use Illuminate\Support\Facades\Auth;

class AsesoriaController extends Controller
{
    //
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
        dd('asesoria creada '.$id);
    }
}
