<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Envio */

$this->title = 'Actualizar envio: ' . $model->env_id;
$this->params['breadcrumbs'][] = ['label' => 'Envios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->env_id, 'url' => ['view', 'id' => $model->env_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="envio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
