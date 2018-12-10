@if(Auth::user()->tipo_inv == "normal")
    @extends('layouts.menuinv')
@elseif(Auth::user()->tipo_inv == "comite")
    @extends('layouts.menucomite')
@endif

@section('content')
<div class="col-md-9 investigaciones">
    <div class="row text-center separador">
        <div class="col-md-12 list-group-item text-center top-bar">
            @if(Auth::user()->tipo_inv == "normal")
                <a href="{{route('escritorioinvestigador')}}" class="btn btn-primary boton">Regresar</a>
                <h1 style="float:left">Investigación </h1>
            @elseif(Auth::user()->tipo_inv == "comite")
                <a href="{{route('escritoriocomite')}}" class="btn btn-primary boton">Regresar</a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 list-group-item ">
            @if(Auth::user()->tipo_inv == "normal")
                <p><b>Título:  <u>{{$investigaciones->titulo}}</u></b></p>
                <p><b>Objetivos General:</b> {{$investigaciones->objetivos}}</p>
                <p><b>Palabras Claves:</b> {{$investigaciones->caracteristica}}</p>
                <p><b>Actividades:</b> {{-- {{$solicitud->actividades}} --}}
                    {{-- Listar los objetivos especificos --}}
                    <ol>
                        @foreach(json_decode($investigaciones->actividades) as $key=>$value)
                            <li>{{$value}}</li>
                        @endforeach
                    </ol></p>
                <p><b>Resumen:</b>{{$investigaciones->descipcion}}</p>
                @if($investigaciones->estado == 'activa')
                    <p style="color: #CC9900; margin:8px;"><b>Estátus: Investigación {{$investigaciones->estado}}</b> </p>
                @else
                    <p style="color: #CC9900; margin:8px;"><b>Estátus: Investigación {{$investigaciones->estado}}</b> </p>
                @endif
                <p>Creada el {{$investigaciones->created_at}}</p>
                <br><br>
                <div class="datos-inve">
                        @if(Auth::user()->id == $investigaciones->user_id)
    {{--                         <a href="{{route('moduloinv.destroy', $investigaciones->id)}}" class="btn btn-danger boton1">Eliminar Solicitud</a>
    --}}                        <a href="{{route('editarinves', $investigaciones->id)}}" class="btn btn-success boton1">Editar Solicitud</a>
                        @endif
                </div>
            @elseif(Auth::user()->tipo_inv == "comite")
                <p><b>Título:  <u>{{$investigaciones->titulo}}</u></b></p>
                <p><b>Objetivos General:</b> {{$investigaciones->objetivos}}</p>
                <p><b>Palabras Claves:</b> {{$investigaciones->caracteristica}}</p>
                <p><b>Actividades:</b> {{-- {{$solicitud->actividades}} --}}
                    {{-- Listar los objetivos especificos --}}
                    <ol>
                        @foreach(json_decode($investigaciones->actividades) as $key=>$value)
                            <li>{{$value}}</li>
                        @endforeach
                    </ol></p>
                <p><b>Resumen:</b>{{$investigaciones->descipcion}}</p>
                @if($investigaciones->estado == 'activa')
                    <p style="color: #CC9900; margin:8px;"><b>Estátus: Investigación {{$investigaciones->estado}}</b> </p>
                @else
                    <p style="color: #CC9900; margin:8px;"><b>Estátus: Investigación {{$investigaciones->estado}}</b> </p>
                @endif
                <small>Creada el {{$investigaciones->created_at}}</small>
                <br><br>
                <div class="datos-inve">
                    @if($investigaciones->estado_com=="enviado")
                        <a title="Descargar archivo" href="proyecto/{{$investigaciones->archivofinal}}" class="btn btn-warning boton1" download="{{$investigaciones->archivofinal}}"><i class="fa fa-download" style="color:#000; width:6; height:6"></i> Descargar Investigación Final</a>
                    @endif
                    @if(Auth::user()->tipo_inv == "comite" && $investigaciones->estado_com=="enviado" && ((DB::table('voto')->where('user_id',auth()->user()->id)->where('id_inv',$investigaciones->id)->count() == 0)))
                        <a href="{{action('InvestigacionController@AceptarInvest',['id'=> $investigaciones->id])}}" class="btn btn-success boton1"><i class="fa fa-check" aria-hidden="true"></i> Aceptar Solicitud</a>
                        <a href="{{action('InvestigacionController@RechazarInvest',['id'=> $investigaciones->id])}}" class="btn btn-danger boton1"><i class="fa fa-times" aria-hidden="true"></i> Rechazar Solicitud</a> 
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
