<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Envio */

$this->title = 'Envio';
$this->params['breadcrumbs'][] = ['label' => 'Crear envio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="envio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
