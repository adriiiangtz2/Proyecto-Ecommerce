<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatMarca */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-marca-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mar_nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
