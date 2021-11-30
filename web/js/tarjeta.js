/* //* ###### EMPIEZAN FUNCIONES VISTA TARJETA/REGISTRAR */
const tarjeta = document.querySelector("#tarjeta"),
btnAbrirFormulario = document.querySelector("#btn-abrir-formulario"),
btnAbrirTarjeta = document.querySelector("#desplegar-tarjeta-info"),
btnMostrar = document.querySelector("#desplegar-tarjeta-info .mostrar"),
formulario = document.querySelector("#formulario-tarjeta"),
formulariot = document.querySelector("#formulariot"),
numeroTarjeta = document.querySelector("#tarjeta .numero"),
nombreTarjeta = document.querySelector("#tarjeta .nombre"),
logoMarca = document.querySelector("#logo-marca"),
firma = document.querySelector("#tarjeta .firma p"),
mesExpiracion = document.querySelector("#tarjeta .mes"),
yearExpiracion = document.querySelector("#tarjeta .year");
/* //   ccv = document.querySelector('#tarjeta .ccv'); */
/* // * Volteamos la tarjeta para mostrar el frente. */
const mostrarFrente = () => {
  if (tarjeta.classList.contains("active")) {
    tarjeta.classList.remove("active");
  }
};

/* // * Rotacion de la tarjeta */
tarjeta.addEventListener("click", () => {
  tarjeta.classList.toggle("active");
});

/* // * Boton de abrir formulario */
btnAbrirFormulario.addEventListener("click", () => {
  btnAbrirFormulario.classList.toggle("active");
  formulario.classList.toggle("active");
});
/* // * Input numero de tarjeta */
formulariot.inputNumero.addEventListener("keyup", (e) => {
  let valorInput = e.target.value;
  formulariot.inputNumero.value = valorInput
  // Eliminamos espacios en blanco
  .replace(/\s/g, "")
  // Eliminar las letras
  .replace(/\D/g, "")
  // Ponemos espacio cada cuatro numeros
  .replace(/([0-9]{16})/g, "$1 ")
  // Elimina el ultimo espaciado
  .trim();
  numeroTarjeta.textContent = valorInput;
  if (valorInput == "") {
    numeroTarjeta.textContent = "#### #### #### ####";
    logoMarca.innerHTML = "";
  }
  if (valorInput[0] == 4) {
    logoMarca.innerHTML = "";
    const imagen = document.createElement("img");
    imagen.src = "img/logos/visa.png";
    logoMarca.appendChild(imagen);
  } else if (valorInput[0] == 5) {
    logoMarca.innerHTML = "";
    const imagen = document.createElement("img");
    imagen.src = "img/logos/mastercard.png";
    logoMarca.appendChild(imagen);
  }

  // Volteamos la tarjeta para que el usuario vea el frente.
  mostrarFrente();
});

/* // * Input nombre de tarjeta */
formulariot.inputNombre.addEventListener("keyup", (e) => {
  let valorInput = e.target.value;
  formulariot.inputNombre.value = valorInput.replace(/[0-9]/g, "");
  nombreTarjeta.textContent = valorInput;
  firma.textContent = valorInput;
  if (valorInput == "") {
    nombreTarjeta.textContent = "Usuario";
  }
  mostrarFrente();
});

$("#cattarjeta-tar_expiracion").on("change", function (e) {
  $("#cattarjeta-tar_expiracion").val();
  console.log($("#cattarjeta-tar_expiracion").val());
  mesExpiracion.textContent = $("#cattarjeta-tar_expiracion").val();
});

/* // TODO  -------------------------CAMBIAR LAS CLASES DE MOSTRAR------------------------ */
//para que se le asigne un id a cada vez que realice el ciclo la vista mostrar
//se le cambia las clases para mostrar y no mostrar el contenedor de info
function desplegar(id){
  btnAbrirTarjeta2 = document.querySelector("#desplegar-tarjeta-info"+id);
  btnAbrirTarjeta2.classList.toggle("active");
  if ($(`#mostrar${id}`).hasClass("mostrar")) {
    $(`#mostrar${id}`).removeClass("mostrar").addClass("mostrar2");
  } else if ($(`#mostrar${id}`).hasClass("mostrar2")) {
    $(`#mostrar${id}`).removeClass("mostrar2").addClass("mostrar");
  }
};
/* //* ###### TERMINA FUNCIONES VISTA TARJETA/REGISTRAR */


/* //! Se utiliza en cat-tarjeta/registrar guarda la info del form */
function recargarTarjeta() {
  let numero = $("#inputNumero").val();
  let nombre = $('#inputNombre').val();
  let financiera = $("#cattarjeta-tar_financiera").val();
  let tipo = $("#cattarjeta-tar_tipo").val();
  let expiracion = $("#cattarjeta-tar_expiracion").val();

  console.log(financiera);
  // guarda los datos que contenga este id
  // let nav = $("#icon-fav"+id).val();
  $.post("/cat-tarjeta/registrartarjeta", {numtarjeta:numero,financiera:financiera,tipo:tipo,expiracion:expiracion,nombre:nombre}, function (data) {
    if (data) {
      $("#idmostrar").html(data.html);
      console.log("hola");
    }
  });
}

/* //! funcion eliminar Vista cat-registrar/mostrar  */
function eliminar(id) {
  console.log('imprime el id :');
  console.log({id});
  $.post("/cat-tarjeta/btneliminar", {id:id}, function (data) {
    if (data) {
      $("#idtarjeta").html(data.html);
      console.log("hola");
    }
  });
}
/* //! funcion editar Vista cat-registrar/mostrar  */
function editarTarjeta(id)
{

  // console.log(id);
  let nombre = $("#inputNom_"+id).val();
  let expiracion = $("#expiracion_"+id).val();
  console.log(nombre);
  console.log(expiracion);
  //manda el controler
    $.post('/cat-tarjeta/editar', {id:id,nombre:nombre,expiracion:expiracion}, function (data){
      if (data) {
          $('#mostrar'+id).html(data.html);
          $('#ventana-modal'+id).modal('hide');
         
      } 
    });
}
/* //* ########## FUNCIONAMIENTO EDITAR DE DOS CONTENEDORES #########3 */

/* //! cambia la info de contenedor funcion union */
function editarTarjeta2(id)
{
  console.log(id);
  let expiracion = $("#expiracion_"+id).val();
  //manda el controler
  $.post('/cat-tarjeta/editar2',{id:id,expiracion:expiracion}, function (data){
    console.log("siiiiii  hola"+data.html);
    if (data) {
      console.log('si paseee');
      $('#expiracion-tar'+id).html(data.html);
    } 
  });
}
/* //! Se ejecutan las dos funciones anteriores vista usuario/editardatos y titulo */
function editarUniontarjeta(id)
{
  editarTarjeta(id);
  editarTarjeta2(id);
}
/* //* ########## TERMINA FUNCIONAMIENTO EDITAR DE DOS CONTENEDORES #########3 */


/* //! Funcion para abir el modal de cat-tarjeta/editar */
function modal(id){
  // console.log(id);
  $('#ventana-modal'+id).modal();
}

// function modal(id){
//   $.get('cat-tarjeta/editar',{id:id}).done(function (d){
//     bootbox.dialog({
//       title:"vista",
//       size:'lg',
//       message:d,
//     });
//   }).fail(function(f){console.log(f.responseText);});
// }
/* //* Estilos cuando se poner el cursos y tambien en el modal y mostrar oculto */
function estilosTarjeta(id,financiera){

if(financiera =="Visa"){
  $("#infos-tarjetas"+id).addClass("estilos-visa1");
  $("#mostrar"+id).addClass("estilos-visa2");
  $("#modal-body-editar"+id).addClass("estilos-visa2");
  
}else if(financiera == "Mastercard"){
  $("#infos-tarjetas"+id).addClass("estilos-mastercard1");
  $("#mostrar"+id).addClass("estilos-mastercard2");
  $("#modal-body-editar"+id).addClass("estilos-mastercard2");
}else if(financiera == "American Express"){

  $("#infos-tarjetas"+id).addClass("estilos-american1");
  $("#mostrar"+id).addClass("estilos-american2");
  $("#modal-body-editar"+id).addClass("estilos-american2");
}
}

/* //* cambia el estilo de la entidad financiera dependiendo del select, de vista registrar */
function seleccionarTarjeta(){
  let EnFinanciera = $("#cattarjeta-tar_financiera").val();
  console.log(EnFinanciera);
  if(EnFinanciera =="Visa"){
    $("#fondo-delantera-tar").removeClass("delantera2 delantera3").addClass("delantera");
    $("#logo-financiera").removeClass("img-logo-financiera2 img-logo-financiera3 ").addClass("img-logo-financiera");
  }else if(EnFinanciera == "Mastercard"){
    $("#fondo-delantera-tar").removeClass("delantera3").addClass("delantera2");
    $("#logo-financiera").removeClass("img-logo-financiera2 img-logo-financiera3").addClass("img-logo-financiera2");
  }else if(EnFinanciera == "American Express"){
    $("#fondo-delantera-tar").removeClass(" delantera2").addClass("delantera3");
    $("#logo-financiera").removeClass("img-logo-financiera2 img-logo-financiera").addClass("img-logo-financiera3");
  }
  
}
