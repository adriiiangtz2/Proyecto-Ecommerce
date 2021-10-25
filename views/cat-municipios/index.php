<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatMunicipiosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' Municipios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-municipios-index">


    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar Municipios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mun_id',
            'mun_fkestado',
            'mun_municipio',
            'estadoNombre',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>