<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'clave_usu' => 'required|string|min:6',
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
        //dd($data['clave_usu']);
        $data['clave_usu'] = bcrypt($data['clave_usu']);
        /* $user = new User($data);
        $user->clave_usu = bcrypt($user->clave_usu);
        //dd($user->clave_usu);
        //$user->save();
        return $user; */
        return User::create($data);
       /*  return User::create([
            'nombre_usu' => $data['nombre_usu'], 
            'email'=> $data['email'], 
            'clave_usu' => Hash::make($data['clave_usu']),
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
