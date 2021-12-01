<?php 

use yii\helpers\Html;
$total=0;
$descuento =$productos->pro_descuento;
$precio =$productos->pro_precio;
$producto= \app\models\CatFavorito::producto();
?>

<h3><b>DETALLES DEL PRODUCTO</b></h3>
<div id="contenedor-detalles-producto<?=$productos->pro_id?>">
    <div class="small-container single-product">
        <div class="filas">
            <div class="colum-2">
                <img src=<?= $productos->getUrl() ?> width="100%" id="productImg">
                <!-- <img src="/plantilla/images/gallery-1.jpg" width="100%" id="productImg"> -->
                <div class="small-img-filas">
                    <div class="small-img-colum">
                        <img src="/plantilla/images/gallery-1.jpg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-colum">
                        <img src="/plantilla/images/gallery-2.jpg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-colum">
                        <img src="/plantilla/images/gallery-3.jpg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-colum">
                        <img src="/plantilla/images/gallery-4.jpg" width="100%" class="small-img">
                    </div>
                </div>

            </div>
            <div class="colum-2">
                <p>Home / Redstore</p>
                <h2 style="text-transform: uppercase;font-style: oblique;"><?= $productos->pro_nombre ?></h1>


                    <?php if(($descuento)>0){
                    $opera= (($precio)/100)*$descuento; 
                    $total= $precio-$opera;?>

                    <div class="row">
                        <div class="col-md-4">
                            <p><b> Precio original</b></p>
                            <P style="background: #e4e4e4;text-decoration-line: line-through;"><b>$</b><?= $precio ?>
                            </P>
                        </div>
                        <div class="col-md-4">
                            <p><b> Descuento</b></p>
                            <P style=" top: 6%;background: #fdaaaa;font-weight: 700;"><b>%</b><?= $descuento ?></P>
                        </div>
                        <div class="col-md-4">
                            <p><b> Precio Final</b></p>
                            <P style="background: antiquewhite;">
                                <b>$</b><?= html::encode(number_format($total, 2, '.', ',')) ?>
                            </P>

                        </div>
                    </div>



                    <?php  } else {  ?>
                    <div class="row">
                        <div class="col-md-4">
                            <p><b>Precio original</b></p>
                            <P style="background: #e4e4e4;line-through;"><b>$</b><?= $precio ?></P>
                        </div>
                    </div>
                    <p><b>Sin descuento</b></p>
                    <?php }?>

                    <h3>Detalles del producto <i class="" aria-hidden="true"></i></h3>
                    <br>
                    <p><?= $productos->pro_descripcion ?> </p>

                    <button onclick="agregarCarro(<?= $productos->pro_id?>)" class="boton-agregar-carrito">Agregar Al
                        carrito <i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
    </div>


    <div>
        <?= $this->render('/cat-favorito/prodescuento', compact('producto')) ?>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>