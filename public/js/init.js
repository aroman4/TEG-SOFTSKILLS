$(document).ready(function() {
   /*  $('.collapsible').collapsible({
      accordion: false
    });
    
    $('select').material_select();
  
    $('.modal-trigger').leanModal(); */
  
    $(document).on('click', '.delete-option', function() {
      $(this).parent(".input-field").remove();
    });
  
    // will replace .form-g class when referenced
    var material = '<div class="input-field col input-g s12">' +
      '<input name="opcion[]" id="opcion[]" type="text">' +
      '<span style="float:right; cursor:pointer;"class="delete-option">Delete</span>' +
      '<label for="opcion">Options</label>' +
      '<span class="add-option" style="cursor:pointer;">Add Another</span>' +
      '</div>';
  
    // for adding new option
    $(document).on('click', '.add-option', function() {
      $(".form-g").append(material);
    });
    // allow for more options if radio or checkbox is enabled
    $(document).on('change', '#tipo_pregunta', function() {
      var selected_option = $('#tipo_pregunta :selected').val();
      if (selected_option === "radio" || selected_option === "checkbox") {
        $(".form-g").html(material);
      } else {
        $(".input-g").remove();
      }
    });
  });