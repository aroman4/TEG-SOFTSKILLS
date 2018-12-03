<?php

namespace App\Exports;

use App\Cuestionario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CuestionarioExport implements FromCollection, WithHeadings, ShouldAutoSize
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
        $data = $data->merge(DB::table('cuestionario')->select('titulo','descripcion')->where('id',$this->cuestionario_id)->get());
        foreach(\App\Cuestionario::find($this->cuestionario_id)->pregunta as $pregunta){
            //guardar la pregunta
            $query = DB::table('pregunta')->select('titulo','tipo_pregunta','opcion')->where('id',$pregunta->id)->get();
            $data = $data->merge($query);
            //$query = DB::table('usuario')->where('id',$ase->id_cliente)->get();
            foreach ($pregunta->respuesta as $respuesta){
                $query = DB::table('respuesta')->where('id',$respuesta->id)->get();
                $data = $data->merge($query);
            }        
            
        }
        //dd($data->toArray());
        return $data;
    }
    public function headings(): array
    {
        return [
            'Titulo cuestionario','Descripción','La'
        ];
    }
}
