<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css"/>
@include('header')

@include('inc.mensajes')
{{-- @include('layouts.barralateralasesoria') --}}

<div class="row filaEscritorio column">
        <div class="col-md-2 barraLateralEscritorio">
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
        @yield('content')
    </div>
{{-- @include('footer') --}}

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/init.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
{{-- <script src="{{ asset('js/fullcalendar/es.js') }}"></script> --}}
{!! $calendar->script() !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale/es.js"></script>
{{-- <script>
    var height=$('body').height(); // Calculate primary wrapper height
    $('.barraLateralEscritorio').height(height); // Set the height it to sidebar
    </script> --}}
