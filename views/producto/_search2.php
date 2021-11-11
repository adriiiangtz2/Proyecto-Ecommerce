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

    <?php // $form->field($model, 'pro_id') 
    ?>

    <?php // $form->field($model, 'pro_nombre') 
    ?>

    <?php // $form->field($model, 'pro_precio') 
    ?>

    <?php // $form->field($model, 'pro_fecha') 
    ?>

    <?php // $form->field($model, 'pro_descripcion') 
    ?>

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

    <?= $form->field($model, 'marca') ?>

    <?= $form->field($model, 'tipo') ?>

    <?= $form->field($model, 'tienda') ?>

    <?= $form->field($model, 'menorPrecio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>