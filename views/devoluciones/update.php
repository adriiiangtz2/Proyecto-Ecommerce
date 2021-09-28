<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Devoluciones */

$this->title = 'Actualizar devolución: ' . $model->dev_id;
$this->params['breadcrumbs'][] = ['label' => 'Devoluciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dev_id, 'url' => ['view', 'id' => $model->dev_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="devoluciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
