<?php 

use yii\helpers\Html;
use app\models\CatFavorito;
use yii\widgets\LinkPager;

// $favoritos = CatFavorito::favorito();

?>
<div class="categories">
<h1><?=$usu->fav_fkusuario?> FK USUARIO</h1>
<h1><?=$usu->fav_fkproducto?> FK pRODUCTO</h1>
<h1><?=$usu->fav_estado?> ESTADO</h1>
<h1><?=$usu->nombreCompleto?></h1>


<h1>Productos Favoritos</h1>
<div class="small-container">
    <div class="filas">
        <!-- LLega del controlador $fav -->
    <?php foreach ($fav as $favoritos): ?>
        <div class="colum-4">
            <a href="product-datails.html"> <img src="/img/producto/<?=$favoritos->pro_imagen?>" class="logo"> </a>
            <h4><?=   html::encode("{$favoritos->pro_nombre}")      ?></h4>
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
            <p>$<?=   html::encode("{$favoritos->pro_precio}")?> </p>
            
        </div>
        <?php endforeach; ?>
        </div>
    </div>
   