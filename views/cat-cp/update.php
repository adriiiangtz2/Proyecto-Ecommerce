<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatCp */

$this->title = 'Actualizar código postal: ' . $model->cp_id;
$this->params['breadcrumbs'][] = ['label' => 'Código postal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cp_id, 'url' => ['view', 'id' => $model->cp_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cat-cp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
