<?php

use app\models\User;
use yii\helpers\Html;
use kartik\select2\Select2;

use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>
<div>
<div class="usuario-form">
    <?php $form = ActiveForm::begin(); ?>
    
<div class="row offer ">

        <div class="col-md-4">
        <?= $form->field($model, 'usu_nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
        <?= $form->field($model, 'usu_paterno')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
        <?= $form->field($model, 'usu_materno')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
        <?= $form->field($model, 'usu_fkuser')->textInput() ?>
      </div>
      </div>
        <div class="row justify-content-center">
            <div class="form-group ">
                <?= Html::submitButton('Guardar', ['class' => 'btnn']) ?>
            </div>

        </div>
        

    <?php ActiveForm::end(); ?>

</div>
</div>
