@if(count($errors)>0)
    {{-- <ul> --}}
        @foreach ($errors->all() as $error)
            {{-- <li class="alert alert-danger">{{$error}}</li> --}}
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    {{-- </ul> --}}
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif