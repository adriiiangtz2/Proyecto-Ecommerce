<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tienda */

$this->title = 'Crear Tienda';
$this->params['breadcrumbs'][] = ['label' => 'Tiendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tienda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
