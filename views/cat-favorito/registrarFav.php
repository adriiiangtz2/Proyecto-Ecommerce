<?php
use yii\helpers\Html;
use app\models\CatTarjeta;
use yii\widgets\LinkPager;
use app\models\CatFavorito;
$total = 0;
//viene del modelo, funcion trae los datos con estatus 1
$favo= \app\models\CatFavorito::favorito();
?>
<!--  ######### Inicia contenedor principal ##########-->
<div id="identificador">
    <h3><b>MI LISTA DE DESEOS</b></h3>
    <!-- contador de las consultas -->
    <p><?=count($favo)?> ARTICULOS</p>
    <div class="small-container">
        <div class="filas">
            <!------------------ Inicial el condicional principal--------------->
            <?php
            // si no viene nada se manda al else de la 49
            if (!empty($favo)): 
                // --------------   Inicia el ciclo -------------
                foreach ($favo as $favoritos):
                    $descuento= $favoritos->favFkproducto->pro_descuento;
                    $precio   = $favoritos->favFkproducto->pro_precio;?>
                    <!--#### inicia contenedor de los productos #####-->
                    <div id="contendor-fav<?=$favoritos->fav_id?>" class="colum-4 columm4">
                        <!-- preloader oculto -->
                        <div id ="lds-facebook_<?=$favoritos->fav_id?>" class=""><div></div><div></div><div></div></div>
                        <a href="product-datails.html"> <img src=<?= $favoritos->favFkproducto->getUrl() ?> class="logo"> </a>                   
                        <div class="rating">
                            <!-- estrellas -->
                        </div>
                        <p style="margin:0;" > <?=$favoritos->favFkproducto->pro_nombre?></p>
                        <!------- incia la condicional interno ------->
                        <?php if(($descuento)>0){
                            $opera= (($precio)/100)*$descuento; 
                            $total= $precio-$opera;?>
                            <p class="precio-favorito"><b>$</b><?= html::encode("{$precio}") ?></p>
                            <p class="total-favorito"><b>$</b><?= html::encode("{$total}") ?></p>
                            <p class="descuento-favorito"> %<?=$descuento?></p>  
                            
                            <?php  } else {  ?>
                                <p class="total-favorito"><b>$</b><?= html::encode("{$precio}") ?></p>
                                <!------- Termina la condicional interno ------->
                                <?php }?>
                                <!-- se renderiza el boton -->
                                <?= $this->render('/cat-favorito/btnfav', compact('favoritos')) ?> 
                                <p style="margin:0;" > <?=$favoritos->favFkproducto->pro_color?>  </p>
                                <!--#### Termina contenedor de los productos #####-->  
                            </div>
                            <!---------------- Termina el ciclo --------------->
                            <?php endforeach;
                        else: ?>
                        <div class="contendor-ningun-articulo">
                        <p>Aún no has añadido ningún artículo a tu lista de deseos. Comienza a comprar y añade tus favoritos.</p>
                    </div>
                    <!------------------ Termina el condicional principal--------------->
                    <?php  endif?>
                </div>
                <!--  ######### Termina contenedor principal ##########-->
            </div>