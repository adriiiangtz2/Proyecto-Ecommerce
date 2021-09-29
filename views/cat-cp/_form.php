<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatCp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-cp-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-1">
            <?= $form->field($model, 'cp_id')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'cp_fkestado')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'cp_fkmunicipio')->textInput() ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'cp_colonia')->textInput(['maxlength' => true]) ?> 
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'cp_cp')->textInput() ?>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
