<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="{{asset('css/estilo.css')}}">
</head>
<body>
     <header>
        <nav class="menu-estilo-navegacion">
            <ul class="menu-estilo-principal">
                <li class="menu-estilo"><a class="menu" href="#"> Quienes Somos</a></li>
                <li class="menu-estilo"><a class="menu" href="#"> Servicios</a></li>
                <li class="menu-estilo"><a class="menu" href="#"> Staff</a></li>
                <li class="menu-estilo"><a class="menu" href="#"> Bibliografía</a></li>
                <li class="menu-estilo"><a class="menu" href="#"> Contactos</a></li>
            </ul>
        </nav>
    </header>

    <h1 class="text-center" id="solicitudSoktskills">solicitud</h1> 
    <form class="text-center" action = "solicitudSoftskills">
      <p>Titulo:</p>
      <input type="text" class="" name="Titulo" required="*">

      <p>Asunto:</p>
      <input type="text" class="" name="Asunto" required="*">

      <p>Descripción:</p>
      <input type="text" class="" name="Descripción" required="*">

      
      <p>Características:</p>
      <input type="text" class="" name="Características" required="*">

      <p>Mensaje:</p>
      <input type="text" class="" name="Mensaje">

      <p class=""><input type="button" class="" value="Ajustar archivos"></p>

      <p class=""><input type="button" class="" value="Enviar Solicitud"></p>

    </form>




</body>
</html>