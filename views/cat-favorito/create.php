<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatFavorito */

$this->title = 'Create Cat Favorito';
$this->params['breadcrumbs'][] = ['label' => 'Cat Favoritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-favorito-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        /* 'producto' => $producto, */
    ]) ?>

</div>