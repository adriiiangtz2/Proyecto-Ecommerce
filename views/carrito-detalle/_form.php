<?php

use app\models\Carro;
use yii\helpers\Html;
use app\models\Producto;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CarritoDetalle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carrito-detalle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cardet_cantidad')->textInput() ?>

    <?= $form->field($model, 'cardet_precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cardet_valoracion')->textInput() ?>

    <?= $form->field($model, 'cardet_comentario')->textarea(['rows' => 6]) ?>

    <? /* $form->field($model, 'cardet_fkproducto')->textInput() */ ?>

    <?= $form->field($model, 'cardet_fkproducto')->widget(Select2::classname(), [
    'data' => Producto::map(),
    'language' => 'es',
    'options' => ['placeholder' => 'Selecciona un producto...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>

    <? /* $form->field($model, 'cardet_fkcarro')->textInput() */?>

    <?= $form->field($model, 'cardet_fkcarro')->widget(Select2::classname(), [
    'data' => Carro::map(),
    'language' => 'es',
    'options' => ['placeholder' => 'Carro final...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
