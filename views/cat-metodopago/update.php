<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatMetodopago */

$this->title = 'Actualizar método de pago: ' . $model->met_id;
$this->params['breadcrumbs'][] = ['label' => 'Métodos de pago', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->met_id, 'url' => ['view', 'id' => $model->met_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cat-metodopago-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
