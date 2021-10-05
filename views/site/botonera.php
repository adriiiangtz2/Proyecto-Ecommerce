<?php

use yii\bootstrap4\Html;

$botones = [
    (object)['nombre' => 'Usuario', 'url' => '/usuario', 'img' => 'Usuario'],
    (object)['nombre' => 'Tarjetas', 'url' => '/cat-tarjeta', 'img' => 'Tarjetas'],
    (object)['nombre' => 'Favoritos', 'url' => '/cat-favorito', 'img' => 'Favoritos'],
    (object)['nombre' => 'Productos', 'url' => '/producto', 'img' => 'Productos'],
    (object)['nombre' => 'Tienda', 'url' => '/tienda', 'img' => 'Tienda'],
    (object)['nombre' => 'Marcas', 'url' => '/cat-marca', 'img' => 'Marcas'],
    (object)['nombre' => 'Tipos', 'url' => '/cat-tipo', 'img' => 'Tipos'],
    (object)['nombre' => 'Descuentos', 'url' => '/descuento', 'img' => 'Descuentos'],
    (object)['nombre' => 'Carrito Detalle', 'url' => '/carrito-detalle', 'img' => 'Carrito Detalle'],
    (object)['nombre' => 'Devoluciones', 'url' => '/devoluciones', 'img' => 'Devoluciones'],
    (object)['nombre' => 'Carro', 'url' => '/carro', 'img' => 'Carro'],
    (object)['nombre' => 'Envio', 'url' => '/envio', 'img' => 'Envio'],
    (object)['nombre' => 'Metodo de Pago', 'url' => '/cat-metodopago', 'img' => 'Metodo de Pago'],
    (object)['nombre' => 'Domicilio', 'url' => '/domicilio', 'img' => 'Domicilio'],
    (object)['nombre' => 'Codigo Postal', 'url' => '/cat-cp', 'img' => 'Codigo Postal'],
    (object)['nombre' => 'Municipios', 'url' => '/cat-municipios', 'img' => 'Municipios'],
    (object)['nombre' => 'Estados', 'url' => '/cat-estados', 'img' => 'Estados'],
];

?>
<div class="site-index">
    <div class="body-content">
        <!-- INNICA EL CONTENEDOR PRICIPAL -->
        <section class="text-center bg-light features-icons ">
            <div class="contenedor">
                <div class="filas justify-content-md-center">

                    <?php foreach ($botones as $boton) { ?>

                        <div class="col-md-2">
                            <?= Html::img("/img/{$boton->img}.jpg", ['style' => 'width:100px; margin:20px;']) ?>
                            <?= Html::a("<h5>{$boton->nombre}</h5>", ["{$boton->url}"], ['class' => 'btn btn-default']) ?>
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