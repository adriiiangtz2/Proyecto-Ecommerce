<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatTarjeta */

$this->title = 'Registre una nueva Tarjeta';
$this->params['breadcrumbs'][] = ['label' => 'Cat Tarjetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-tarjeta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
