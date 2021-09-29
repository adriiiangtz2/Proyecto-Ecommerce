<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Envio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="envio-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class= "row">
        <div class= col-md-4>
            <?= $form->field($model, 'env_metodo')->textInput(['maxlength' => true]) ?>
        </div>

        <div class= col-md-3>
            <?= $form->field($model, 'env_tiempo')->textInput(['maxlength' => true]) ?>
        </div>

        <div class= col-md-2>
            <?= $form->field($model, 'env_costo')->textInput(['maxlength' => true]) ?>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
