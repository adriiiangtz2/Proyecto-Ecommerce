<?php
/* Variable que guarda la consulta del metodo de envio del carrito para mostrar */
$envio = \app\models\CarritoDetalle::envioCheck();
/* foreach que trae la consulta del carrito para hacer los calculos de costo final */
foreach (\app\models\CarritoDetalle::productosCarrito() as $carritoDe) :
    $total = $total + $carritoDe->cardet_precio;
    $iva = $total * 0.16;
    $envio_costo = $envio->env_costo;
    $importe = $total + $iva + $envio_costo;
endforeach;
?>
<div id="finalizarbotondiv" class="finalizar-divs">
    <!-- Boton con funcion finalizarPago que hace los ultimos cambios a la bd y cierra el carro -->
    <button type="button" onclick="finalizarPago()" class="btn btn-warning finalizar-pedido-boton">Finalizar pedido</button>
    <br>
    <p class="color-texto-importante">Al realizar tu pedido, aceptas el aviso de privacidad y las condiciones de uso de Redstore.</p>
</div>
<div class="finalizar-divs">
    <!-- Contenedor con el resumen final de costos -->
    <div>
        <h5><b>Confirmación del Pedido</b></h5>
    </div>
    <div class="row">
        <div class="col-md-8">
            <p>Productos:</p>
            <p>Impuestos:</p>
            <p>Envío:</p>
        </div>
        <div class="col-md-4 text-right">
            <p>$<?= $total ?></p>
            <p>$<?= $iva ?></p>
            <p>$<?= $envio_costo ?></p>
        </div>
    </div>
</div>
<div class="finalizar-divs">
    <!-- Precio final -->
    <p class="color-total-finalizar"><b>Total (IVA incluido, si aplica), <br>
            $<?= $importe ?></b></p>
    <!-- Los input sirven como contenedor para los datos de importe total y el iva -->
    <input id="total-carro" class="d-none" type="text" value="<?= $importe ?>"></input>
    <input id="iva-carro" class="d-none" type="text" value="<?= $iva ?>"></input>
</div>
<div class="envio-informacion">
    <p class="color-envio-informacion">¿Cómo se calculan los gastos de envío?</p>
    <p>Se ha aplicado el envío Redstore Prime a los productos incluidos en la oferta para tu pedido. </p>
</div>