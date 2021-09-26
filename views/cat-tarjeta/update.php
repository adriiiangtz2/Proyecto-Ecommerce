<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatTarjeta */

$this->title = 'Update Cat Tarjeta: ' . $model->tar_id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Tarjetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tar_id, 'url' => ['view', 'id' => $model->tar_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-tarjeta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
