<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usu_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usu_paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usu_materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usu_fkuser')->textInput() ?>

 

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
