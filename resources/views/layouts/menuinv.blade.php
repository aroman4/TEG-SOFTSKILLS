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
                <li {{ request()->is('escritorioinv') ? 'active' : '' }}><a href="{{route('escritorioinv')}}"><i class="fa fa-desktop" style="color:blue"></i>   Escritorio</a></li>
                <li {{ request()->is('escritorioinvestigador') ? 'active' : '' }}><a href="{{route('escritorioinvestigador')}}"><i class="fa fa-list-alt" style="color:blue"></i>   Solicitudes</a></li>
                <li {{ request()->is('listapostulaciones') ? 'active' : '' }}><a href="{{route('listapostulaciones')}}"><i class="fa fa-address-card" style="color:blue"></i>   Postulaciones</a></li>
                <li {{ request()->is('vistainvestigaciones') ? 'active' : '' }}><a href="{{route('vistainvestigaciones')}}"><i class="fa fa-file-code" style="color:blue"></i>   Investigación</a></li>
                <li {{ request()->is('publicacioninve') ? 'active' : '' }}><a href="{{route('publicacioninve')}}"><i class="fa fa-newspaper" style="color:blue"></i>   Publicaciones</a></li>
                <li {{ request()->is('resultados') ? 'active' : '' }}><a href="{{route('resultados')}}"><i class="fa fa-folder" style="color:blue"></i>   Resultados</a></li>
                <li {{ request()->is('mensajes') ? 'active' : '' }}><a href="{{route('mensajes',auth()->user()->id)}}"><i class="fa fa-envelope" style="color:blue"></i>   Mensajes</a></li>
            </ul>
        </div>
    </div>

    @yield('content')
</div>

{{-- click en menu--}}
{{-- @include('footer') <i class="fa fa-envelope-o" color: #000fff;>--}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/init.js')}}"></script>