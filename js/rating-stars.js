$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });


  $('#stars li').ready(function(){ //Cuando se carga la lista hacemos una consulta en obtenerValoracion.php para obtener si han habido votaciones con este usuario
    var datos={};
    $.getJSON('../db/obtenerValoracion.php',datos,asignarValor);
    var stars = $(this).parent().children('li.star');
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    //if(onStar == 0) //Si no se ha modificado
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    //var datos={};
    //$.getJSON('../db/obtenerValoracion.php',datos,asignarValor);

    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    //console.log(ratingValue);
    var msg = "";
    if (ratingValue > 1) {
        msg = "¡Gracias! Has valorado este artículo con " + ratingValue + " estrellas.";
    }
    else {
        msg = "Intentaremos mejorar. Has valorado este artículo con " + ratingValue + " estrella.";
    }
    
    var datos={nota : ratingValue};
    //console.log(datos);
    $.getJSON('../db/guardarValoracion.php',datos,procesarDatos);

    responseMessage(msg);
        
  });

  
  
});

function procesarDatos(datosRespuesta){
  $("#contenedor").html(datosRespuesta.nota);
  //console.log(datosRespuesta);
}

function asignarValor(datosRespuesta){
  var cantidadEstrellasVotadas = parseInt(datosRespuesta);

  for (i = 1; i <= cantidadEstrellasVotadas; i++) {
    $("#"+i).addClass('selected');
  }

}

function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}