<!-- // ! Vista principal  , datos llegan por  funcion line 7 -->
<?php
use yii\helpers\Html;
use app\models\CatTarjeta;
use yii\widgets\LinkPager;
use app\models\CatFavorito;
$total = 0;
/* // ? viene del modelo, funcion trae los datos con estatus 1 */
$favo= \app\models\CatFavorito::favorito();
$favo2= \app\models\CatFavorito::cuentas();
$producto= \app\models\CatFavorito::producto();
?>
<div id="identificador">
    <div class="row">
        <div class="col-md-10">
            <h3><b>MI LISTA DE DESEOS</b></h3>
            <!-- // TODO contador de las consultas  -->
            <p><?=count($favo)?> ARTÍCULOS</p>
            <div class="small-container">
                <div class="filas">
                    <!--   //TODO ------------Inicial el condicional principal ----------------------------->
                    <?php
            // si no viene nada manda al else
            if (!empty($favo)): 
                /*  // TODO --------- Inicia el ciclo --------------------------------- */
                foreach ($favo as $favoritos):
                    $descuento= $favoritos->favFkproducto->pro_descuento;
                    // $precio   = $favoritos->favFkproducto->pro_precio;?>
                    <!-- // *   #### inicia contenedor de los productos #####-- -->
                    <div id="contendor-fav<?=$favoritos->fav_id?>" class="colum-4 columm4">
                        <div id="lds-facebook_<?=$favoritos->fav_id?>" class="">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <!-- //! Boton que manda a vista de producto/detalles  -->
                        <!--  //TODO estructura de etiqueta (a) y dentro etiqueta (img)  -->
                        <?= Html::tag('a', Html::img($favoritos->favFkproducto->getUrl(),['class' => 'profile-link'] ), ['href'=>'/producto/detalles/'.$favoritos->fav_fkproducto],['class' => 'profile-link'] ); ?>
                        <div class="rating">
                            <!--  // ?-- apartado para estrellas -- -->
                        </div>
                        <!--  // TODO  incia la condicional interno ------- -->
                        <?php if(($descuento)>0){
                            // $opera= (($precio)/100)*$descuento; 
                            // $total= $precio-$opera;?>
                        <p class="precio-favorito"><b>$</b><?= html::encode("{$favo2->precio}") ?></p>
                        <p class="total-favorito"><b>$</b><?= html::encode(number_format($favo2->total, 2, '.', ',')) ?>
                        <p class="descuento-favorito"> %<?=$descuento?></p>

                        <?php  } else {  ?>
                        <p class="total-favorito"><b>$</b><?= html::encode("{$favo2->precio}") ?></p>
                        <!-- // TODO Termina el condicional interno ------- -->
                        <!--  // ! Inicia renderizado del boton -------------------- -->
                        <?php }?>
                        <!-- // ! Termina renderizado del boton ------------------- -->
                        <?= $this->render('/cat-favorito/btnfav', compact('favoritos')) ?>
                        <div class="contenedor-card-foter">
                            <p style="margin:0;"> <?=$favoritos->favFkproducto->pro_nombre?></p>
                            <p style="margin:0;"> <?=$favoritos->favFkproducto->pro_color?> </p>
                            <?= Html::a('Ver más <i class="fas fa-caret-down"></i>', ['/producto/detalles', 'id' => $favoritos->fav_fkproducto], ['class' => 'profile-link']) ?>
                        </div>
                        <!--  //* -#### Termina contenedor de los productos #####--  -->
                    </div>
                    <!-- // TODO --------- Termina el ciclo --------------------------------------- -->
                    <?php endforeach;
                        else: ?>
                    <div class="contendor-ningun-articulo">
                        <p>Aún no has añadido ningún artículo a tu lista de deseos. Comienza a comprar y añade tus
                            favoritos.</p>
                    </div>
                    <!-- //TODO Termina el condicional principal ----------------------------------------- -->
                    <?php  endif?>
                </div>
                <!-- // * ##### Termina contenedor principal ######  -->
            </div>
            <!-- ----------------------------------------------------------- -->

        </div>
        <div class="col-md-2"
            style="border: 4px dashed #d1d1d1;border-radius: 20px;padding: 15px;background: #0000004f;">
            <a href="">
                <p><b>¿NECESITAS AYUDA?</b></p>
            </a>
            <a href="">
                <p>Productos</br>
            </a>
            <a href=""> Pedidos y formas de pago</br></a>
            <a href=""> Entrega</br></a>
            <a href=""> Promociones y códigos descuento</br></a>
            <a href=""> Devoluciones y reembolsos</br></a>
            <a href=""> Cuentas y suscripciones</br></a>
            <a href=""> Información de la empresa</p></a>
        </div>
    </div>



    <!-- // * ########## Inicia contenedor principal ######### -->
    <!-- --------------------------------------------------------------------- -->
    <div>
        <?= $this->render('prodescuento', compact('producto')) ?>
    </div>
</div>