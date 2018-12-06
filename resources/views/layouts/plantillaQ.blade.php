@include('header')
@include('inc.mensajes')
{{-- @include('layouts.barralateralasesoria') --}}

    <div class="row filaEscritorio column">
        <div class="col-md-2 barraLateralEscritorio">
            <ul class="list-group list-group-flush  column">
                <li class="text-center">
                    @if(auth()->user()->imagen != null)
                        <img class="userImg" src="{{asset('imagenperfil/'.auth()->user()->imagen)}}">
                    @else
                        <img class="userImg" src="{{asset('imagenperfil/avatarplaceholder.png')}}">
                    @endif
                </li>
                <li class="list-group-item text-center"><a style="color:white" href="{{route('perfilusu')}}">{{Auth::user()->nombre ." ". Auth::user()->apellido}}</a></li>
                @if(auth()->user()->tipo_usu == "asesor")
                    <li class="list-group-item {{ request()->is('escritorioasesor') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('escritorioasesor')}}"><i class="fas fa-home"></i> Escritorio</a></li>
                @elseif(auth()->user()->tipo_usu == "cliente")
                    <li class="list-group-item {{ request()->is('escritoriocliente') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('escritoriocliente')}}"><i class="fas fa-home"></i> Escritorio</a></li>
                @endif
                <li class="list-group-item {{ request()->is('asesescritorio') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('asesescritorio')}}"><i class="fas fa-handshake"></i> Asesorías</a></li>
                <li class="list-group-item {{ request()->is('solicitud.index') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('solicitud.index')}}"><i class="far fa-bell"></i> Solicitudes</a></li>
                <li class="list-group-item {{ request()->is('reportedetalle') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('reporteshome')}}"><i class="fas fa-chart-pie"></i> Reportes</a></li>
                <li class="list-group-item {{ request()->is('cuestionario.home') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('cuestionario.home')}}"><i class="fas fa-file-signature"></i> Instrumentos</a></li>
                <li class="list-group-item {{ request()->is('agenda') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('agenda')}}"><i class="fas fa-calendar-alt"></i> Agenda</a></li>
                @if(auth()->user()->tipo_usu == "asesor")
                    <li class="list-group-item {{ request()->is('bancoclientes') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('bancoclientes')}}"><i class="fas fa-address-book"></i> Banco de clientes</a></li>
                @endif
                <li class="list-group-item {{ request()->is('mensajes') ? 'active' : '' }}"><a class="aMenuLateral" href="{{route('mensajes',auth()->user()->id)}}"><i class="fas fa-envelope"></i> Mensajes</a></li>
            </ul>
        </div>
        @yield('content')
    </div>
    <button onclick="topFunction()" id="myBtn" title="Ir arriba"><i class="fas fa-arrow-up"></i></button>
{{-- @include('footer') --}}

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/init.js')}}"></script>
<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }
    
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>