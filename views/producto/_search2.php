<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['producto/productos'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'pro_id') 
    ?>

    <?= $form->field($model, 'pro_nombre')
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

    <?= $form->field($model, 'pro_color')
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

    <?= $form->field($model, 'mayorPrecio') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Limpiar', ['productos','orden' => '0','producto' => '0'] , ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?= Html::a('Combinado', ['productos', 'orden'                 => '0']) ?>
    <?= Html::a('Ascendente', ['productos', 'orden'                 => '1']) ?>
    <?= Html::a('Descendente', ['productos', 'orden'               => '2']) ?>
    <?= Html::a('Todos los Precios', ['productos', 'producto'      => '0']) ?>
    <?php // Html::a('Hasta 500', ['productos', 'producto'         => '3']) ?>
    <?= Html::a('Más de 1000', ['productos', 'producto'            => '4']) ?>
</div>