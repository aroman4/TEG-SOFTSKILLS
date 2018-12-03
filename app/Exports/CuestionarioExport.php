<?php

namespace App\Exports;

use App\Cuestionario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class CuestionarioExport implements FromCollection
{
    public $cuestionario_id;

    public function __construct($id){
        $this->cuestionario_id = $id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Cuestionario::find($this->cuestionario_id);
        $data = collect(null);
        $cuestionario = \App\Cuestionario::find($this->cuestionario_id);
        $data = $data->merge(DB::table('cuestionario')->where('id',$this->cuestionario_id)->first());
        foreach(\App\Cuestionario::find($this->cuestionario_id)->pregunta as $item){
            //guardar la pregunta
            /* $query = DB::table('pregunta')->where('id_cuestionario',$ase->id_cliente)->get(); */
            $data = $data->merge($item->toArray());
            //$query = DB::table('usuario')->where('id',$ase->id_cliente)->get();
            foreach ($item->respuesta as $respuesta){
                $data = $data->merge($respuesta->toArray());
            }        
            
        }
        //dd($data->toArray());
        return $data;
    }
}
