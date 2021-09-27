<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Domicilio */

$this->title = $model->dom_id;
$this->params['breadcrumbs'][] = ['label' => 'Domicilios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="domicilio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->dom_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->dom_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'dom_id',
            'dom_ciudad:ntext',
            'dom_colonia:ntext',
            'dom_calle:ntext',
            'dom_numExt',
            'dom_numInt',
            'dom_telefono',
            'dom_fkusuario',
            'dom_fkcp',
        ],
    ]) ?>

</div>
