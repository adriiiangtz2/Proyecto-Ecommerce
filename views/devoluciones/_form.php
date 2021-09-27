<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Devoluciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="devoluciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dev_comentario')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dev_estatus')->dropDownList([ 'Devuelto' => 'Devuelto', 'Garantía' => 'Garantía', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'dev_fkcarritodetalle')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
