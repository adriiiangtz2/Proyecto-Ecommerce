<?php

use yii\helpers\Html;
use app\models\CatTarjeta;
use yii\widgets\LinkPager;
use app\models\CatFavorito;
$total = 0;
$favo= \app\models\CatFavorito::favorito();

// $favoritos = CatFavorito::favorito();
?>
<div class="" id="identificador">
    <h3><b>MI LISTA DE DESEOS</b></h3>
    <p><?=count($favo)?> ARTICULOS</p>
    <div class="small-container">
        <div class="filas">
            <!-- LLega del controlador $fav -->
            <!-- funcion del modelo favorito -->
            <?php
        if (!empty($favo)):
         foreach ($favo as $favoritos): ?>
         
                <div class="colum-4" style="position:relative;">
                <a href="product-datails.html"> <img src=<?= $favoritos->favFkproducto->getUrl() ?> class="logo"> </a>
                <h4>
                    <?= html::encode( "{$favoritos->favFkproducto->pro_nombre}" ) ?> 
                </h4>                    
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
                <p>$<?= html::encode("{$favoritos->favFkproducto->pro_precio}") ?>
                <?= $this->render('/cat-favorito/btnfav', compact('favoritos')) ?> </p>
            </div>
            <?php endforeach;
            
         else: ?>
         <div  style="height: 400px;display: flex;align-items: center;">
             <p>Aún no has añadido ningún artículo a tu lista de deseos. Comienza a comprar y añade tus favoritos.</p>
         </div>
 <?php  endif?>
        </div>
    </div>