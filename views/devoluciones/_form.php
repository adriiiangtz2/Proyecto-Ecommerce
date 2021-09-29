<?php

use yii\bootstrap4\Html;
use kartik\select2\Select2;
use app\models\CarritoDetalle;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Devoluciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="devoluciones-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <div class= col-md-5>
            <?= $form->field($model, 'dev_comentario')->textarea(['rows' => 6]) ?>
        </div>

        <div class= col-md-3>

            <?= $form->field($model, 'dev_estatus')->dropDownList([ 'Devuelto' => 'Devuelto', 'Garantía' => 'Garantía', ], ['prompt' => '']) ?>

            <?= $form->field($model, 'dev_fkcarritodetalle')->widget(Select2::classname(), 
                [
                    'data' => CarritoDetalle::map(),
                    'language' => 'es',
                    'options' => ['placeholder' => 'Carro final...'],
                    'pluginOptions' => 
                    [
                        'allowClear' => true
                    ],
                ]); 
            ?>

        </div>

    </div>       

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
