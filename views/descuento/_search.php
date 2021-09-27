<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DescuentoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="descuento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'des_id') ?>

    <?= $form->field($model, 'des_inicio') ?>

    <?= $form->field($model, 'des_fin') ?>

    <?= $form->field($model, 'des_descuento') ?>

    <?= $form->field($model, 'des_fkproducto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
