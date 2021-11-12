function agregarCarro(id)
{
  console.log(id);
  $.post('/carrito-detalle/agregar-producto', {id:id}, function (data){
    if (data) {
    }else{
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
function registrarCantidad(id)
{
    let cantidad = $('#input-cant' + id).val();
    $.post('/carrito-detalle/registrar', {cantidad:cantidad,id:id}, function (data){
      if (data) {
          $('#cardet').html(data.html);
      } 
    });
}
function guardarMetodo()
{
/*   console.log(id);*/
  console.log("HOLA");
  let metodo = $('#carro-car_fkmetodo').val(); 
  console.log(metodo);
}
function eliminarProducto(id)
{
    $.post('/carrito-detalle/eliminar', {id:id}, function (data){
      if (data) {
          $('#cardet').html(data.html);
      } 
    });
}
function modaldomicilio(id){
  // console.log(id);
  $('#ventana-modaldomicilio'+id).modal();
}
function modaltarjeta(id){
  // console.log(id);
  $('#ventana-modaltarjeta'+id).modal();
}
function modalenvio(id){
  // console.log(id);
  $('#ventana-modalenvio'+id).modal();
  console.log(id);
}
function registrarDomicilio()
{
    let id = $('input[name=domcolor]:checked', '#modal-body-domicilio').val();
    $.post('/carrito-detalle/editar-domicilio', {id:id}, function (data){
      if (data) {
          $('#domi-info').html(data.html);
      } 
    });
    console.log(id)
}
function registrarTarjeta()
{
    let id = $('input[name=tarjcolor]:checked', '#modal-body-tarjeta').val();
    $.post('/carrito-detalle/editar-tarjeta', {id:id}, function (data){
      if (data) {
          $('#tarje-info').html(data.html);
      } 
    });
    console.log(id)
}
function registrarEnvio()
{
    let id = $('input[name=envcolor]:checked', '#modal-body-envio').val();
    $.post('/carrito-detalle/editar-envio', {id:id}, function (data){
      if (data) {
          $('#envi-info').html(data.html);
      } 
    });
    console.log(id)
}
function finalizarPago()
{
  let total = $('#total-carro').val();
  let iva = $('#iva-carro').val();
  console.log(total);
  $.post('/carrito-detalle/finalizar-pago', {total:total, iva:iva}, function (data){
    if (data) {
        
    } else{
      Swal.fire(
        'Su pedido se ha realizado correctamente.',
        'Seras redireccionado.',
        'success'
      ) .then(function(){
        window.location='/';
      });
    }
  });
}