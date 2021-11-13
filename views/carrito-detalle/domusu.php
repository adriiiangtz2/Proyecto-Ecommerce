<?php $domicilio = \app\models\CarritoDetalle::domicilioCheck(); ?>
<div>
    <h6><b>1 - DIRECCIÓN DE ENVIO</b></h6>
</div>
<div style="margin-left: 10px;">
    <p><b> Ciudad:</b><?= $domicilio->dom_ciudad ?><br>
        <b>Colonia:</b><?= $domicilio->dom_colonia ?><br>
        <b>Calle:</b><?= $domicilio->dom_calle ?><br>
        <b>Número exterior:</b><?= $domicilio->dom_numExt ?><br>
        <b>Número interior:</b><?= $domicilio->dom_numInt ?><br>
        <b>Teléfono :</b><?= $domicilio->dom_telefono ?><br>
        <b>Código postal:</b><?= $domicilio->dom_fkcp ?>
    </p>
    <button class="botonCambiar"type="button">Añadir dirección</button >
</div>

