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
