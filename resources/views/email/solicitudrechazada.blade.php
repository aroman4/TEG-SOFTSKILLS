Su solicitud con los siguientes detalles ha sido rechazada.
<h2>Cliente: <span>{{\App\User::find($id_cliente)->nombre}} {{\App\User::find($id_cliente)->apellido}}</span></h2>
<h2>Asesor designado: <span>{{\App\User::find($user_id)->nombre}} {{\App\User::find($user_id)->apellido}}</span></h2>
<h2>Asunto:</h2>
<h1>{{$titulo}}</h1>
<p>Creada el {{$created_at}}</p>
<h2>Descripción:</h2>
<h4>{{$mensaje}}</h4>