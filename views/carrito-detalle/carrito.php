<?php

use yii\bootstrap4\Html;

$total = 0;
?>
<!-- card items details -->
<div id="cardet">
    <h3><b>MI CARRITO</b></h3>
    <div class="small-container card-page">
        <?php if (!empty(\app\models\CarritoDetalle::productosCarrito())) : ?>
            <table class="tabla">
                <tr>
                    <th class="tha">Producto</th>
                    <th class="tha">Cantidad</th>
                    <th class="tha">SubTotal</th>
                </tr>
                <?php foreach (\app\models\CarritoDetalle::productosCarrito() as $carritoDe) : ?>
                    <tr>
                        <td>
                            <div class="card-info">
                                <img src=<?= $carritoDe->cardetFkproducto->getUrl() ?>>
                                <div>
                                    <p><?= $carritoDe->productoNombre ?></p>
                                    <small>Precio: $<?= $carritoDe->productoPrecio ?></small>
                                    <br>
                                    <a onclick="eliminarProducto(<?= $carritoDe->cardet_id ?>)" href="">Elminar</a>
                                </div>
                            </div>
                        </td>
                        <td><input id="input-cant<?= $carritoDe->cardet_id ?>" type="number" onclick="registrarCantidad(<?= $carritoDe->cardet_id ?>)" value=<?= $carritoDe->cardet_cantidad ?>></td>
                        <td>$<?= $carritoDe->cardet_precio ?></td>
                        <?php
                        $total = $total + $carritoDe->cardet_precio;
                        $iva = $total * 0.16;
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
            <?= Html::a('Pagar', ['carrito-detalle/checkout'], ['class' => 'btn btn-warning']) ?>
        <?php else : ?>
            <div class="contendor-ningun-producto">
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