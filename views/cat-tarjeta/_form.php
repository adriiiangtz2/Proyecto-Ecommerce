<?php

use yii\helpers\Html;
use app\models\Usuario;
use app\models\CatTarjeta;
use kartik\select2\Select2;
use kartik\widgets\DatePicker;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatTarjeta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-tarjeta-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row offer justify-content-center">
        <div class="col-md-4">
            <?= $form->field($model, 'tar_numtarjeta')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'tar_nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'tar_expiracion')->widget(
                DatePicker::className(),
                [
                    'type' => DatePicker::TYPE_INPUT,
                    'value' => date('Y-m'),
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'mm/yy'
                    ]
                ]
            );  ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'tar_financiera')->dropDownList([ 'Mastercard' => 'Mastercard', 'Visa' => 'Visa', 'American Express' => 'American Express', ], ['prompt' => '']) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'tar_tipo')->dropDownList([ 'Debito' => 'Debito', 'Credito' => 'Credito', 'Monedero' => 'Monedero', ], ['prompt' => '']) ?>
        </div>
        <?php /* $form->field($model, 'tar_fkusuario')->textInput() */ ?>

        <div class="col-md-4">
            <?= $form->field($model, 'tar_fkusuario')->widget(Select2::classname(), [
                    'data' =>Usuario::getMap2(),
                    'language' => 'es',
                    'options' => ['placeholder' => 'Selecciona el Usuario'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                    ]);?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btnn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>