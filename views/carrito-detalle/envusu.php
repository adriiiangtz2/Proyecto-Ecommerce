<?php $envio = \app\models\CarritoDetalle::envioCheck(); ?>
<div class="nombreCheck">
    <h6><b>3 - ENVIO</b></h6>
</div>
<div style="margin-left: 10px;">
    <div>
        <div class="d-flex">
            <p>$<b><?= $envio->env_costo ?></b> Método de envío: <b><?= $envio->env_metodo?></b> - Tiempo de entrega: <b><?= $envio->env_tiempo?></b></p>
        </div>
    </div>
</div>