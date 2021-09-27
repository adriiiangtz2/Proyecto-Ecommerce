<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CarroSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'car_id') ?>

    <?= $form->field($model, 'car_iva') ?>

    <?= $form->field($model, 'car_fecha') ?>

    <?= $form->field($model, 'car_estatus') ?>

    <?= $form->field($model, 'car_fkusuario') ?>

    <?php // echo $form->field($model, 'car_fkmetodo') ?>

    <?php // echo $form->field($model, 'car_fkdomicilio') ?>

    <?php // echo $form->field($model, 'car_fkenvio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
