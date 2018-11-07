<div class="barraLateralEscritorio">
        <ul class="list-group list-group-flush  column">
            <li class="list-group-item">{{Auth::user()->nombre ." ". Auth::user()->apellido}}</li>
            @if(auth()->user()->tipo_usu == "asesor")
                <li class="list-group-item {{ request()->is('escritorioasesor') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('escritorioasesor')}}">Escritorio</a></li>
            @elseif(auth()->user()->tipo_usu == "cliente")
                <li class="list-group-item {{ request()->is('escritoriocliente') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('escritoriocliente')}}">Escritorio</a></li>
            @endif
            <li class="list-group-item {{ request()->is('asesescritorio') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('asesescritorio')}}">Asesorías</a></li>
            <li class="list-group-item {{ request()->is('solicitud.index') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('solicitud.index')}}">Solicitudes</a></li>
            <li class="list-group-item {{ request()->is('reportedetalle') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('reporteshome')}}">Reportes</a></li>
            <li class="list-group-item {{ request()->is('cuestionario.home') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('cuestionario.home')}}">Instrumentos</a></li>
            <li class="list-group-item {{ request()->is('agenda') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('agenda')}}">Agenda</a></li>
        </ul>
    </div>