<div class="small-container-checkout card-page">
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
                            <a onclick="eliminarProducto(<?= $carritoDe->cardet_id ?>, 1)" href="">Elminar</a>
                        </div>
                    </div>
                </td>
                <td><input id="input-cant<?= $carritoDe->cardet_id ?>" type="number" onclick="registrarCantidad(<?= $carritoDe->cardet_id ?>, 1)" value=<?= $carritoDe->cardet_cantidad ?>></td>
                <td>$<?= $carritoDe->cardet_precio ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>