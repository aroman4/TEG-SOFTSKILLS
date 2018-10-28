@include('header')
@include('inc.mensajes')
@include('layouts.barralateralasesoria')

    <div class="row filaEscritorio column">
        @yield('content')
    </div>
{{-- @include('footer') --}}

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/init.js')}}"></script>