<?php

use yii\helpers\Html;
use app\models\Tienda;
use app\models\CatTipo;
use app\models\CatMarca;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pro_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_fecha')->textInput() ?>

    <?= $form->field($model, 'pro_descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pro_dimensiones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_estatus')->dropDownList(['Agotado' => 'Agotado', 'Disponible' => 'Disponible',], ['prompt' => '']) ?>

    <?= $form->field($model, 'pro_color')->textInput(['maxlength' => true]) ?>

    <?php /*$form->field($model, 'pro_fktipo')->textInput()*/ ?>

    <?php /*$form->field($model, 'pro_fkmarca')->textInput()*/ ?>

    <?= $form->field($model, 'pro_fkmarca')->widget(Select2::classname(), [
        'data' => CatMarca::getmap(),
        'language' => 'es-ES',
        'options' => ['placeholder' => 'Selecciona un Tipo ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php /*$form->field($model, 'pro_fktienda')->textInput()*/ ?>
    <?php /*Nueva modificación*/ ?>

    <?= $form->field($model, 'pro_fktienda')->widget(Select2::classname(), [
        'data' => Tienda::map(),
        'language' => 'es-ES',
        'options' => ['placeholder' => 'Selecciona un Tipo ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <?= $form->field($model, 'pro_fktipo')->widget(Select2::classname(), [
        'data' => CatTipo::getmap(),
        'language' => 'es-ES',
        'options' => ['placeholder' => 'Selecciona un Tipo ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>