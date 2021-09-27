<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CarritoDetalle */

$this->title = 'Actualizar detalles del carrito: ' . $model->cardet_id;
$this->params['breadcrumbs'][] = ['label' => 'Detalles del carrito', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cardet_id, 'url' => ['view', 'id' => $model->cardet_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="carrito-detalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
