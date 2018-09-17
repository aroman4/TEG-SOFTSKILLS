<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('investigacion');
    }

    //prueba de blade
    public function prueba(){
        return view('producto.prueba');
    }
        //prueba
        public function aprender(){
            return view('aprender');
        }


    
}
