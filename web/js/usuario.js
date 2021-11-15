//! Abrir el modal vista usuario/info-datos
function modalusu(id){
    // console.log(id);
    $('#ventana-modalusu'+id).modal();
  }
//! Abrir el modal vista usuario/info-acceso
function modalacceso(id){
    // console.log(id);
    $('#ventana-modalacceso'+id).modal();
  }
  
//* ########## FUNCIONAMIENTO EDITAR DE DOS CONTENEDORES #########3
//! cambia la info de contenedor funcion union
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
//! cambia la info de contenedor funcion union
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
//! Se ejecutan las dos funciones anteriores vista usuario/editardatos y titulo
function editarUnion(id)
{
  editardatos(id);
  editardatos2(id);
}
//* ########## TERMINA FUNCIONAMIENTO EDITAR DE DOS CONTENEDORES #########3


//! Funcion que edita la info de acceso vista usuario/editaracceso
function editaracceso(id)
{
  let username = $("#user-username").val();
  let password = $("#user-password").val();
  let correo = $("#user-correo").val();
  console.log(id);
  console.log(password);
  console.log(username);
  console.log(correo);
  //manda el controler
  $.post('/usuario/acceso',{id:id,username:username,correo:correo,password:password}, function (data){
    console.log("hola"+data.html);
    if (data) {
      console.log('hola');
        $('#mostrardatos2').html(data.html);
    } 
  });
}
//! Funcion que se usa en usuario/informacion
function eliminarcuenta(id){
  console.log(id);
  $.post('/usuario/estatus',{id:id}, function (data){
    console.log('si paso');
    console.log("hola"+data.html);
  });
}