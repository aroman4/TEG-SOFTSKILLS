<?php

namespace App\Exports;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Asesoria;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClientesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //busco los clientes de las asesorias del usuario actual
        $data = collect(null);
        foreach(Asesoria::all() as $ase){
            if($ase->user_id == auth()->user()->id){
                $query = DB::table('usuario')->where('id',$ase->id_cliente)->get();
                $data = $data->merge($query);
            }
        }
        return $data;
        
    }
}
