<?php

use app\models\Usuario;
use yii\bootstrap4\Html;
//use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;


?>
<div>
    <h1> Registrar Domicilio</h1>

    <div class="Registrar-domicilio">


    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($user, 'username')->textInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>
        </div>

         <div class="col-md-3">
            	<?= $form->field($user, 'password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>
        </div>

         <div class="col-md-3">
             	<?= $form->field($user, 'repeat_password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>            
        </div>

         <div class="col-md-3">
            	<?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>
        </div>

         <div class="col-md-3">
                <?= $form->field($domicilio, 'dom_ciudad')->textarea(['rows' => 6]) ?>
        </div>

         <div class="col-md-3">
                <?= $form->field($domicilio, 'dom_colonia')->textarea(['rows' => 6]) ?>
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
         <div class="col-md-3">
                <?= $form->field($domicilio, 'dom_fkcp')->textInput() ?>

        </div>
	<?php //= $form->field($user, 'email_confirmed')->checkbox() ?>
    <?php /*$form->field($model, 'dom_fkusuario')->textInput()*/ ?>
    


    </div>

    <div class="form-group" >
        <?= Html::submitButton('guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div >



