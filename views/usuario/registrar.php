<!-- // ! Vista para registrar a un usuario no logeado -->
<!-- // ! Se utiliza en layout y se trae desde el widget Nav -->
<?php
use yii\helpers\Html;
use yii\widgets\MaskedInput;
use yii\bootstrap4\ActiveForm;
?>
<div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="account-page">
        <div class="contenedor-usu">
            <div class="filas">
                <div class="colum-2-usu">
                    <?= Html::img('/plantilla/images/image1.png',['style'=>'']) ?>
                </div>
                <div class="colum-3-usu">
                    <div class="form-container-usu">
                        <div class="">
                            <h3>Registrate</h3>
                        </div>
                        <div class="row">
                            <!-- //*  INICIO  DE LOS FORMULARIOS -- -->
                            <!-- // ! se cambian las varianles user y usuario que llegan del controler-- -->
                            <div class="col-md-6 ">
                                <?= $form->field($user, 'username')->textInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>
                            </div>

                            <div class="col-md-6">
                                <?= $form->field($user, 'password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>
                            </div>

                            <div class="col-md-6">
                                <?= $form->field($user, 'email')->widget(MaskedInput::classname(), [
                                'clientOptions' => [
                                'alias' =>  'email'
                            ],
				])
                            ?>
                            </div>

                            <div class="col-md-6">
                                <?= $form->field($user, 'repeat_password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>
                            </div>
                            <!-- se toma del la vista fomulario.php y arriba de wevimark  -->
                            <div class="col-md-4">
                                <?= $form->field($usuario, 'usu_nombre')->textInput(['maxlength' => true]) ?>
                            </div>

                            <div class="col-md-4">
                                <?= $form->field($usuario, 'usu_paterno')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($usuario, 'usu_materno')->textInput(['maxlength' => true]) ?>
                            </div>
                            <!--  // *  FIN  DE LOS FORMULARIOS -- -->
                        </div>
                        <div class="row justify-content-center">
                            <div>
                                <?= Html::submitButton('Guardar', ['class' => 'btnn']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>