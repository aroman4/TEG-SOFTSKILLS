<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;

class SolicitudController extends Controller
{
    //
    public function mostrar($id){
        $solic = Solicitud::find($id);
        //dd($solic->usuario);
        //dd($solic);
        return view('solicitudes',['solicitud' => $solic]);
    }

    public function crear(){
        
    }
}
