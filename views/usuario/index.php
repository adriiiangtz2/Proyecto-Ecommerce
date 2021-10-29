<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registrar Usuario', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Registrar Usuario 2', ['usuario/registrar-usuario'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usu_id',
            // tabla wevimar
            'userUsername',
            // tabla wevimar
            'userEmail',
            'usu_nombre',
            'usu_paterno',
            'usu_materno',
            'usu_fkuser',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
