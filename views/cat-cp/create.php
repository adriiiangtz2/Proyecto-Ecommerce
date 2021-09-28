<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatCp */

$this->title = 'Código postal';
$this->params['breadcrumbs'][] = ['label' => 'Crear código postal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-cp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
