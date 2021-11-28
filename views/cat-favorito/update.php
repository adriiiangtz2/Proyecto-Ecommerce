<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatFavorito */

$this->title = 'Update Cat Favorito: ' . $model->fav_id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Favoritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fav_id, 'url' => ['view', 'id' => $model->fav_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-favorito-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>