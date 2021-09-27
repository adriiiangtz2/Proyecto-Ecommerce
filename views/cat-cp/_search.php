<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatCpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-cp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cp_id') ?>

    <?= $form->field($model, 'cp_fkmunicipio') ?>

    <?= $form->field($model, 'cp_fkestado') ?>

    <?= $form->field($model, 'cp_cp') ?>

    <?= $form->field($model, 'cp_colonia') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reiniciar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
