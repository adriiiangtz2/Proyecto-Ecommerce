<?php

use yii\helpers\Html;
use app\models\Producto;
use yii\widgets\LinkPager;
use kartik\rating\StarRating;

?>
<!-- tittle -->
<div class="small-container">

    <div class="row row-2">
        <h2>Todos Los Productos</h2>
        <select>
            <option>Mujeres</option>
            <option>Hombres</option>
            <option>Niños</option>
            <option>Niñas</option>
            <option>Bebés</option>
        </select>
    </div>

    <div class="categories">
        <h1>Productos</h1>
        <div class="small-container">
            <div class="filas">
                <?php foreach ($producto as $productos) : ?>
                    <div class="colum-4">
                        <a href="product-datails.html"> <img src="/img/producto/<?= $productos->pro_imagen ?>" class="logo"> </a>
                        <h4><?= html::encode("{$productos->pro_nombre}")      ?></h4>
                        <div class="rating">
                            <?php
                            echo StarRating::widget([
                                'name' => 'rating_44',
                                'pluginOptions' => [
                                    'theme' => 'krajee-svg',
                                    'filledStar' => '<span class="krajee-icon krajee-icon-star"></span>',
                                    'emptyStar' => '<span class="krajee-icon krajee-icon-star"></span>'
                                ]
                            ]);
                            ?>
                        
                        <!--<i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-half" aria-hidden="true"></i> -->
                            <!-- <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    <i class="fa fa-address-book" aria-hidden="true"></i> -->

                        </div>
                        <p>$<?= html::encode("{$productos->pro_precio}") ?> </p>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>
        </div>