<!-- Parte de Direccion de envio de la vista checkout -->
<?php

use yii\bootstrap4\Html;
/* Consulta del domicilio actualmente en el carro*/

$domicilio = \app\models\CarritoDetalle::domicilioCheck(); ?>
<div>
    <h6><b>1 - DIRECCIÓN DE ENVIO</b></h6>
</div>
<div class="div-vista-checkout">
    <!-- Datos que se muestran en Direccion de envio -->
    <?php if (!empty(\app\models\CarritoDetalle::domicilioCheck())) : ?>
        <p><b> Ciudad: </b><?= $domicilio->dom_ciudad ?><br>
            <b>Colonia: </b><?= $domicilio->dom_colonia ?><br>
            <b>Calle: </b><?= $domicilio->dom_calle ?><br>
            <b>Número exterior: </b><?= $domicilio->dom_numExt ?><br>
            <b>Número interior: </b><?= $domicilio->dom_numInt ?><br>
            <b>Teléfono: </b><?= $domicilio->dom_telefono ?><br>
            <b>Código postal: </b><?= $domicilio->dom_fkcp ?>
        <?php else : /* Si no hay nada en la consulta */ ?>
        <p>Aún no has añadido ningún domicilio.</p>
    <?php endif ?>
    </p>
    <!-- Boton para añadir domicilio si es necesario -->
    <?= Html::a('Añadir dirección', ['/domicilio/registrar'], ['class' => 'botonCambiar']) ?>
    <!-- <button class="botonCambiar"type="button">Añadir dirección</button > -->
</div>