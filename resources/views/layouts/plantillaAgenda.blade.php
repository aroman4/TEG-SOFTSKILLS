<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css"/>
@include('header')

@include('inc.mensajes')
@include('layouts.barralateralasesoria')
    <div class="row filaEscritorio" style="height:800px">
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
