function modalusu(id){
    // console.log(id);
    $('#ventana-modalusu'+id).modal();
  }
  
function modalacceso(id){
    // console.log(id);
    $('#ventana-modalacceso'+id).modal();
  }
  
//FUNCIONAMIENTO EDITAR
function editardatos(id)
{
  let nombre = $("#usu-nombre").val();
  let paterno = $("#usu-paterno").val();
  let materno = $("#usu-materno").val();
  console.log(id);
  console.log(nombre);
  console.log(paterno);
  console.log(materno);
 
  //manda el controler
    $.post('/usuario/dato',{id:id,nombre:nombre,paterno:paterno,materno:materno}, function (data){
      console.log("hola"+data.html);
      if (data) {
        console.log('hola');
          $('#mostrardatos').html(data.html);
      } 
    });
}

//FUNCIONAMIENTO EDITAR
function editardatos2(id)
{
  
  //manda el controler
  $.post('/usuario/dato2',{id:id}, function (data){
    console.log("hola"+data.html);
    if (data) {
      console.log('hola');
      $('#titulo-usu').html(data.html);
    } 
  });
}
function editarUnion(id)
{
  editardatos(id);
  editardatos2(id);
}

function editaracceso(id)
{
  let username = $("#user-username").val();
  // let paterno = $("#usu-paterno").val();
  let correo = $("#user-correo").val();
  console.log(id);
  console.log(username);
  console.log(correo);
  //manda el controler
  $.post('/usuario/acceso',{id:id,username:username,correo:correo}, function (data){
    console.log("hola"+data.html);
    if (data) {
      console.log('hola');
        $('#mostrardatos2').html(data.html);
    } 
  });
}

function eliminarcuenta(id){
  console.log(id);
  $.post('/usuario/estatus',{id:id}, function (data){
    console.log('si paso');
    console.log("hola"+data.html);
  });
}