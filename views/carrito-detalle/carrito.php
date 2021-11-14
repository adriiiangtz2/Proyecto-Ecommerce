<?php

use yii\bootstrap4\Html;

$total = 0;
?>
<!-- card items details -->
<div id="cardet">
    <h3><b>MI CARRITO</b></h3>
    <div class="small-container card-page">
        <!-- El if compara si hay algo en la consulta, es decir que cumpla las condiciones de la consulta en productoCarrito. Si
        las cumple se despliega lo siguiente-->
        <?php if (!empty(\app\models\CarritoDetalle::productosCarrito())) : ?>
            <!-- Los productos se muestran en una tabla -->
            <table class="tabla">
                <tr>
                    <th class="tha">Producto</th>
                    <th class="tha">Cantidad</th>
                    <th class="tha">SubTotal</th>
                </tr>
                <!-- foreach que manda a llamar los datos del carro activo y los productos activos. $carritoDe es una variable que contiene
                la consulta -->
                <?php foreach (\app\models\CarritoDetalle::productosCarrito() as $carritoDe) : ?>
                    <tr>
                        <td>
                            <div class="card-info">
                                 <!-- Se llama la imagen del producto en cuestion con funcion getUrl -->
                                <img src=<?= $carritoDe->cardetFkproducto->getUrl() ?>>
                                <div>
                                    <!-- Nombre viene de la consulta -->
                                    <p><?= $carritoDe->productoNombre ?></p>
                                    <!-- Precio viene de la consulta de la tabla producto -->
                                    <small>Precio: $<?= $carritoDe->productoPrecio ?></small>
                                    <br>
                                    <!-- Se llama la funcion eliminarProducto al boton para eliminar el producto del carrito -->
                                    <a onclick="eliminarProducto(<?= $carritoDe->cardet_id ?>)" href="">Elminar</a>
                                </div>
                            </div>
                        </td>
                        <!-- Se llama la funcion registrarCantidad al input de cantidad para registrar los cambios a la bd y a la vista. -->
                        <td><input id="input-cant<?= $carritoDe->cardet_id ?>" type="number" onclick="registrarCantidad(<?= $carritoDe->cardet_id ?>)" value=<?= $carritoDe->cardet_cantidad ?>></td>
                        <td>$<?= $carritoDe->cardet_precio ?></td>
                        <?php
                        /* Datos que se mostraran en la vista */
                        /* Se calcula el precio total de los productos en el carrito */
                        $total = $total + $carritoDe->cardet_precio;
                        /* Se calcula el IVA total */
                        $iva = $total * 0.16;
                        /* El importe total con IVA */
                        $importe = $total + $iva;
                        ?>
                    </tr>
                <?php endforeach; ?>

                <!-- </tr>
        <tr>
            <td>
                <div class="card-info">
                    <img src="images/buy-2.jpg">
                    <div>
                        <p>red printed t-shirt</p>
                        <small>Price: $50.00 </small>
                        <br>
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td><input type="number" value="1"></td>
            <td>$80.00</td>
        </tr>

        </tr>
        <tr>
            <td>
                <div class="card-info">
                    <img src="images/buy-3.jpg">
                    <div>
                        <p>red printed t-shirt</p>
                        <small>Price: $50.00 </small>
                        <br>
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td><input type="number" value="1"></td>
            <td>$70.00</td>
        </tr> -->

            </table>
            <!-- Se muestra un resumen de los datos de precio antes de ir al checkout -->
            <div class="total-price">
                <table>
                    <tr>
                        <td>SubTotal</td>
                        <td>$<?= $total ?></td>

                    </tr>

                    <tr>
                        <td>Impuestos</td>
                        <td>$<?= $iva ?></td>

                    </tr>

                    <tr>
                        <td>Total</td>
                        <td>$<?= $importe ?></td>

                    </tr>
                </table>

            </div>
            <!-- Boton para ir al checkout -->
            <?= Html::a('Proceder al pago', ['carrito-detalle/checkout'], ['class' => 'btn btn-warning']) ?>
        <?php else : /* Si no hay nada en la consulta */?>
            <div class="contendor-ningun-producto">
                <!-- Esto es lo que se mostrara si no hay nada en la consulta del carrito -->
                <div>
                    <p>Aún no has añadido ningún artículo al carrito. Aquí encontrarás los productos que añadas.</p>
                </div>
                <div class="contenedor-imagen-carrito">
                    <?= Html::img('/plantilla/images/cartEmpty.png') ?>
                </div>
            </div>
        <?php endif ?>
        <!--  -->





    </div>
</div>