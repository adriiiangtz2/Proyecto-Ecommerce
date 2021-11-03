<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatTarjetaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-tarjeta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tar_id') ?>
    <?= $form->field($model, 'tar_numtarjeta') ?>
    <?= $form->field($model, 'tar_nombre') ?>
    <?= $form->field($model, 'tar_expiracion') ?>
    <?= $form->field($model, 'tar_financiera') ?>
    <?= $form->field($model, 'tar_tipo') ?>

    <?php // echo $form->field($model, 'tar_fkusuario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
