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
                    <div class="card-header">{{ __('Investigaciones') }}</div>

             </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p>holaaaa 1
    
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p>holaaaa 2
        
                        </p>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection