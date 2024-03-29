<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TiendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tiendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tienda-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Tienda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tie_id',
            'tie_nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
