<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Solicitud;
use App\Investigacion;


class FrontController extends Controller
{
    //pagina principal
    public function index(){
        return view('index');
    }
    //Asesoria
    public function asesorias(){
        return view('asesorias');
    }
    //Investigación
    public function investigacion(){
        //metodo de Paginacion
        $pub = Investigacion::paginate(2);
        return view('investigacion', compact('pub'));
        }

    //prueba de blade
    public function prueba(){
        return view('producto.prueba');
    }
        //
    public function aprender(){
            return view('aprender');
    }
        //prueba final de blade
    public function pruebablade(){
        return view('pruebablade');
    }
    //prueba final de blade
    public function header(){
                    return view('header');
    }
    //prueba final de blade
    public function footer(){
        return view('footer');
    }
    //prueba final de blade
    public function escuestafinal(){
        return view('encuesta.escuestafinal');
    }
        
        
}

