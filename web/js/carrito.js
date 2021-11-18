/* Funcion que agrega el producto seleccionado a carrito. Trae la id definida en el boton de Agregar al carrito de detalles.php en
producto */
function agregarCarro(id) {
  console.log(id);
  /* Sale el dato de la funcion del controler actionAgregarProducto */
  $.post('/carrito-detalle/agregar-producto', { id: id }, function (data) {
    if (data) {
      /* Saca el dato de actionRegistrar para que se tome en cuenta el contador cuando se agregue */
      $('#contador').html(data.html);
      /* El Swal define una notificacion temporal cuando se agrega el producto */
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Se ha agregado al carrito',
        showConfirmButton: false,
        timer: 1500
      })
    }
  });
}
/* Funcion para hacer los registros en el input de cantidad en el carrito y el checkout*/
function registrarCantidad(id, num = null) {
  /* Guarda la id del producto al que le corresponde la cantidad*/
  let cantidad = $('#input-cant' + id).val();
  /* Se lleva el dato al actionRegistrar en el controller */
  $.post('/carrito-detalle/registrar', { cantidad: cantidad, id: id }, function (data) {
    if (data) {
      /* Se hace un if para comparar si el input-cant viene de la vista carrito o de carrito-final para el checkout */
      if (num != null) {
        /* Si es num lo manda a carrito-final */
        $('#cardet').html(data.carfinal);
      } else {
        /* Si no encuentra un num lo manda a la vista carrito */
        $('#cardet').html(data.html);
      }
      /* Manda el dato al contenedor de la vista finalizar para el checkout */
      $('#contenedor-carrito-final').html(data.importefinal);
      /* Si se usa el input del carrito o carrito-final la cantidad se cuenta en el contador */
      $('#contador').html(data.contador);
    }
  });
}
/*  */
function guardarMetodo() {
  /*   console.log(id);*/
  console.log("HOLA");
  let metodo = $('#carro-car_fkmetodo').val();
  console.log(metodo);
}
/* Funcion para el boton Eliminar en carrito y carrito-final. Elimina el producto seleccionado del carrito */
function eliminarProducto(id, num = null) {
  /* Se lleva el dato salido del onclick al actionEliminar en el controller */
  $.post('/carrito-detalle/eliminar', { id: id }, function (data) {
    if (data) {
      /* Se hace un if para comparar si el input-cant viene de la vista carrito o de carrito-final para el checkout */
      if (num != null) {
        /* Si es num lo manda a carrito-final */
        $('#cardet').html(data.carfinal);
      } else {
        /* Si no encuentra un num lo manda a la vista carrito */
        $('#cardet').html(data.html);
      }
      /* Se hace el cambio en el contador al eliminar un producto */
      $('#contador').html(data.contador);
      /* Se hace el cambio en el resumen de compra al eliminar producto */
      $('#contenedor-carrito-final').html(data.importefinal);
    }
  });
}
/* Funcion para que aparezca el modal al hacerle click a Cambiar en Direccion de envio */
function modaldomicilio(id) {
  // console.log(id);
  $('#ventana-modaldomicilio' + id).modal();
}
/* Funcion para que aparezca el modal al hacerle click a Cambiar en Metodo de pago */
function modaltarjeta(id) {
  // console.log(id);
  $('#ventana-modaltarjeta' + id).modal();
}
/* Funcion para que aparezca el modal al hacerle click a Cambiar en Metodo de envio */
function modalenvio(id) {
  // console.log(id);
  $('#ventana-modalenvio' + id).modal();
  console.log(id);
}
/* Funcion para guardar el cambio hecho en el modal de Domicilio en el checkout */
function registrarDomicilio() {
  /* Mete en una variable la id del dato que se haya checado con el input radio */
  let id = $('input[name=domcolor]:checked', '#modal-body-domicilio').val();
  /* Se manda el dato a la funcion actionEditarDomicilio en el controller */
  $.post('/carrito-detalle/editar-domicilio', { id: id }, function (data) {
    if (data) {
      /* Manda el cambio al contenedor de la vista */
      $('#domi-info').html(data.html);
    }
  });
  console.log(id)
}
/* Funcion para guardar el cambio hecho en el modal de Tarjeta en el checkout */
function registrarTarjeta() {
  /* Mete en una variable la id del dato que se haya checado con el input radio */
  let id = $('input[name=tarjcolor]:checked', '#modal-body-tarjeta').val();
  /* Se manda el dato a la funcion actionEditarTarjeta en el controller */
  $.post('/carrito-detalle/editar-tarjeta', { id: id }, function (data) {
    if (data) {
      /* Manda el cambio al contenedor de la vista */
      $('#tarje-info').html(data.html);
    }
  });
  console.log(id)
}
/* Funcion para guardar el cambio hecho en el modal de Metodo de envio en el checkout */
function registrarEnvio() {
  /* Mete en una variable la id del dato que se haya checado con el input radio */
  let id = $('input[name=envcolor]:checked', '#modal-body-envio').val();
  /* Se manda el dato a la funcion actionEditarEnvio en el controller */
  $.post('/carrito-detalle/editar-envio', { id: id }, function (data) {
    if (data) {
      /* Manda el cambio al contenedor de la vista */
      $('#envi-info').html(data.html);
      /* Manda el cambio al contenedor del resumen final del pedido para que se actualice el precio de envio en tiempo real*/
      $('#contenedor-carrito-final').html(data.importefinal);
    }
  });
  console.log(id)
}
/* Funcion para hacer los ultimos cambios a la bd de carro y para cerrar el carro */
function finalizarPago() {
  /* Variables que guardan los datos correspondientes del importe total y el iva */
  let total = $('#total-carro').val();
  let iva = $('#iva-carro').val();
  let dom = $('#dom-existente').val();
  let tar = $('#tar-existente').val();
  console.log(total);
  console.log(dom);
  console.log(tar);
  /* if para comparar si los datos de metodo de pago y domicilio estan presentes en carro. Si lo esta, este cierra el carrito correctamente */
  if (dom != "" && tar != "") {
    /* Se llevan los datos al actionFinalizarPago en el controller */
    $.post('/carrito-detalle/finalizar-pago', { total: total, iva: iva }, function (data) {
      if (data) {

      } else {
        /* El swal para dar una confirmacion que el pedido se ha completado */
        Swal.fire(
          'Su pedido se ha realizado correctamente.',
          'Seras redireccionado.',
          'success'
        ).then(function () {
          window.location = '/';
        });
      }
    }); /* Los siguientes else son para comparar si los datos son null */
  } else if (dom == "" && tar == "") {
    /* Si no hay domicilio ni metodo de pago se le va a pedir al usuario que agregue estos */
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Se requiere un domicilio y un método de pago para continuar ',
      showConfirmButton: false,
      timer: 1500
    })
  } else if (dom != "" && tar == "") {
    /* Si no hay metodo de pago se le va a pedir al usuario que agregue este dato */
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Se requiere un método de pago para continuar ',
      showConfirmButton: false,
      timer: 1500
    })
  } else if (dom == "" && tar != "") {
    /* Si no hay domicilio se le va a pedir al usuario que agregue este dato */
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Se requiere un domicilio para continuar ',
      showConfirmButton: false,
      timer: 1500
    })
  }

}
