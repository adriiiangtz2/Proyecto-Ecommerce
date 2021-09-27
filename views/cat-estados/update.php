<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatEstados */

$this->title = 'Modificar  Estados: ' . $model->est_id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Estados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->est_id, 'url' => ['view', 'id' => $model->est_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-estados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
