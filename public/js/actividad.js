$(document).ready(function() {
  
    $(document).on('click', '.delete-option', function() {
      $(this).parent(".input-field").remove();
    });
  
    var act = '<div class="input-field form-control" style="border:none;">'+
    '<input type="text" name="actividades[]" id="actividades[]" class="form-control">'+
    '<span style="float:right; cursor:pointer;"class="delete-option btn btn-danger">Borrar objetivo</span>'+
    '</div>';
  
    // for adding new option
    $(document).on('click', '.add-option', function() {
      $(".agg-actividad").append(act);
    });
  });
//menu de los investigadores
$('.menu-bar').on('click', function(){
  $('.contenido').toggleClass('abrir');
})