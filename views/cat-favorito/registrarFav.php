// ! Vista principal  , datos llegan por  funcion line 7
<?php
use yii\helpers\Html;
use app\models\CatFavorito;
$total = 0;
// ? viene del modelo, funcion trae los datos con estatus 1
$favo= \app\models\CatFavorito::favorito();
?>

// * ########## Inicia contenedor principal #########
<div id="identificador">
    <h3><b>MI LISTA DE DESEOS</b></h3>
    // TODO contador de las consultas 
    <p><?=count($favo)?> ARTICULOS</p>
    <div class="small-container">
        <div class="filas"></div>    
        //TODO ------------Inicial el condicional principal ------------------------------->
            <?php
            // si no viene nada manda al else
            if (!empty($favo)): 
                // TODO --------- Inicia el ciclo ------------------------------------>
                foreach ($favo as $favoritos):
                    $descuento= $favoritos->favFkproducto->pro_descuento;
                    $precio   = $favoritos->favFkproducto->pro_precio;?>
            // *   #### inicia contenedor de los productos #####-->
            <div id="contendor-fav<?=$favoritos->fav_id?>" class="colum-4 columm4">    
            <!-- preloader oculto -->
                <div id="lds-facebook_<?=$favoritos->fav_id?>" class="">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                //! Boton que manda a vista de producto/detalles 
                //TODO estructura de etiqueta (a) y dentro etiqueta (img) 
                <?= Html::tag('a', Html::img($favoritos->favFkproducto->getUrl(),['class' => 'profile-link'] ), ['href'=>'/producto/detalles/'.$favoritos->fav_fkproducto],['class' => 'profile-link'] ); ?>
                <?= Html::a('Detalles', ['/producto/detalles', 'id' => $favoritos->fav_fkproducto], ['class' => 'profile-link']) ?>
                <div class="rating">
                    // ?-- apartado para estrellas -->
                </div>
                <p style="margin:0;"> <?=$favoritos->favFkproducto->pro_nombre?></p>
                // TODO  incia la condicional interno ------->
                <?php if(($descuento)>0){
                            $opera= (($precio)/100)*$descuento; 
                            $total= $precio-$opera;?>
                <p class="precio-favorito"><b>$</b><?= html::encode("{$precio}") ?></p>
                <p class="total-favorito"><b>$</b><?= html::encode("{$total}") ?></p>
                <p class="descuento-favorito"> %<?=$descuento?></p>
                <?php  } else {  ?>
                <p class="total-favorito"><b>$</b><?= html::encode("{$precio}") ?></p>
                <?php }?>
                // TODO Termina el condicional interno ------->
                // ! Inicia renderizado del boton -------------------->
                <?= $this->render('/cat-favorito/btnfav', compact('favoritos')) ?>
                // ! Termina renderizado del boton ------------------->
                <p style="margin:0;"> <?=$favoritos->favFkproducto->pro_color?> </p>
                //* -#### Termina contenedor de los productos #####-->
            </div>
            // TODO --------- Termina el ciclo --------------------------------------->
            <?php endforeach;
                        else: ?>
            <div class="contendor-ningun-articulo">
                <p>Aún no has añadido ningún artículo a tu lista de deseos. Comienza a comprar y añade tus favoritos.
                </p>
            </div>
            <?php  endif ?>       
            //TODO Termina el condicional principal ----------------------------------------->
        </div>
    </div>
    // * ##### Termina contenedor principal ###### 