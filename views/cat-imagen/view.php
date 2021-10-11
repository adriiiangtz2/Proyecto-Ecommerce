<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CatImagen */

$this->title = $model->ima_id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Imagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cat-imagen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ima_id' => $model->ima_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ima_id' => $model->ima_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ima_id',
            'ima_url:url',
            'ima_fkproducto',
        ],
    ]) ?>

</div>
