<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CatMunicipios */

$this->title = $model->mun_id;
$this->params['breadcrumbs'][] = ['label' => ' Municipios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cat-municipios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'mun_id' => $model->mun_id, 'mun_fkestado' => $model->mun_fkestado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'mun_id' => $model->mun_id, 'mun_fkestado' => $model->mun_fkestado], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro que desea eliminar est municipios?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'mun_id',
           // 'mun_fkestado',
            'mun_municipio',
            'EstadoNombre',
        ],
    ]) ?>

</div>
