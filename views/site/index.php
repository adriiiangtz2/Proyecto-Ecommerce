<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
$this->title = 'E-commerce';
?>


 <!-- INICIO DE LA CABECERA  -->
 <div class="headerr">
        <!-- contenedor general -->
        <div class="contenedor">

              <!-- contenedor logo y menu -->
              <div class="barra">
                  <div class="logo">
                      <a href="index.html"><?= Html::img('plantilla/images/logo.png', ['class' => 'logo', 'style'=>'width:125px;']) ?></a> 
                      
                </div>
                <nav>
                    <!-- se le coloca una id-->
                    <ul id="menuItems">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="productos.html">Products</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="account.html">Account</a></li>
                    </ul>
                </nav>
                <a href="card.html"><?= Html::img('plantilla/images/cart.png', ['style'=>'width:30px; height:30px'])?></a> 
                <!-- se le coloca una accion al menu un evento -->
                <?= Html::img('plantilla/images/menu.png', ['class' => 'menu-icon','onclick'=>'menutoggle()','style'=>'width:30px; height:30px'])?>
            </div>
            </div>
            <!-- termina contenedor logo y menu -->
            <div class="filas">
                <div class="colum-2">
                    <h1>Lorem ipsuonsectetur<br> adipisicing elit.</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis saepe numquam molestias ipsa
                        quis, recusandae totam doloremque</p>
                    <!-- &#187 flecha -->
                    <a href="#" class="btnn">Explore now &#187</a>
                </div>
                <div class="colum-2">
                <?= Html::img('plantilla/images/image1.png', ['class' => 'logo', 'style'=>'width:500px;']) ?>
                </div>

            </div>

        </div>
        <!-- ----TERMINA EL CONTENEDOR CENTRAL ----- -->
    </div>
    <!------- FIN DE LA CABECERA ------>





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
                    <?= Html::img('plantilla/images/exclusive.png', ['class' => 'logo', 'style' => 'width:600px;']) ?>
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