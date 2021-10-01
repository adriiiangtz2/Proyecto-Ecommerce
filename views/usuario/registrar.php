<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
?>
<!-- creamos esta vista una vez mandada en render -->
<div>
    <h1>Registrar Usuario</h1>
    
    <?php $form = ActiveForm::begin(); ?>
    <div class="registrar-usuario">
        <div class="row">

            <!-- se cambian las varianles user y usuario-->
            <div class="col-md-3">
                <?= $form->field($user, 'username')->textInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>   
            </div>
            <div class="col-md-3">
                <?= $form->field($user, 'password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?> 
            </div>
            <div class="col-md-3">
                <?= $form->field($user, 'repeat_password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>  
            </div>
            
             <!-- se toma del la vista fomulario.php y arriba de wevimark  -->
            <div class="col-md-3">
             <?= $form->field($usuario, 'usu_nombre')->textInput(['maxlength' => true]) ?>
             </div>
             <div class="col-md-3">
            <?= $form->field($usuario, 'usu_paterno')->textInput(['maxlength' => true]) ?>
             </div>
             <div class="col-md-3">
                 <?= $form->field($usuario, 'usu_materno')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
            
            <div class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            </div>
            
    <?php ActiveForm::end(); ?>
    
</div>

</div>

