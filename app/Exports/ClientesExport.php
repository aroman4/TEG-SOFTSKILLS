<?php

namespace App\Exports;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Asesoria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ClientesExport implements FromCollection, WithHeadings, ShouldAutoSize
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
                $query = DB::table('usuario')->select('nombre_usu', 'email','edad','nombre','apellido','telefono','direccion','profesion','sexo','organizacion')->where('id',$ase->id_cliente)->get();
                $data = $data->merge($query);
            }
        }
        return $data;
        
    }
    public function headings(): array
    {
        return [
            'Nombre usuario', 'Email','Edad','Nombre','Apellido','Telefono','Dirección','Profesión','Sexo','Organización'
        ];
    }
}
