<?php

use yii\helpers\Url;
use app\models\Usuario;
//use kartik\select2\Select2;
use yii\bootstrap4\Html;
use kartik\depdrop\DepDrop;
use yii\bootstrap4\ActiveForm;
?>
<div>
    <h1> Registrar Domicilio</h1>

    <div class="Registrar-domicilio">

        <?php $form = ActiveForm::begin(); ?>
        <div class="row offer">
            <div class="col-md-3">
                <?= $form->field($domicilio, 'dom_fkcp')->textInput(['id' => 'dom_cp']) ?>
            </div>

            <div class="col-md-3">
                <?= $form->field($domicilio, 'dom_colonia')->widget(DepDrop::classname(), [
                    'options' => ['id' => 'dom_colonia'],
                    'pluginOptions' => [
                        'depends' => ['dom_cp'],
                        'placeholder' => 'Selecciona la colonia',
                        'url' => Url::to(['/domicilio/cp'])
                    ]
                ]); ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($domicilio, 'dom_ciudad')->textarea(['rows' => 6]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($domicilio, 'dom_calle')->textarea(['rows' => 6]) ?>
            </div>

            <div class="col-md-3">
                <?= $form->field($domicilio, 'dom_numExt')->textInput(['maxlength' => true]) ?>

            </div>

            <div class="col-md-3">
                <?= $form->field($domicilio, 'dom_numInt')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-3">
                <?= $form->field($domicilio, 'dom_telefono')->textInput(['maxlength' => true]) ?>
            </div>

        </div>
        <div class="row justify-content-center">

            <div class="form-group">
                <?= Html::submitButton('guardar', ['class' => 'btn btnn']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>