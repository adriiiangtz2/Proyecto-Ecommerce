<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Producto', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Vista de Productos', ['producto/productos'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'pro_id',
            'pro_nombre',
            'pro_precio',
            'pro_estrellas',
            'pro_fecha',
            'pro_descripcion:ntext',
            //'pro_dimensiones',
            //'pro_imagen',
            //'pro_estatus',
            [
                'attribute' => 'imagen',
                'format' => 'raw',
            ],
            //'pro_color',
            //'pro_fktipo',
            //'pro_fkmarca',
            //'pro_fktienda',
            'pro_descuento',
            //'marca',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>