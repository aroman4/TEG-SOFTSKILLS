@extends((( auth()->user()->tipo_usu == "investigador") ? 'layouts.menuinv' : 'layouts.plantillaQ' ))

@section('content')
    <div class="col-md-9 listaQuest">
        <div class="list-group">
            <div class="row">
                <div class="col-md-12 list-group-item top-bar">                    
                    <a href="{{route('mensajes', auth()->user()->id)}}" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Volver a la bandeja</a>
                    @if(auth()->user()->id == $mensaje->id_destinatario)
                        <a href="{{route('crearmensaje', $mensaje->id_remitente)}}" class="btn btn-success"><i class="fas fa-envelope-open-text"></i> Responder</a>
                    @endif
                    <a href="{{route('borrarmensaje', $mensaje->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar mensaje</a>
                    <h2 style="float:right">{{$mensaje->asunto}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 list-group-item">
                    <h2>De: <span>{{\App\User::find($mensaje->id_remitente)->nombre}} {{\App\User::find($mensaje->id_remitente)->apellido}}</span></h2>
                    <h3>Para: <span>{{\App\User::find($mensaje->id_destinatario)->nombre}} {{\App\User::find($mensaje->id_destinatario)->apellido}}</span></h3>
                    <hr>
                    <br><br>
                    <h4>{{$mensaje->mensaje}}</h4>
                    @if($mensaje->archivo != null)
                        <a class="btn btn-secondary" href="{{asset('archivoproyecto/'.$mensaje->archivo)}}">Descargar archivo adjunto</a>
                    @endif
                    <br><br>
                </div>                
            </div>
        </div>
    </div>
@endsection