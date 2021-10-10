<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatImagen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-imagen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ima_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ima_fkproducto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
