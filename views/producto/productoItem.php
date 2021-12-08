<?php

use yii\helpers\Html;

$total = 0;
$prod = \app\models\Producto::producto();
// $prod2 = \app\models\Producto::cuentas();
$producto = \app\models\Producto::producto();
$model->cuentas;
// echo '<pre>';
// var_dump($model->descuento);
// var_dump($model->precio);
// var_dump($model->opera);
// var_dump($model);
// echo '</pre>';
// die;
?>

<div id="contendor-fav<?= $productos->pro_id ?>" class="colum-4 columm4">
    <div id="lds-facebook_<?= $productos->pro_id ?>" class="">
        <?= Html::a(Html::img("/img/producto/{$model->pro_imagen}", ['class' => 'logo', 'style' => 'width: 122%;']), ['']) ?>
    </div>
    <!-- //!BOTON QUE MANDA A VISTA DE PRODUCTOS/DETALLES -->
    <!-- //TODO ESTRUCTURA DE ETIQUETA (a) y dentro etiqueta (img) -->

    <!--  // TODO  incia la condicional interno ------- -->
    <?php if (($model->descuento) > 0) {
        // $opera= (($precio)/100)*$descuento; 
        // $total= $precio-$opera;
    ?>
        <p class="precio-favorito"><b>$</b><?= html::encode("{$model->precio}") ?></p>
        <p class="total-favorito"><b>$</b><?= html::encode(number_format($model->total, 2, '.', ',')) ?>
        <p class="descuento-favorito"> %<?= $model->descuento ?></p>

    <?php  } else {  ?>
        <p class="total-favorito"><b>$</b><?= html::encode("{$model->total}") ?></p>
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