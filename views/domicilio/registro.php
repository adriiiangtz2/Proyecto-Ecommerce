<?php

use yii\helpers\Url;
use app\models\Usuario;
//use kartik\select2\Select2;
use yii\bootstrap4\Html;
use kartik\depdrop\DepDrop;
use yii\bootstrap4\ActiveForm;
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Domicilio</title>
    <!-- set your website meta description and keywords -->
    <meta name="description" content="Add your business website description here">
    <meta name="keywords" content="Add your business website keywords here">

</head>

<body>
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
                                                    <?= $form->field($domicilio, 'dom_fkcp')->textInput(['id' => 'dom_cp']) ?>
                                                    <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                                                </div><!-- end form-group -->


                                                <div class="form-group col-sm-6">
                                                    <div class="help-block with-errors"></div>
                                                    <?= $form->field($domicilio, 'dom_colonia')->widget(DepDrop::classname(), [
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
                                                    <?= $form->field($domicilio, 'dom_ciudad')->textarea(['rows' => 6]) ?>
                                                    <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                                                </div><!-- end form-group -->
                                                <div class="form-group col-sm-6">
                                                    <div class="help-block with-errors"></div>
                                                    <?= $form->field($domicilio, 'dom_calle')->textarea(['rows' => 6]) ?>
                                                    <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                                                </div><!-- end form-group -->

                                                <div class="form-group col-sm-6">
                                                    <div class="help-block with-errors"></div>
                                                    <?= $form->field($domicilio, 'dom_numExt')->textInput(['maxlength' => true]) ?>

                                                    <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                                                </div><!-- end form-group -->

                                                <div class="form-group col-sm-6">
                                                    <div class="help-block with-errors"></div>
                                                    <?= $form->field($domicilio, 'dom_numInt')->textInput(['maxlength' => true]) ?>
                                                    <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                                                </div><!-- end form-group -->

                                                <div class="form-group col-sm-6">
                                                    <div class="help-block with-errors"></div>
                                                    <?= $form->field($domicilio, 'dom_telefono')->textInput(['maxlength' => true]) ?>
                                                    <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                                                </div><!-- end form-group -->

                                            </div>
                                            <div class="form-group last col-sm-12">

                                                <div class="form-group">
                                                    <a href="mostrar">
                                                        <?= Html::submitButton('guardar', ['class' => 'btn btnn']) ?>
                                                    </a>
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


    <!-- jQuery Library -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap Js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Form Validator -->
    <script src="js/validator.min.js"></script>
    <!-- Contact Form Js -->
    <script src="js/contact-form.js"></script>


</body>

</html>