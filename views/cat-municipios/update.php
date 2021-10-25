<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatMunicipios */

$this->title = 'Modificar Municipios: ' . $model->mun_id;
$this->params['breadcrumbs'][] = ['label' => 'Municipios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mun_id, 'url' => ['view', 'mun_id' => $model->mun_id, 'mun_fkestado' => $model->mun_fkestado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-municipios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>