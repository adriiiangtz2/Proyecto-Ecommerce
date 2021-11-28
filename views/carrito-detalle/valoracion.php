<?php

use yii\bootstrap4\Html;
use kartik\rating\StarRating;
use yii\bootstrap4\ActiveForm;

?>
<h3><b>CREAR RESEÑA</b></h3>
<div class="primer-contenedor-principal">
    <div class="segundo-contenedor-principal">
        <div class="row">
            <div class="col-md-2 producto-imagen">
                <!-- Se llama la imagen del producto en cuestion con funcion getUrl -->
                <img class="producto-img" src=<?= $producto->cardetFkproducto->getUrl() ?>>
            </div>
            <div class="col-md-6 producto-nombre">
                <!-- Nombre viene de la consulta -->
                <p><?= $producto->productoNombre ?></p>
            </div>
        </div>
        <hr>
        <!-- Formulario para guardar el dato de valoracion y el comentario -->
        <?php $form = ActiveForm::begin(); ?>
        <h5><b>Calificación general</b></h5>
        <!-- Widget para formulario de calificación -->
        <?= $form->field($producto, 'cardet_valoracion')->widget(StarRating::classname(), [
            'pluginOptions' => ['step' => 1],
            'options' => ['value' => '' . $producto->cardet_valoracion . '', 'readOnly' => false]
        ]);
        ?>
        <hr>
        <h5><b>Agregar un comentario escrito</b></h5>
        <!-- Text Area para el comentario -->
        <?= $form->field($producto, 'cardet_comentario')->textarea(['rows' => 6, 'placeholder' => '¿Que te gustó o que no te gustó? Escríbelo en este espacio.']) ?>
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-warning']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>