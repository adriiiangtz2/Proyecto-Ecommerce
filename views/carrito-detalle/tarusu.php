<?php $tarjeta = \app\models\CarritoDetalle::tarjetaCheck(); ?>
<div class="nombreCheck">
    <h6><b>2 - METODO DE PAGO</b></h6>
</div>
<div style="margin-left: 10px;">
    <div>
        <div class="d-flex" style="width: 115%">
            <p><b><?= $tarjeta->tar_financiera ?></b> con terminación: <b><?php echo substr($tarjeta->tar_numtarjeta, 12, 16); ?></b></p>
        </div>
        <button class="botonCambiar"type="button">Agregar una tarjeta de crédito o débito</button >
    </div>
</div>