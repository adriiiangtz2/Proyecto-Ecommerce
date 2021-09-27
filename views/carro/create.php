<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Carro */

$this->title = 'Crear Carro';
$this->params['breadcrumbs'][] = ['label' => 'Carro', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
