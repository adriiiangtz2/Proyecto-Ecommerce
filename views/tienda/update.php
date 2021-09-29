<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tienda */

$this->title = 'Actualizar Tienda: ' . $model->tie_id;
$this->params['breadcrumbs'][] = ['label' => 'Tiendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tie_id, 'url' => ['view', 'id' => $model->tie_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tienda-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
