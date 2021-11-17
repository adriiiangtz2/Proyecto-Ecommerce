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
        <h3><b> AGREGAR UNA NUEVA DIRECCIÓN </b></h3>
        <p style="color: white">Aquí se puede agregar la dirección</p>

    </div>

    <div class="row">
        <div class="editar_form col-md-5 ">
            <div class="editar_logo">
                <i class="fas fa-map-marked-alt"></i>
            </div>
            <div class="registro_infor">
                <h1>INFORMACIÓN DE DIRECCIONES</h1>
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

                </div>

            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>


</section>