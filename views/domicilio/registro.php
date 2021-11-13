<?php

use yii\helpers\Url;
use app\models\Usuario;
//use kartik\select2\Select2;
use yii\bootstrap4\Html;
use kartik\depdrop\DepDrop;
use yii\bootstrap4\ActiveForm;
?>

<section id="contact-form-section">

    <div>
        <h3><b> AGREGAR UNA NUEVA DIRECCION </b></h3>
        <p style="color: white">Aqui se puede agregar la direccion</p>

    </div>

    <div class="row">
        <div class="col-md-5 " style="border: 1px solid ;   background-color:  #007185; border-right: 2px solid white;">
            <div style="FONT-SIZE: 294px;
    text-align: center;
    color: white;">
                <i class="fas fa-map-marked-alt"></i>
            </div>
            <div class="" style="text-align: center;
    color: white;">
                <h1>INFORMACION DE DIRECCIONES</h1>
            </div>
        </div>
        <div class="col-md-7" style="border: 1px solid; padding: 37px; border-left: 2px solid white;">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-6">
                    <p> <b><?= $form->field($domicilio, 'dom_fkcp')->textInput(['id' => 'dom_cp']) ?></b></p>
                </div>
                <div class="col-md-6">
                    <p> <b> <?= $form->field($domicilio, 'dom_colonia')->widget(DepDrop::classname(), [
                                'options' => ['id' => 'dom_colonia'],
                                'pluginOptions' => [
                                    'depends' => ['dom_cp'],
                                    'placeholder' => 'Selecciona la colonia',
                                    'url' => Url::to(['/domicilio/cp'])
                                ]
                            ]); ?>
                </div></b></p>
                <div class="col-md-12">
                    <p> <b> <?= $form->field($domicilio, 'dom_ciudad')->textInput(['rows' => 6]) ?></b></p>
                </div>
                <div class="col-md-12">
                    <p> <b> <?= $form->field($domicilio, 'dom_calle')->textInput(['rows' => 6]) ?></b></p>
                </div>
                <div class="col-md-4">
                    <p> <b> <?= $form->field($domicilio, 'dom_numExt')->textInput(['maxlength' => true]) ?></b></p>

                </div>
                <div class="col-md-4">
                    <p> <b> <?= $form->field($domicilio, 'dom_numInt')->textInput(['maxlength' => true]) ?></b></p>

                </div>
                <div class="col-md-4">
                    <p> <b> <?= $form->field($domicilio, 'dom_telefono')->textInput(['maxlength' => true]) ?></b></p>

                </div>
                <div class="col-md-12" style="display: flex; justify-content: center;">

                    <?= Html::submitButton('guardar', ['class' => '', 'style' => 'padding: 10px; border: 1px solid grey; border-radius: 14px;']) ?>
                    <a href="mostrar">
                    </a>
                </div>

            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>


</section>