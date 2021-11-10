function modalusu(id){
    // console.log(id);
    $('#ventana-modalusu'+id).modal();
  }
  
function modalacceso(id){
    // console.log(id);
    $('#ventana-modalacceso'+id).modal();
  }
  
  //FUNCIONAMIENTO EDITAR
function editaracceso(id)
{
  console.log(id);
  let username = $("#inputuser_"+id).val();
  let correo = $("#inputcorreo_"+id).val();
  console.log(nombre);
  console.log(expiracion);
  //manda el controler
    $.post('/cat-tarjeta/editar', {id:id,nombre:nombre,expiracion:expiracion}, function (data){
      if (data) {
        console.log('hola');
          $('#mostrar'+id).html(data.html);
          console.log('#mostrar ------'+id);
      } 
    });
}