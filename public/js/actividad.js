$(document).ready(function() {
    var cantObj = 0;
    $(document).on('click', '.delete-option', function() {
      $(this).parent(".input-field").remove();
      cantObj = cantObj - 1;
    });
  
    var act = '<div class="input-field form-control" style="border:none;"> Objetivo:'+
    '<input type="text" name="objetivosespecificos[]" id="objetivosespecificos[]" class="form-control">'+
    'Actividades del objetivo: <span class="add-actividad btn btn-success boton1" style="cursor:pointer;">Añadir actividad</span> '+
    '<div class="actividadesObj"></div>'+
    '</div>';

    /* 
    '<span style="float:right; cursor:pointer;"class="delete-option btn btn-danger">Borrar objetivo</span>'+ */

    var actividad = '<input type="text" style="margin-left:70px; width: calc(100% - 70px);" name="actividades'+cantObj+'[]" id="actividades'+cantObj+'[]" class="form-control">';
    
    // for adding new option
    $(document).on('click', '.add-option', function() {
      cantObj = cantObj + 1;
      console.log(cantObj);
      $(".add-actividad").remove();
      $(".agg-actividad").append(act);
    });
    //agregar nueva actividad
    $(document).on('click', '.add-actividad', function() {
      $(this).next().append('<input type="text" style="margin-left:70px; width: calc(100% - 70px);" name="actividades'+cantObj+'[]" id="actividades'+cantObj+'[]" class="form-control">');
    });
  });
//menu de los investigadores
$('.menu-bar').on('click', function(){
  $('.contenido').toggleClass('abrir');
})