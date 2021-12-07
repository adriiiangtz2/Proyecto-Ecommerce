<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'pro_id') ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'pro_nombre') ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'pro_precio') ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'pro_fecha') ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'pro_descripcion') ?>
        </div>
    </div>

    <?php // echo $form->field($model, 'pro_dimensiones') 
    ?>

    <?php // echo $form->field($model, 'pro_imagen') 
    ?>

    <?php // echo $form->field($model, 'pro_estatus') 
    ?>

    <?php // echo $form->field($model, 'pro_color') 
    ?>

    <?php // echo $form->field($model, 'pro_fktipo') 
    ?>

    <?php // echo $form->field($model, 'pro_fkmarca') 
    ?>

    <?php // echo $form->field($model, 'pro_fktienda') 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>