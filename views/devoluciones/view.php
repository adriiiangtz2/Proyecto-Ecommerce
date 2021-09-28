<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Devoluciones */

$this->title = $model->dev_id;
$this->params['breadcrumbs'][] = ['label' => 'Devoluciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="devoluciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->dev_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->dev_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro que quieres eliminar esta devolución?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'dev_id',
            'dev_comentario:ntext',
            'dev_estatus',
            'dev_fkcarritodetalle',
        ],
    ]) ?>

</div>
