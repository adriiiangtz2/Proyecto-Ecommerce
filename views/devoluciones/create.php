<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Devoluciones */

$this->title ='Devoluciones';
$this->params['breadcrumbs'][] = ['label' => 'Crear devolución', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="devoluciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
