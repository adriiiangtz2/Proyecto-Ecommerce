<?php

use yii\helpers\Html;
use app\models\Usuario;
use app\models\Producto;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatFavorito */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-favorito-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row offer justify-content-center ">
    <?php /* $form->field($model, 'fav_fkproducto')->textInput() */ ?>

    <?php /* $form->field($model, 'fav_fkusuario')->textInput() */ ?>
    <div class="col-md-4">
    <?= $form->field($model, 'fav_fkusuario')->widget(Select2::classname(), [
    'data' => Usuario::getMap2(),
    'language' => 'es',
    'options' => ['placeholder' => 'Selecciona el Usuario'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'fav_fkproducto')->widget(Select2::classname(), [
    'data' => Producto::getMap(),
    'language' => 'es',
    'options' => ['placeholder' => 'Selecciona el producto'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>

</div>


    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
