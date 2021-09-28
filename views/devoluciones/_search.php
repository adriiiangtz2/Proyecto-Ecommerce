<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DevolucionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="devoluciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'dev_id') ?>

    <?= $form->field($model, 'dev_comentario') ?>

    <?= $form->field($model, 'dev_estatus') ?>

    <?= $form->field($model, 'dev_fkcarritodetalle') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reiniciar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
