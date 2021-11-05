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

<section id="contact-form-section" class="form-content-wrap">
    <div class="container">
        <div class="row">
            <div class="tab-content">
                <div class="col-sm-12">
                    <div class="item-wrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="item-content colBottomMargin">
                                    <div class="item-info">
                                        <div>
                                            <h1> Domicilio</h1>
                                        </div>
                                        <!--End item-info -->

                                    </div>
                                    <!--End item-content -->
                                </div>
                                <!--End col -->

                                <div class="Registrar-domicilio">

                                    <?php $form = ActiveForm::begin(); ?>
                                    <form id="contactForm" name="contactform" data-toggle="validator" class="popup-form">
                                        <div class="row">
                                            <div id="msgContactSubmit" class="hidden"></div>

                                            <div class="form-group col-sm-6">
                                                <div class="help-block with-errors"></div>
                                                <?= $form->field($model, 'dom_fkcp')->textInput(['id' => 'dom_cp']) ?>
                                                <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                                            </div><!-- end form-group -->


                                            <div class="form-group col-sm-6">
                                                <div class="help-block with-errors"></div>
                                                <?= $form->field($model, 'dom_colonia')->widget(DepDrop::classname(), [
                                                    'options' => ['id' => 'dom_colonia'],
                                                    'pluginOptions' => [
                                                        'depends' => ['dom_cp'],
                                                        'placeholder' => 'Selecciona la colonia',
                                                        'url' => Url::to(['/domicilio/cp'])
                                                    ]
                                                ]); ?>
                                                <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                                            </div><!-- end form-group -->

                                            <div class="form-group col-sm-6">
                                                <div class="help-block with-errors"></div>
                                                <?= $form->field($model, 'dom_ciudad')->textarea(['rows' => 6]) ?>
                                                <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                                            </div><!-- end form-group -->
                                            <div class="form-group col-sm-6">
                                                <div class="help-block with-errors"></div>
                                                <?= $form->field($model, 'dom_calle')->textarea(['rows' => 6]) ?>
                                                <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                                            </div><!-- end form-group -->

                                            <div class="form-group col-sm-6">
                                                <div class="help-block with-errors"></div>
                                                <?= $form->field($model, 'dom_numExt')->textInput(['maxlength' => true]) ?>

                                                <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                                            </div><!-- end form-group -->

                                            <div class="form-group col-sm-6">
                                                <div class="help-block with-errors"></div>
                                                <?= $form->field($model, 'dom_numInt')->textInput(['maxlength' => true]) ?>
                                                <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                                            </div><!-- end form-group -->

                                            <div class="form-group col-sm-6">
                                                <div class="help-block with-errors"></div>
                                                <?= $form->field($model, 'dom_telefono')->textInput(['maxlength' => true]) ?>
                                                <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                                            </div><!-- end form-group -->

                                        </div>
                                        <div class="form-group last col-sm-12">

                                            <div class="form-group">
                                                <?= Html::submitButton('guardar', ['class' => 'btn btnn']) ?>

                                            </div>
                                            <?php ActiveForm::end(); ?>
                                        </div>
                                </div>
                            </div><!-- end row -->
                            </form><!-- end form -->
                        </div>
                    </div>
                    <!--End row -->
                    <!-- Popup end -->
                </div><!-- end item-wrap -->
            </div>
            <!--End col -->
        </div>
        <!--End tab-content -->
    </div>
    <!--End row -->
    </div>
    <!--End container -->
</section>