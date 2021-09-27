<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatCpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Código postales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-cp-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear código postal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cp_id',
            //'cp_fkmunicipio',
            //'cp_fkestado',
            'cp_cp',
            'cp_colonia',
            'municipioNombre', //p3
            'estadoNombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
