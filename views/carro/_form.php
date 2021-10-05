<?php

use app\models\Envio;
use yii\helpers\Html;
use app\models\Usuario;
use app\models\Domicilio;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use app\models\CatMetodopago;

/* @var $this yii\web\View */
/* @var $model app\models\Carro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carro-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'car_iva')->textInput(['maxlength' => true]) ?>
        </div>
        <? /* $form->field($model, 'car_fecha')->textInput()*/ ?>
        <div class="col-md-4">
            <?= $form->field($model, 'car_fecha')->widget(
                DatePicker::className(),
                [
                    'type' => DatePicker::TYPE_INPUT,
                    'value' => date('Y-m-d'),
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]
            );  ?>
        </div>
        
        <?php /*$form->field($model, 'car_fkusuario')->textInput()*/ ?>
        <div class="col-md-4">
            <?= $form->field($model, 'car_fkusuario')->widget(Select2::classname(), [
            'data' => Usuario::map(),
            'language' => 'es',
            'options' => ['placeholder' => 'Selecciona un usuario...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        </div>


        <? /* $form->field($model, 'car_fkmetodo')->textInput() */?>
        
        <div class="col-md-4">
            <?= $form->field($model, 'car_fkmetodo')->widget(Select2::classname(), [
            'data' => CatMetodopago::map(),
            'language' => 'es',
            'options' => ['placeholder' => 'Selecciona un metodo de pago...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        </div>

        <? /* $form->field($model, 'car_fkdomicilio')->textInput() */ ?>
        <div class="col-md-4">
            <?= $form->field($model, 'car_fkdomicilio')->widget(Select2::classname(), [
            'data' => Domicilio::map(),
            'language' => 'es',
            'options' => ['placeholder' => 'Selecciona un domicilio...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        </div>
        <? /* $form->field($model, 'car_fkenvio')->textInput() */ ?>

        <div class="col-md-4">
            <?= $form->field($model, 'car_fkenvio')->widget(Select2::classname(), [
            'data' => Envio::map(),
            'language' => 'es',
            'options' => ['placeholder' => 'Selecciona un método de envio...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'car_estatus')->dropDownList([ 'Apartado' => 'Apartado', 'Pagado' => 'Pagado', ], ['prompt' => '']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
