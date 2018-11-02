@extends('layouts.plantilla')

@section('content')
<div class="container">
    @if(count($errors)>0)
        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Encuesta Número 1') }}</div>

                    <div class="card-body">
                        
                                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection






