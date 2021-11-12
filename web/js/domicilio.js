//funcion eliminar Vista mostrar
function eliminar(id) {
  console.log("imprime el id :");
  console.log({ id });
  $.post("/cat-tarjeta/btneliminar", { id: id }, function (data) {
    if (data) {
      $("#idtarjeta").html(data.html);
      console.log("hola");
    }
  });
}

//MOSTRAR LA VISTA MODAL DEPENDIENDO DEL ID DE VISTA EDITAR
function modal(id) {
  // console.log(id);
  $("#ventana-modal" + id).modal();
}

//FUNCIONAMIENTO EDITAR
function editarTarjeta(id) {
  console.log(id);
  let nombre = $("#inputNom_" + id).val();
  let expiracion = $("#expiracion_" + id).val();
  console.log(nombre);
  console.log(expiracion);
  //manda el controler
  $.post(
    "/cat-tarjeta/editar",
    { id: id, nombre: nombre, expiracion: expiracion },
    function (data) {
      if (data) {
        console.log("hola");
        $("#mostrar" + id).html(data.html);
        console.log("#mostrar ------" + id);
      }
    }
  );
}
