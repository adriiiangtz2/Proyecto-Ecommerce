<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Envio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="envio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'env_metodo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'env_tiempo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'env_costo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
