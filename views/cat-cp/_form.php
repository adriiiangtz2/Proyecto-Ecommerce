<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatCp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-cp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cp_id')->textInput() ?>

    <?= $form->field($model, 'cp_fkmunicipio')->textInput() ?>

    <?= $form->field($model, 'cp_fkestado')->textInput() ?>

    <?= $form->field($model, 'cp_cp')->textInput() ?>

    <?= $form->field($model, 'cp_colonia')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
