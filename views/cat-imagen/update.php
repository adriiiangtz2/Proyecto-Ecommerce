<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatImagen */

$this->title = 'Update Cat Imagen: ' . $model->ima_id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Imagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ima_id, 'url' => ['view', 'ima_id' => $model->ima_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-imagen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
