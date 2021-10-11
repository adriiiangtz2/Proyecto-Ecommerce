<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Descuento */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="descuento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php /* $form->field($model, 'des_inicio')->textInput() */?>

    <?= $form->field($model, 'des_inicio')->widget
    (DatePicker::className(),[
    'name' => 'dp_1',
    'type' => DatePicker::TYPE_INPUT,
    'value' => '23-Feb-1982',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
]);?> 

    <?php /* $form->field($model, 'des_fin')->textInput()*/ ?>

    <?= $form->field($model, 'des_fin')->widget
    (DatePicker::className(),[
    'name' => 'dp_1',
    'type' => DatePicker::TYPE_INPUT,
    'value' => '23-Feb-1982',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
]);?> 

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
