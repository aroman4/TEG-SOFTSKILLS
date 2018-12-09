@include('header')
@include('inc.mensajes')

<div style="margin-right:0px;background-image: linear-gradient(rgb(189, 189, 189), rgb(255, 255, 255));"class="row">
    <div style="margin-right:0px; padding-right:0px;"class="col-md-2">
        <div  class="menu-inv">
            <ul>
                <li class="text-center">
                    @if(auth()->user()->imagen != null)
                        <img class="userImg" src="{{asset('imagenperfil/'.auth()->user()->imagen)}}" >
                    @else
                        <img class="userImg" src="{{asset('imagenperfil/avatarplaceholder.png')}}">
                    @endif
                    <br>{{Auth::user()->nombre ." ". Auth::user()->apellido}}<br><br>
                </li>
                <li {{ request()->is('') ? 'active' : '' }}><a href="{{route('escritoriocomite')}}"><i class="fas fa-home"></i>   Escritorio</a></li>
                <li {{ request()->is('') ? 'active' : '' }}><a title="solicitud de Investiagciones por iniciar" href="{{route('comiteinvestigaciones')}}"><i class="far fa-bell"></i>  Solicitud de Investigaciones</a></li>
                <li {{ request()->is('') ? 'active' : '' }}><a title="solicitud de Investiagciones Finalizadas" href="{{route('investigacionesfinalc')}}"><i class="fa fa-folder"></i> Investigaciones</a></li>
                <li {{ request()->is('') ? 'active' : '' }}><a title="asesorias" href="{{route('asesoriacomite')}}"><i class="fas fa-handshake"></i>   Asesorias</a></li>
                </ul>
        </div>
    </div>

    @yield('content')
</div>

{{-- click en menu--}}
{{-- @include('footer') <i class="fa fa-envelope-o" color: #000fff;>--}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/init.js')}}"></script>