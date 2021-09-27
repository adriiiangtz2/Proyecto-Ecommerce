<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CarritoDetalle */

$this->title = $model->cardet_id;
$this->params['breadcrumbs'][] = ['label' => 'Detalle del carro', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="carrito-detalle-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->cardet_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->cardet_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro que quieres borrar los cambios al carrito?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cardet_id',
            'cardet_cantidad',
            'cardet_precio',
            'cardet_valoracion',
            'cardet_comentario:ntext',
            'cardet_fkproducto',
            'cardet_fkcarro',
        ],
    ]) ?>

</div>
