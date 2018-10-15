@include('header')
@include('inc.mensajes')
<div class="barraLateralEscritorio">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{{Auth::user()->nombre ." ". Auth::user()->apellido}}</li>
        <li class="list-group-item {{ request()->is('escritorioasesor') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('escritorioasesor')}}">Escritorio</a></li>
        <li class="list-group-item {{ request()->is('') ? 'active' : '' }}"><a class="aMenuLateral" href="#">Asesorías</a></li>
        <li class="list-group-item {{ request()->is('solicitud.index') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('solicitud.index')}}">Solicitudes</a></li>
        <li class="list-group-item {{ request()->is('') ? 'active' : '' }}"><a class="aMenuLateral" href="#">Reportes</a></li>
        <li class="list-group-item {{ request()->is('cuestionario.home') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('cuestionario.home')}}">Instrumentos</a></li>
        <li class="list-group-item {{ request()->is('') ? 'active' : '' }}"><a class="aMenuLateral" href="#">Calendario</a></li>
    </ul>
</div>
    <div class="row filaEscritorio">
        @yield('content')
    </div>
{{-- @include('footer') --}}

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/init.js')}}"></script>