@extends('layouts.plantillaQ')

@section('content')
        <div class="col-md-3">
            conversaciones
            <ul v-for="privateMsg in privateMsgs">
                <li @click="messages(privateMsg.id)">@{{privateMsg.nombre}}</li>
            </ul>
        </div>
        <div class="col-md-9">
            mensajes
            <div v-for="singleMsg in singleMsgs">
                <div v-if="singleMsg.user_from == <?php echo Auth::user()->id; ?>">
                    <div class="msjEnviado">
                        @{{singleMsg.msg}}
                    </div>
                </div>
                <div v-else>
                    <div class="msjRecibido">
                        @{{singleMsg.msg}}
                    </div>
                </div>
            </div>  
            <input type="hidden" v-model="conID">
            <textarea class="col-md-12 form-control" v-model="msgFrom" @keydown="inputHandler"></textarea>          
        </div>
@endsection