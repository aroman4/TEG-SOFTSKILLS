<?php

namespace App\Exports;

use App\Rubrica;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;

class RubricaExport implements FromView, ShouldAutoSize
{
    public $rubrica_id;

    public function __construct($id){
        $this->rubrica_id = $id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    /* public function collection()
    {
        return DB::table('rubrica')->where('id',$this->rubrica_id)->get();
        //return Rubrica::all();
    } */
    public function view(): View
    {
        $rubrica = Rubrica::find($this->rubrica_id);
        return view('rubricas.resultados')->with('rubrica',$rubrica);
    }
}
