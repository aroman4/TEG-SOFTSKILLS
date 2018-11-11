<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Event;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $events = [];
        $data = DB::table('events')->where('user_id',auth()->user()->id)->get(); //busca los eventos creados por el usuario actual

        if(auth()->user()->tipo_usu == "cliente"){ //si es un cliente debo mostrar todos los eventos de asesorias donde participa
            $asesorias = DB::table('asesoria')->where('id_cliente',auth()->user()->id)->get()->pluck('id');
            //dd($asesorias);
            foreach($asesorias as $key => $id){
                $query = DB::table('events')->where('id_asesoria',$id)->get();
                $data = $data->merge($query); //combina los eventos propios con los de la asesoria donde participa
            }
        }        
        if($data->count()) {
            foreach ($data as $key => $value) {
                $color = '#4286f4'; //color azul para eventos normales
                if($value->id_asesoria != null){ //si es un evento de una asesoria
                    $color = '#ff0000'; //rojo para eventos de asesoria
                }
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => $color
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('agenda.agenda', compact('calendar'));
    }

    public function crear(Request $request){
        $evento = new Event($request->all());
        //dd($evento);
        $evento->user_id = auth()->user()->id;
        $evento->save();
        if($evento->id_asesoria != null){ //es un evento de asesoria
            return redirect()->route('mostrarAgAs',$evento->id_asesoria)->with('success','Evento creado exitosamente')->with('idase',$evento->id_asesoria);
        }else{
            return redirect('agenda')->with('success','Evento creado exitosamente');
        }
    }

    public function mostrarEvAsesoria($idase){
        $events = [];
        $data = DB::table('events')->where('id_asesoria',$idase)->get(); //busca los eventos de esa asesoria
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#ff0000'
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('agenda.agendaasesoria', compact('calendar'))->with('idase',$idase);
    }
}