<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Usuario;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\CatTarjeta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-tarjeta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tar_numtarjeta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tar_expiracion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tar_financiera')->dropDownList([ 'Mastercard' => 'Mastercard', 'Visa' => 'Visa', 'American Express' => 'American Express', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'tar_tipo')->dropDownList([ 'Debito' => 'Debito', 'Credito' => 'Credito', 'Monedero' => 'Monedero', ], ['prompt' => '']) ?>

    <?php /* $form->field($model, 'tar_fkusuario')->textInput() */ ?>
  
  <?= $form->field($model, 'tar_fkusuario')->widget(Select2::classname(), [
    'data' => Usuario::getMap3(),
    'language' => 'es',
    'options' => ['placeholder' => 'Selecciona el Usuario'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>



    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
