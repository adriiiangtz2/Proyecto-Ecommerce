<?php

use yii\bootstrap4\Html;
?>
<div class='col-md-4'>
    <?= Html::a(Html::img("/img/producto/{$model->pro_imagen}", ['class' => 'logo', 'style' => 'width: 100%;']), ['']) ?>
    <h4><?= Html::encode("{$model->pro_nombre}")  ?></h4>
    <?= $this->render('star', (['producto' => $model])) ?>
    <p>$<?= Html::encode("{$model->pro_precio}") ?> </p>

    <div id="identificador<?=$model->pro_id?>">
                        <!-- agrega el boton -->
    <!-- Llega la variable productos de btnprofav y se cambia a model  -->
     <?= $this->render('/cat-favorito/btnfavpro', ['productos'=>$model]) ?>
        </div>
</div>