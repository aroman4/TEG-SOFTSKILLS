@extends((( auth()->user()->tipo_inv == "normal") ? 'layouts.menuinv' : 'layouts.menucomite' ))

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            @if(Auth::user()->tipo_inv == "normal")
{{--                 <a href="{{route('escritorioinvestigador')}}" class="btn btn-primary boton">Regresar</a>
 --}}       <a onclick="goBack()" class="btn btn-primary boton">Regresar</a>

            <h1 style="float:left">Investigación </h1>
            @elseif(Auth::user()->tipo_inv == "comite")
                <h1 style="float:left">Investigación de {{\App\User::find($solicitud->user_id)->nombre ." ". \App\User::find($solicitud->user_id)->apellido }}</h1>
                <a onclick="goBack()" class="btn btn-primary boton">Regresar</a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 list-group-item ">
            <p><b>Título:  <u>{{$solicitud->titulo}}</u></b></p>
            <p><b>Objetivo General:</b> {{$solicitud->objetivos}}</p>
            <p><b>Palabras Claves:</b> {{$solicitud->caracteristica}}</p>
            <p><b>Objetivos Específicos:</b> {{-- {{$solicitud->actividades}} --}}
            {{-- Listar los objetivos especificos --}}
            <ol>
                @foreach(DB::table('objespecifico')->where('id_solicitud',$solicitud->id)->get() as $obj)
                    <li>{{$obj->titulo}}</li>
                    <ul>
                        @foreach(json_decode($obj->actividades) as $key=>$value)
                            <li>{{$value}}</li>
                        @endforeach
                    </ul>
                @endforeach
            </ol></p>
            <p><b>Resumen:</b> {{$solicitud->descripcion}}</p>
            <br>
            @if($solicitud->estado == 'activa')
                <p style="color: #CC9900; margin:8px;"><b>Estatus: Investigación {{$solicitud->estado}}</b> </p>
            @else
                <p style="color: #CC9900; margin:8px;"><b>Estatus: Investigación {{$solicitud->estado}}</b> </p>
            @endif
            <p>Creada el {{$solicitud->created_at}}</p>
            <br>
            <div class="datos-inve">
                @if(Auth::user()->tipo_inv == "normal" && $solicitud->estado== "aceptada" && Auth::user()->id == $solicitud->user_id)
                    <a href="{{route('editarinves', $solicitud->id)}}" class="btn btn-success boton1"><i class="fa fa-paperclip" aria-hidden="true"></i> Editar Solicitud</a>
                    <a href="{{route('nombreinvpostulacion', $solicitud->id)}}" class="btn btn-secondary boton1">Revisar Postulaciones</a>
                    @elseif(Auth::user()->tipo_inv == "comite")
{{--                    <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
 --}}                @else
                        @if(Auth::user()->id == $solicitud->user_id)
                            <a href="{{route('solicitud.destroy', $solicitud->id)}}" class="btn btn-danger boton1"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar Solicitud</a>
                        @endif
                @endif
                @if(Auth::user()->tipo_inv == "comite" && ((DB::table('voto')->where('user_id',auth()->user()->id)->where('id_sol',$solicitud->id)->count() == 0)))
                    <a href="{{action('InvestigacionController@AceptarInvestigacion',['id'=> $solicitud->id])}}" class="btn btn-success boton1"><i class="fa fa-check" aria-hidden="true"></i> Aceptar Solicitud</a>
                    <a href="{{action('InvestigacionController@RechazarInvestigacion',['id'=> $solicitud->id])}}" class="btn btn-danger boton1"><i class="fa fa-times" aria-hidden="true"></i> Rechazar Solicitud</a>
                    
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
