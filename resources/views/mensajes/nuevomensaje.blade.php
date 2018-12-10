@extends((( auth()->user()->tipo_usu == "investigador") ? 'layouts.menuinv' : 'layouts.plantillaQ' ))

@section('content')
    <div class="col-md-9 listaQuest">
        <div class="card" style="border: none">
            <div class="card-header text-center top-bar">
                <button style="float:left" onclick="goBack()" class="btn btn-secondary">Regresar</button>
                <h3 style="float:right">{{ __('Mensaje nuevo') }}</h3>
            </div>

                <div class="card-body">                    
                    <form method="POST" action="{{ route('crearmensajepost') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id_remitente" value="{{ $id_remitente }}">
                        <input type="hidden" name="id_destinatario" value="{{ $id_destinatario}}">
                        <h4>Para: {{\App\User::find($id_destinatario)->nombre.' '.\App\User::find($id_destinatario)->apellido}}</h4>
                        <div class="form-group row">
                            <label for="asunto">Asunto:</label>
                            <input name="asunto" id="titulo" type="text" class="form-control">
                        </div>
                        <div class="form-group row">                            
                            <label for="mensaje">Mensaje</label>
                            <textarea style="height: 200px" name="mensaje" id="mensaje" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Adjuntar Archivo</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="archivo" >
                            </div>
                        </div>    
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>            
                </div>
            </div>
        </div>
    </div>
@endsection