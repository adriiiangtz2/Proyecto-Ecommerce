<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Descuento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="descuento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'des_inicio')->textInput() ?>

    <?= $form->field($model, 'des_fin')->textInput() ?>

    <?= $form->field($model, 'des_descuento')->textInput(['maxlength' => true]) ?>

    <?php /* $form->field($model, 'des_fkproducto')->textInput() */ ?>

    <?= $form->field($model, 'des_fkproducto')->widget(Select2::classname(), [
    'data' => $producto,
    'language' => 'es',
    'options' => ['placeholder' => 'Selecciona un producto ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
