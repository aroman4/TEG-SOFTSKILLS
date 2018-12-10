<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
    public function redirectTo(){
        //esta función toma el tipo de usuario y redirecciona a la ruta adecuada
        //luego de iniciar sesión
        $tipoUser = Auth::user()->tipo_usu;

        switch($tipoUser){
            case 'investigador': 
                if(Auth::user()->tipo_inv == "comite"){
                    return '/escritoriocomite';
                }else{
                    return '/publicacioninve';
                }
            break;
            case 'asesor':
                return '/escritorioasesor';
            break;
            case 'cliente':
                return '/escritoriocliente';
            break;
            case 'admin':
                return '/administracion';
            break;
            case 'comite':
                return '/escritoriocomite';
            break;
            case 'usuario':
                return route('postulacionasesor');
            break;
        break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
