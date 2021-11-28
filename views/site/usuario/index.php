<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
$this->title = 'E-commerce';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="stylles.css" type="text/css">

    <!-- fonto poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.rawgit.com/IreeRodriguez/card-validator/hipermegared/lib/main.min.js">

    <!-- font awesome 4 cdn -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">


    <title>Ecommerce Website</title>
</head>
<!-- VISTA CUANDO EL USUARIO SE HA REGISTRADO -->
<?= $this->render('/layouts/carrusel') ?>

<?= $this->render('/layouts/usuario/informacion') ?>
<!-- INICIA FEATURED CATEGORY -->
<div class="categories">
    <div class="small-container">
        <div class="filas">
            <div class="colum-3">
                <?= Html::img('plantilla/images/category-1.jpg', [
                        'class' => 'logo',
                    ]) ?>
            </div>
            <div class="colum-3">
                <?= Html::img('plantilla/images/category-2.jpg', [
                        'class' => 'logo',
                    ]) ?>
            </div>
            <div class="colum-3">
                <?= Html::img('plantilla/images/category-3.jpg', [
                        'class' => 'logo',
                    ]) ?>
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
            <a href="product-datails.html"> <?= Html::img('plantilla/images/product-1.jpg',['class' => 'logo']) ?></a>
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
            <?= Html::img('plantilla/images/product-2.jpg', [
                    'class' => 'logo',
                ]) ?>
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
            <?= Html::img('plantilla/images/product-3.jpg', [
                    'class' => 'logo',
                ]) ?>
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
            <?= Html::img('plantilla/images/product-4.jpg', [
                    'class' => 'logo',
                ]) ?>
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
</div>
<!-- offer -->
<div class="offer">
    <div class="small-container">
        <div class="filas">
            <div class="colum-2">
                <?= Html::img('plantilla/images/exclusive.png', [
                            'class' => 'logo',
                            'style' => 'width:600px;',
                        ]) ?>
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
                <?= Html::img('plantilla/images/user-1.png', [
                        'class' => 'logo',
                    ]) ?>
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
                <?= Html::img('plantilla/images/user-2.png', [
                        'class' => 'logo',
                    ]) ?>
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
                <?= Html::img('plantilla/images/user-3.png', [
                        'class' => 'logo',
                    ]) ?>
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
                <?= Html::img('plantilla/images/logo-godrej.png', [
                        'class' => 'logo',
                    ]) ?>
            </div>
            <div class="colum-5">
                <?= Html::img('plantilla/images/logo-coca-cola.png', [
                        'class' => 'logo',
                    ]) ?>
            </div>
            <div class="colum-5">
                <?= Html::img('plantilla/images/logo-oppo.png', [
                        'class' => 'logo',
                    ]) ?>
            </div>
            <div class="colum-5">
                <?= Html::img('plantilla/images/logo-paypal.png', [
                        'class' => 'logo',
                    ]) ?>
            </div>
            <div class="colum-5">
                <?= Html::img('plantilla/images/logo-philips.png', [
                        'class' => 'logo',
                    ]) ?>
            </div>
        </div>
    </div>
</div>