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
        <div class="form-group row">
          <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
              <div class="panel-heading">Agregar archivos</div>
                <div class="panel-body">
                    <form method="POST" action="http://localhost/softskills/public/storage/create" accept-charset="UTF-8" enctype="multipart/form-data">
                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div class="form-group">
                      <label class="col-md-4 control-label">Subir Curriculum</label>
                      <div class="col-md-6">
                        <input type="file" class="form-control" name="file" >
                      </div>
                    </div>
        
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
@endsection