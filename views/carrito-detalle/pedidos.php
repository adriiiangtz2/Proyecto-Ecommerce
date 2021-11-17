<div class="small-container-checkout card-page">
    <!-- Los productos se muestran en una tabla -->

    <?php /* foreach que manda a llamar todos los carros que fueron pagados por el usuario logueado */
    foreach (\app\models\Carro::carroPagado() as $a) :
    ?>
        <table class="tabla">
            <tr>
                <th class="tha">Producto</th>
                <th class="tha">Cantidad</th>
                <th class="tha">SubTotal</th>
            </tr>
            <?php /* Con cada carro de la consulta anterior hay un foreach para que se muestren todos los productos en el carro si esto
            es necesario */
            foreach ($a->productosPagados() as $pedido) :
            ?>
                <tr>
                    <td>
                        <div class="card-info">
                            <!-- Se llama la imagen del producto en cuestion con funcion getUrl -->
                            <img src=<?= $pedido->cardetFkproducto->getUrl() ?>>
                            <div>
                                <!-- Nombre viene de la consulta -->
                                <p><?= $pedido->productoNombre ?> <?= $pedido->cardet_fkcarro ?></p>
                                <!-- Precio viene de la consulta de la tabla producto -->
                                <small>Precio: $<?= $pedido->productoPrecio ?></small>
                                <br>
                                <!-- Se llama la funcion eliminarProducto al boton para eliminar el producto del carrito. El 1
                            concatenado es para diferenciar con la tabla de la vista carrito -->
                                <a onclick="eliminarProducto(<?= $pedido->cardet_id ?>, 1)" href="">Elminar</a>
                            </div>
                        </div>
                    </td>
                    <!-- Se llama la funcion registrarCantidad al input de cantidad para registrar los cambios a la bd y a la vista. El 1
                            concatenado es para diferenciar con la tabla de la vista carrito -->
                    <td><input id="input-cant<?= $pedido->cardet_id ?>" type="number" onclick="registrarCantidad(<?= $pedido->cardet_id ?>, 1)" value=<?= $pedido->cardet_cantidad ?>></td>
                    <td>$<?= $pedido->cardet_precio ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
        </table>
</div>