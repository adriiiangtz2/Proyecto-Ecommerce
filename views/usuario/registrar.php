<!-- // ! Vista para registrar a un usuario no logeado -->
<!-- // ! Se utiliza en layout y se trae desde el widget Nav -->
<?php
use yii\helpers\Html;
use yii\widgets\MaskedInput;
use yii\bootstrap4\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>
<div class="row contenedor-registrar">
    <div class="col-md-5 contenedor-central-registrar">
        <div class="row texto-central-registrar">
            <!-- //*  INICIO  DE LOS FORMULARIOS -- -->
            <!-- // ! se cambian las varianles user y usuario que llegan del controler-- -->
            <div class="col-md-6">
                <p><b><?= $form->field($user, 'username')->textInput(['maxlength' => 255, 'autocomplete'=>'off']) ?></b>
                <p>
            </div>

            <div class="col-md-6">
                <p><b>
                        <?= $form->field($user, 'password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?></b>
                <p>
            </div>

            <div class="col-md-6">
                <p><b> <?= $form->field($user, 'email')->widget(MaskedInput::classname(), [
                                'clientOptions' => [
                                'alias' =>  'email'
                            ],
				])
                            ?></b>
                <p>
            </div>

            <div class="col-md-6">
                <p><b>
                        <?= $form->field($user, 'repeat_password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off','class'=>'color-texto-blanco']) ?></b>
                <p>
            </div>
            <!-- se toma del la vista fomulario.php y arriba de wevimark  -->
            <div class="col-md-4">
                <p><b> <?= $form->field($usuario, 'usu_nombre')->textInput(['maxlength' => true]) ?></b>
                <p>
            </div>

            <div class="col-md-4">
                <p><b> <?= $form->field($usuario, 'usu_paterno')->textInput(['maxlength' => true]) ?></b>
                <p>
            </div>
            <div class="col-md-4">
                <p><b><?= $form->field($usuario, 'usu_materno')->textInput(['maxlength' => true]) ?><p></b></p>
            </div>
            <!--  // *  FIN  DE LOS FORMULARIOS -- -->
        </div>
        <div class="row justify-content-center">
            <div>
                <?= Html::submitButton('Guardar', ['class' => 'btn-guardar']) ?>
            </div>
        </div>
    </div>

</div>
<?php ActiveForm::end(); ?>