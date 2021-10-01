<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
$botones =[
    (object)['nombre'=>'Usuario'        ,'url'=>'/usuario'          ,'img'=>'Usuario'],
    (object)['nombre'=>'Tarjetas'       ,'url'=>'/cat-tarjeta'      ,'img'=>'Tarjetas'],
    (object)['nombre'=>'Favoritos'      ,'url'=>'/cat-favorito'     ,'img'=>'Favoritos'],
    (object)['nombre'=>'Productos'      ,'url'=>'/producto'         ,'img'=>'Productos'],
    (object)['nombre'=>'Tienda'         ,'url'=>'/tienda'           ,'img'=>'Tienda'],
    (object)['nombre'=>'Marcas'         ,'url'=>'/cat-marca'        ,'img'=>'Marcas'],
    (object)['nombre'=>'Tipos'          ,'url'=>'/cat-tipo'         ,'img'=>'Tipos'],
    (object)['nombre'=>'Descuentos'     ,'url'=>'/descuento'        ,'img'=>'Descuentos'],
    (object)['nombre'=>'Carrito Detalle','url'=>'/carrito-detalle'  ,'img'=>'Carrito Detalle'],
    (object)['nombre'=>'Devoluciones'   ,'url'=>'/devoluciones'     ,'img'=>'Devoluciones'],
    (object)['nombre'=>'Carro'          ,'url'=>'/carro'            ,'img'=>'Carro'],
    (object)['nombre'=>'Envio'          ,'url'=>'/envio'            ,'img'=>'Envio'],
    (object)['nombre'=>'Metodo de Pago' ,'url'=>'/cat-metodopago'   ,'img'=>'Metodo de Pago'],
    (object)['nombre'=>'Domicilio'      ,'url'=>'/domicilio'        ,'img'=>'Domicilio'],
    (object)['nombre'=>'Codigo Postal'  ,'url'=>'/cat-cp'           ,'img'=>'Codigo Postal'],
    (object)['nombre'=>'Municipios'     ,'url'=>'/cat-municipios'   ,'img'=>'Municipios'],
    (object)['nombre'=>'Estados'        ,'url'=>'/cat-estados'      ,'img'=>'Estados'],
];
$this->title = 'E-commerce';
?>
<div class="site-index" >
<div class="body-content" >        
<!-- INNICA EL CONTENEDOR PRICIPAL -->
<section class="text-center bg-light features-icons ">
<div class="contenedor">
<div class="filas justify-content-md-center">

   <?php foreach($botones as $boton){ ?>
   
    <div class="col-md-2">
      <?= Html::img("/img/{$boton->img}.jpg", ['style'=>'width:100px; margin:20px;'])?>
      <?= Html::a("<h5>{$boton->nombre}</h5>",["{$boton->url}"],['class'=>'btn btn-default']) ?>
    </div>
  <?php } ?>

</div>
</div>
</section>                
<!-- Termina el row -->
        <!-- Termina el body-content -->
</div>
<!-- Termina el site-index -->
</div>
    <!-- INICIA FEATURED CATEGORY -->
    <div class="categories">
        <div class="small-container">
            <div class="filas">
                <div class="colum-3">
                <?= Html::img('plantilla/images/category-1.jpg', ['class' => 'logo']) ?>

                </div>
                <div class="colum-3">
                <?= Html::img('plantilla/images/category-2.jpg', ['class' => 'logo']) ?>

                </div>
                <div class="colum-3">
                <?= Html::img('plantilla/images/category-3.jpg', ['class' => 'logo']) ?>

                </div>
            </div>
        </div>
    </div>
    <!--------- FIN DE FACTURE CATEGORI ----- -->

    <!-- INICIO futured products -->
    <div class="small-container">
        <h2 class="title">Featured Productos</h2>
        <div class="filas">
            <div class="colum-4">
               <a href="product-datails.html"> <?= Html::img('plantilla/images/product-1.jpg', ['class' => 'logo']) ?></a>
                <h4>red Printed T-shirt</h4>
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
                <p>$50.00</p>

            </div>
            <div class="colum-4">
            <?= Html::img('plantilla/images/product-2.jpg', ['class' => 'logo']) ?>
                <h4>red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <!-- <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    <i class="fa fa-address-book" aria-hidden="true"></i> -->

                </div>
                <p>$50.00</p>

            </div>
            <div class="colum-4">
            <?= Html::img('plantilla/images/product-3.jpg', ['class' => 'logo']) ?>
                <h4>red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>

                    <!-- <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    <i class="fa fa-address-book" aria-hidden="true"></i> -->

                </div>
                <p>$50.00</p>

            </div>
            <div class="colum-4">
            <?= Html::img('plantilla/images/product-4.jpg', ['class' => 'logo']) ?>
                <h4>red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half" aria-hidden="true"></i>

                    <!-- <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    <i class="fa fa-address-book" aria-hidden="true"></i> -->

                </div>
                <p>$50.00</p>

            </div>
        
        

    </div>

    <!-- offer -->
    <div class="offer">
        <div class="small-container">
            <div class="filas">
                <div class="colum-2">
                <?= Html::img('plantilla/images/exclusive.png', ['class' => 'logo', 'style'=>'width:600px;']) ?>
                </div>
                <div class="colum-2">
                    <p>Exclusivo y valioso</p>
                    <h1>smart band 4</h1>
                    <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur quibusdam vero eos animi
                        ratione. Inventore quam quo obcaecati delectus cum non accusamus assumenda! Officiis totam
                        voluptatem explicabo vel in possimus!</small><br>
                    <a href="" class="btn">buy now &#187 </a>
                </div>
            </div>
        </div>
    </div>

    <!-- testimonial -->
    <div class="testimonial">
        <div class="small-container">
            <div class="filas">
                <div class="colum-3">
                    <i class="fa fa-quote-left"></i>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo, fugit neque. Quasi aliquid eum
                        rerum quam qui ipsam quia quae suscipit dolorem quos illo architecto provident inventore
                        deserunt, similique animi?
                    </p>
                    <div class="rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <?= Html::img('plantilla/images/user-1.png', ['class' => 'logo']) ?>
                    <h3>sean paker</h3>
                </div>

                <div class="colum-3">
                    <i class="fa fa-quote-left"></i>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo, fugit neque. Quasi aliquid eum
                        rerum quam qui ipsam quia quae suscipit dolorem quos illo architecto provident inventore
                        deserunt, similique animi?
                    </p>
                    <div class="rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <?= Html::img('plantilla/images/user-2.png', ['class' => 'logo']) ?>
                    <h3>sean paker</h3>
                </div>

                <div class="colum-3">
                    <i class="fa fa-quote-left"></i>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo, fugit neque. Quasi aliquid eum
                        rerum quam qui ipsam quia quae suscipit dolorem quos illo architecto provident inventore
                        deserunt, similique animi?
                    </p>
                    <div class="rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <?= Html::img('plantilla/images/user-3.png', ['class' => 'logo']) ?>
                    <h3>sean paker</h3>
                </div>


            </div>
        </div>

    </div>
    <!-- brands -->

    <div class="brands">
        <div class="small-container">
            <div class="filas">
                <div class="colum-5">
                <?= Html::img('plantilla/images/logo-godrej.png', ['class' => 'logo']) ?>
                </div>
                <div class="colum-5">
                <?= Html::img('plantilla/images/logo-coca-cola.png', ['class' => 'logo']) ?>
                </div>
                <div class="colum-5">
                <?= Html::img('plantilla/images/logo-oppo.png', ['class' => 'logo']) ?>
                </div>
                <div class="colum-5">
                <?= Html::img('plantilla/images/logo-paypal.png', ['class' => 'logo']) ?>
                </div>
                <div class="colum-5">
                <?= Html::img('plantilla/images/logo-philips.png', ['class' => 'logo']) ?>
                </div>


            </div>
        </div>
    </div>

