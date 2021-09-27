<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatMetodopagoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Métodos de pago';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-metodopago-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear método de pago', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'met_id',
            'met_nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
