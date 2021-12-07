<?php

use yii\helpers\Html;

$total = 0;
?>

<div id="contendor-fav<?= $productos->pro_id ?>" class="colum-4 columm4">
    <div id="lds-facebook_<?= $productos->pro_id ?>" class="">
        <?= Html::a(Html::img("/img/producto/{$model->pro_imagen}", ['class' => 'logo', 'style' => 'width: 122%;']), ['']) ?>
    </div>
    <!-- //!BOTON QUE MANDA A VISTA DE PRODUCTOS/DETALLES -->
    <!-- //TODO ESTRUCTURA DE ETIQUETA (a) y dentro etiqueta (img) -->

    <!-- // TODO INICIA LA CONDICIONAL INTERNO -->

    <?php if (($descuento) > 0) {
        $opera = (($precio) / 100) * $descuento;
        $total = $precio - $opera; ?>
        <p class="precio-favorito"><b>$</b><?= html::encode("{$precio}") ?></p>
        <p class="total-favorito"><b>$</b><?= html::encode("{$total}") ?></p>
        <p class="descuento-favorito"> %<?= $descuento ?></p>
    <?php } else { ?>
        <p class="total-favorito"><b>$</b><?= html::encode("{$precio}") ?></p>
    <?php } ?>

    <!-- // TODO TERMINA EL CONDICIONAL INTERNO -->

    <!-- //!INICIA EL RENDERIZADO DEL BOTON -->
    <div id="identificador<?= $model->pro_id ?>">
        <!-- Llega la variable productos de btnprofav y se cambia a model -->
        <?= $this->render('/cat-favorito/btnfavpro', ['productos' => $model]) ?>
    </div>
    <!-- //!TERMINA EL RENDERIZADO DEL BOTON -->

    <div class="contenedor-card-foter">
        <p style="margin:0;"><?= Html::encode("{$model->pro_nombre}") ?></p>
        <p style="margin:0;"><?= Html::encode("{$model->pro_color}")  ?></p>
        <p style="margin:0;"><?= Html::encode("{$model->pro_precio}") ?></p>
        <?= Html::a('Ver más <i class="fas fa-caret-down"></i>', ['/producto/detalles', 'id' => $model->pro_id], ['class' => 'profile-link']) ?>
    </div>
    <!-- //? INICIA APARTADO PARA ESTRELLAS -->
    <div class="rating">
        <p style="margin:0;"><?= $this->render('star', (['producto' => $model])) ?></p>
    </div>
</div>