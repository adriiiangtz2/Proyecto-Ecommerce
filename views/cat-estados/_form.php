<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatEstados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-estados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'est_id')->textInput() ?>

    <?= $form->field($model, 'est_estado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
