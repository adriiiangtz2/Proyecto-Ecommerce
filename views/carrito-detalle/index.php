<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarritoDetalleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalles del carrito';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrito-detalle-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Añadir detalles al carrito', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Carrito Vista', ['carrito-detalle/carrito'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cardet_id',
            'cardet_cantidad',
            'cardet_precio',
            'cardet_valoracion',
            'cardet_comentario:ntext',
           // 'cardet_fkproducto',
            'productoNombre',
            'cardet_fkcarro',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<!---ASA-->
</div>
