<?php

use yii\bootstrap4\Html;

?>
<!-- ----------------------------------------------------------- -->
<h3><b>TAMBIÉN PODRÍA INTERESARTE</b></h3>
<div class="small-container contenedor-producto-descuentos">
    <div class="filas">
        <?php foreach ($producto as $pro) :
            $descuento = $pro->pro_descuento;
            $precio   = $pro->pro_precio;
        ?>
            <div class="colum-4 columm4">
                <img src=<?= $pro->getUrl() ?> class="logo profile-link">

                <?php if (($descuento) > 0) {
                    $opera = (($precio) / 100) * $descuento;
                    $total = $precio - $opera;
                ?>
                    <p class="precio-favorito"><b>$</b><?= html::encode("{$precio}") ?></p>
                    <p class="total-favorito"><b>$</b><?= html::encode("{$total}") ?></p>
                    <p class="descuento-favorito"> %<?= $descuento ?></p>
                <?php  }  ?>
                <div class="contenedor-card-foter">
                    <p style="margin:0;"> <?= Html::encode("{$model->pro_nombre}")  ?></p>
                    <p style="margin:0;"> <?= Html::encode("{$model->pro_color}")   ?></p>
                    <?= Html::a('Ver más <i class="fas fa-caret-down"></i>', ['/producto/detalles', 'id' => $model->pro_id], ['class' => 'profile-link']) ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>