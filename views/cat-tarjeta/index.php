<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CatTarjetaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Registro de  Tarjetas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-tarjeta-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Registrar Nueva Tarjeta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tar_id',
            'tar_numtarjeta',
            'tar_expiracion',
            'tar_financiera',
            'tar_tipo',
            'tar_nombre',
            // 'usuarioNombre',
            // Nombre de get function de CatTarjeta
            'nombreCompleto',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>