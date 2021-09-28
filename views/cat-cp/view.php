<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CatCp */

$this->title = $model->cp_id;
$this->params['breadcrumbs'][] = ['label' => 'Código postales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cat-cp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->cp_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->cp_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro que quieres eliminar este código postal?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cp_id',
            'cp_fkmunicipio',
            'cp_fkestado',
            'cp_cp',
            'cp_colonia',
        ],

        
    ]) ?>
    

</div>
