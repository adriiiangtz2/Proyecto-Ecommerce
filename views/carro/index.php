<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carro';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carro-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Carro', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Carrito Vista', ['carro/carrito'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'car_id',
            'car_iva',
            'car_fecha',
            'car_estatus',
            //'car_fkusuario',
            /* 'usuarioNombre', */
            'nombreCompleto',
            'metodoNombre',
            //'car_fkmetodo',
            'car_fkdomicilio',
            'envioMetodo',
            //'car_fkenvio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
