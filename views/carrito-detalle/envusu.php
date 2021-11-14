<!-- Parte de Metodo de envio de la vista checkout -->
<!-- Consulta el metodo de envio actualmente en el carro -->
<?php $envio = \app\models\CarritoDetalle::envioCheck(); ?>
<div class="nombreCheck">
    <h6><b>3 - ENVIO</b></h6>
</div>
<div class="div-vista-checkout">
    <div>
        <div class="d-flex">
                <!-- Datos que se muestran en Metodo de envio -->
            <p>$<b><?= $envio->env_costo ?></b> Método de envío: <b><?= $envio->env_metodo?></b> - Tiempo de entrega: <b><?= $envio->env_tiempo?></b></p>
        </div>
    </div>
</div>