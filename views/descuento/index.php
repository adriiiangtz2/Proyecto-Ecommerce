<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DescuentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Descuentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="descuento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Descuento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'des_id',
            'des_inicio',
            'des_fin',
            'des_descuento',
            'des_fkproducto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
