<?php

use yii\bootstrap4\Html;

$cardet = \app\models\CarritoDetalle::cuentas();
$contador = \app\models\CarritoDetalle::carritoContador();
$producto = \app\models\CatFavorito::producto();
?>
<!-- card items details -->
<div id="cardet">
    <h3><b>MI CARRITO</b></h3>
    <!-- Contador de pedidos -->
    <?php if($contador == 1) :?>
    <p><?= $contador ?> PRODUCTO</p>
    <?php else: ?>
        <p><?= $contador ?> PRODUCTOS</p>
    <?php endif; ?>
    
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
                                    <?= Html::a($carritoDe->productoNombre, ['/producto/detalles', 'id' => $carritoDe->cardet_fkproducto], ['class' => 'producto-carrito']) ?>
                                    <br>
                                    <br>
                                    <!-- Precio viene de la consulta de la tabla producto -->
                                    <small>Precio: $<?= number_format($carritoDe->productoPrecio, 2, '.', ','); ?></small>
                                    <br>
                                    <!-- Se llama la funcion eliminarProducto al boton para eliminar el producto del carrito -->
                                    <button class="botonCambiar" onclick="eliminarProducto(<?= $carritoDe->cardet_id ?>)">Eliminar</button>
                                </div>
                            </div>
                        </td>
                        <!-- Se llama la funcion registrarCantidad al input de cantidad para registrar los cambios a la bd y a la vista. -->
                        <td><input id="input-cant<?= $carritoDe->cardet_id ?>" min="1" type="number" onclick="registrarCantidad(<?= $carritoDe->cardet_id ?>)" value=<?= $carritoDe->cardet_cantidad ?>></td>
                        <td>$<?= number_format($carritoDe->cardet_precio, 2, '.', ','); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <!-- Se muestra un resumen de los datos de precio antes de ir al checkout -->
            <div class="total-price">
                <table>
                    <tr>
                        <td>SubTotal:</td>
                        <td>$<?= number_format($cardet->total, 2, '.', ','); ?></td>

                    </tr>

                    <tr>
                        <td>Impuestos:</td>
                        <td>$<?= number_format($cardet->iva, 2, '.', ','); ?></td>

                    </tr>

                    <tr>
                        <td>Total:</td>
                        <td>$<?= number_format($cardet->importe, 2, '.', ',');  ?></td>

                    </tr>
                </table>

            </div>
            <!-- Boton para ir al checkout -->
            <?= Html::a('Proceder al pago', ['carrito-detalle/checkout'], ['class' => 'btn btn-warning']) ?>
        <?php else : /* Si no hay nada en la consulta */ ?>
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
    <div>
        <!-- Recomendación de productos  -->
        <?= $this->render('/cat-favorito/prodescuento', compact('producto')) ?>
    </div>
</div>