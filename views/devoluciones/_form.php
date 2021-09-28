<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use app\models\CarritoDetalle;

/* @var $this yii\web\View */
/* @var $model app\models\Devoluciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="devoluciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dev_comentario')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dev_estatus')->dropDownList([ 'Devuelto' => 'Devuelto', 'Garantía' => 'Garantía', ], ['prompt' => '']) ?>

    <?// $form->field($model, 'dev_fkcarritodetalle')->textInput() ?>
                
    <?= $form->field($model, 'dev_fkcarritodetalle')->widget(Select2::classname(), [
    'data' => CarritoDetalle::map(),
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
