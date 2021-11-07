<?php

use yii\helpers\Html;
use app\models\CatFavorito;
use yii\widgets\LinkPager;

// $favoritos = CatFavorito::favorito();
?>
<div class="" id="identificador">
    <h1>Productos Favoritos</h1>
    <div class="small-container">
        <div class="filas">
            <!-- LLega del controlador $fav -->
            <!-- funcion del modelo favorito -->
            <?php
        if (!empty(\app\models\CatFavorito::favorito())):
         foreach (\app\models\CatFavorito::favorito() as $favoritos): ?>
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
             <h2 >Los productos que agregues a tus Favoritos se guardarán aquí.</h2>
         </div>
 <?php  endif?>
        </div>
    </div>