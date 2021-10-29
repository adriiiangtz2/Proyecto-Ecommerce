<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatFavoritoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* hola */
$this->title = 'Cat Favoritos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-favorito-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cat Favorito', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Vista Favorito', ['cat-favorito/favorito'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Vista Boton', ['cat-favorito/boton'], ['class' => 'btn btn-success']) ?>
        
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fav_id',
            'fav_fkproducto',
            'productoNombre',
            'fav_fkusuario',
            // Nombre de get function de favorito
            'nombreCompleto',
            'fav_estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
