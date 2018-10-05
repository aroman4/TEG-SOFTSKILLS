<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
                return '/escritorioinvestigador';
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
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre_usu' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuario',
            'password' => 'required|string|confirmed|min:6',
            'edad' => 'integer|nullable',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'nullable|numeric',
            'direccion' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',
            'sexo' => 'nullable|string|max:255',
            'cedula' => 'nullable|integer',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data['password']);
        $data['password'] = bcrypt($data['password']);
        /* $user = new User($data);
        $user->password = bcrypt($user->password);
        //dd($user->password);
        //$user->save();
        return $user; */
        $user = new User($data);
        //$user::create($data);
        
        //if(($user->tipo_usu == "investigador") && (User::where('tipo_usu','=','investigador')->count()==0)){
        
        
        return User::create($data);
       /*  return User::create([
            'nombre_usu' => $data['nombre_usu'], 
            'email'=> $data['email'], 
            'password' => Hash::make($data['password']),
            'tipo_usu'=> $data['tipo_usu'],
            'edad','nombre'=> $data['edad'],
            'apellido'=> $data['apellido'],
            'telefono'=> $data['telefono'],
            'direccion'=> $data['direccion'],
            'pais'=> $data['pais'],
            'profesion'=> $data['profesion'],
            'sexo'=> $data['sexo'],
            'cedula'=> $data['cedula'],
        ]); */
    }
}
