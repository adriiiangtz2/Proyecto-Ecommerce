<?php

use yii\helpers\Url;
use app\models\CatCp;
use yii\helpers\Html;
use app\models\Usuario;
use app\models\CatEstados;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use app\models\CatMunicipios;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Domicilio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="domicilio-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

    <div class="col-md-3">
        <?= $form->field($model, 'dom_ciudad')->textarea(['rows' => 6]) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'dom_colonia')->widget(Select2::classname(), [
    'data' => CatMunicipios::map(),
    'language' => 'es',
    'options' => ['placeholder' => 'selecciona el municipio ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);?>
    </div>

    <div class="col-md-3">
        <?= $form->field($model, 'dom_calle')->textarea(['rows' => 6]) ?>

    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'dom_numExt')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-3">
        <?= $form->field($model, 'dom_numInt')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'dom_telefono')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-3">
         <?=$form->field($model, 'dom_fkusuario')->widget(Select2::classname(), [
    'data' => Usuario::map(),
    'language' => 'es',
    'options' => ['placeholder' => 'selecciona el usuario ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);?>
    </div>

    <div class="col-md-3">
        <?= $form->field($model, 'dom_fkcp')->textInput() ?>
    </div>
    </div>    
    <?/*= $form->field($model, 'dom_colonia')->widget(DepDrop::classname(), [
    'options'=>['est_id'=>'mun_fkestado','prompt' =>'selecciona el municipio....', ],
    'pluginOptions'=>[
        'depends'=>['mun_fkestado'],
        'placeholder'=>'Selecciona el municipio',
        'url'=>Url::to(['domicilio/subcat'])
    ]
]);*/?>
    <?php /*$form->field($model, 'dom_fkusuario')->textInput()*/ ?>
    <div class="form-group">
        <?= Html::submitButton('guardar', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
