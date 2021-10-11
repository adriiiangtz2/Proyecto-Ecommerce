<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatEstados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-estados-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row offer">

    <div class="col">
    <?= $form->field($model, 'est_id')->textInput() ?>
    </div>


    <div class="col">
    <?= $form->field($model, 'est_estado')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="row justify-content-center">
    <div class="form-group">
        <?= Html::submitButton('guardar', ['class' => 'btnn']) ?>
    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
