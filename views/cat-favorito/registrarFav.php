<?php

use yii\helpers\Html;
use app\models\CatFavorito;
use yii\widgets\LinkPager;

// $favoritos = CatFavorito::favorito();
?>
<div class="" id="identificador">
<?= $this->render('/layouts/usuario/header') ?>
<h1>Productos Favoritos</h1>
<div class="small-container">
    <div class="filas">
        <!-- LLega del controlador $fav -->
        <!-- funcion del modelo favorito -->
    <?php foreach (\app\models\CatFavorito::favorito() as $favoritos): ?>
        <div class="colum-4">
            <a href="product-datails.html"> <img src=<?= $favoritos->favFkproducto->getUrl() ?> class="logo"> </a>
            <h4>
                <?= html::encode( "{$favoritos->favFkproducto->pro_nombre}" ) ?> </h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-half" aria-hidden="true"></i>
                <!-- <i class="fa fa-star-half-o" aria-hidden="true"></i>
                <i class="fa fa-address-book" aria-hidden="true"></i> -->

            </div>
            <p>$<?= html::encode(
                "{$favoritos->favFkproducto->pro_precio}"
                
                ) ?><?= $this->render('/cat-favorito/btnfav', compact('favoritos')) ?> </p>
            
        </div>
        <?php endforeach; ?>
        </div>
    </div>
    <?= $this->render('/layouts/footer') ?>