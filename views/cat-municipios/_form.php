<?php

use yii\helpers\Html;
use app\models\CatEstados;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatMunicipios */
/* @var $form yii\widgets\ActiveForm */
?>

<section id="contact-form-section">

    <div class="row">
        <div class="editar_form col-md-5 ">
            <div class="editar_logo">
                <i class="fas fa-flag-usa"></i>
            </div>
            <div class="registro_infor">
                <h1>Modulo para agregar Municipios</h1>
            </div>
        </div>
        <div class="col-md-7" style="border: 1px solid; padding: 37px; border-left: 2px solid white;">

            <?php $form = ActiveForm::begin(); ?>
            <div class="row ">
                <div class="col-md-12">
                    <?= $form->field($model, 'mun_fkestado')->widget(Select2::classname(), [
                        'data' => CatEstados::getMap4(),
                        'language' => 'es',
                        'options' => ['placeholder' => 'selecciona el estado ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]); ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'mun_municipio')->textInput(['maxlength' => true]) ?>

                </div>
                <div class="col-md-12" style="display: flex; justify-content: center;">
                    <?= Html::submitButton('guardar', ['class' => 'btnn']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</section>