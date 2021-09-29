<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* xd @var $model app\models\Descuento */


$this->title = $model->des_id;
$this->params['breadcrumbs'][] = ['label' => 'Descuentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="descuento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->des_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->des_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro que quieres eliminar este descuento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'des_id',
            'des_inicio',
            'des_fin',
            'des_descuento',
            'des_fkproducto',
        ],
    ]) ?>

</div>
