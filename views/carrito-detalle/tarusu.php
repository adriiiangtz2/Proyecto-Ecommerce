<!-- Parte de Metodo de pago de la vista checkout -->
<!-- Consulta la tarjeta que esta registrado actualmente en el carro -->
<?php $tarjeta = \app\models\CarritoDetalle::tarjetaCheck(); ?>
<div class="nombreCheck">
    <h6><b>2 - MÉTODO DE PAGO</b></h6>
</div>
<div class="div-vista-checkout">
    <div>
        <div class="d-flex div-vista-tarjeta">
            <!-- Datos que se muestran en Metodo de envio -->
            <p><b><?= $tarjeta->tar_financiera ?></b> con terminación: <b><?php echo substr($tarjeta->tar_numtarjeta, 12, 16); ?></b></p>
        </div>
            <!-- Boton para añadir tarjeta si es necesario -->
        <button class="botonCambiar"type="button">Agregar una tarjeta de crédito o débito</button >
    </div>
</div>