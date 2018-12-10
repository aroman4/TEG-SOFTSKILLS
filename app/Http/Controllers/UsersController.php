<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Exports\UsersExport;
use App\Exports\ClientesExport;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.usuarios.crear');
    }

    /**
     * Store a newly created resource in storage.
    
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = new User($request->all()); //recibe los datos del formulario
        //dd($user);
        $user->password = bcrypt($request->password);
        $user->save(); //guarda en la bd
    }

    public function tipoInvestigador(Request $request, $id){
        dd($request->tipo_inv ." ". $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $usu = User::find($id);
        return view('admin.usuarios.detalle')->with('usuario',$usu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usu = User::find($id);
        //dd($usu);
        if(auth()->user()->tipo_usu == "admin"){
            return view('admin.usuarios.editardatosperfiladmin')->with('usuario',$usu);
        }else{
            return view('admin.usuarios.editardatosperfil')->with('usuario',$usu);
        }
        
        
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
        $user = User::find($id);
        $pass = $user->password;
        $user->fill($request->all());
        $user->tipo_inv = $request->tipo_inv;
        if($request->password == null){
            $user->password = $pass;
        }

        //imagen
        if($request->hasFile('imagen')){
            $archivo = $request->file('imagen');
            $nombreArch = time().$archivo->getClientOriginalName();
            $archivo->move(public_path().'/imagenperfil/',$nombreArch);
            $user->imagen = $nombreArch;
        }
/*         $user->tipo_inv = $request->tipo_inv;
        $user->sexo = $request->sexo;
        $user->telefono = $request->telefono;
        $user->direccion = $request->direccion;
        $user->edad = $request->edad;
        $user->profesion = $request->profesion; */
        $user->save();

        if(auth()->user()->tipo_usu == "investigador"){
            return redirect('/escritorioinv')->with('success','Modificado');
        }else if(auth()->user()->tipo_usu == "admin"){
            return redirect('/administracion')->with('success','Modificado');
        }else{
            return redirect('/perfilusu')->with('success','Modificado');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function borrar($id)
    {
        $usu = User::find($id);
        $usu->delete();
        return back()->with('success','usuario borrado');
    }
    public function export() 
    {
        return Excel::download(new UsersExport, 'usuarios.xlsx');
    }
    public function exportBanco() 
    {
        return Excel::download(new ClientesExport, 'clientes.xlsx');
    }
}
