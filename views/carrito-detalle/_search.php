<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CarritoDetalleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carrito-detalle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cardet_id') ?>

    <?= $form->field($model, 'cardet_cantidad') ?>

    <?= $form->field($model, 'cardet_precio') ?>

    <?= $form->field($model, 'cardet_valoracion') ?>

    <?= $form->field($model, 'cardet_comentario') ?>

    <?php // echo $form->field($model, 'cardet_fkproducto') ?>

    <?php // echo $form->field($model, 'cardet_fkcarro') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
