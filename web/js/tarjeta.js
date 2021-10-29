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
//   ccv = document.querySelector('#tarjeta .ccv');

// * Volteamos la tarjeta para mostrar el frente.
const mostrarFrente = () => {
  if (tarjeta.classList.contains("active")) {
    tarjeta.classList.remove("active");
  }
};

// * Rotacion de la tarjeta
tarjeta.addEventListener("click", () => {
  tarjeta.classList.toggle("active");
});

// * Boton de abrir formulario
btnAbrirFormulario.addEventListener("click", () => {
  btnAbrirFormulario.classList.toggle("active");
  formulario.classList.toggle("active");
});
// * Input numero de tarjeta
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

// * Input nombre de tarjeta
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

// -------------------------CAMBIAR LAS CLASES DE MOSTRAR------------------------
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
//DESPLEGAR DE VISTA MOSTRAR
function recargarTarjeta() {
  let numero = $("#inputNumero").val();
  // let numero = $('#inputNombre').val();
  let financiera = $("#cattarjeta-tar_financiera").val();
  let tipo = $("#cattarjeta-tar_tipo").val();
  let expiracion = $("#cattarjeta-tar_expiracion").val();
  // guarda los datos que contenga este id
  // let nav = $("#icon-fav"+id).val();
  $.post("/cat-tarjeta/registrartarjeta", {numtarjeta:numero,financiera:financiera,tipo:tipo,expiracion:expiracion}, function (data) {
    if (data) {
      $("#idmostrar").html(data.html);
      console.log("hola");
    }
  });
}
