@include('header')
{{-- {!! MaterializeCSS::include_full() !!} --}}
@include('inc.mensajes')
<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>
@include('footer')
{{-- {!! MaterializeCSS::include_js() !!} --}}
<script src="{{asset('js/init.js')}}"></script>