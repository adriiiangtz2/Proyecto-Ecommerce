<div class="small-container-checkout card-page">
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
                            <!-- Se llama la funcion eliminarProducto al boton para eliminar el producto del carrito. El 1
                            concatenado es para diferenciar con la tabla de la vista carrito -->
                            <button class="botonCambiar" onclick="eliminarProducto(<?= $carritoDe->cardet_id ?>, 1)">Elminar</button>
                        </div>
                    </div>
                </td>
                <!-- Se llama la funcion registrarCantidad al input de cantidad para registrar los cambios a la bd y a la vista. El 1
                            concatenado es para diferenciar con la tabla de la vista carrito -->
                <td><input id="input-cant<?= $carritoDe->cardet_id ?>" type="number" onclick="registrarCantidad(<?= $carritoDe->cardet_id ?>, 1)" value=<?= $carritoDe->cardet_cantidad ?>></td>
                <td>$<?= $carritoDe->cardet_precio ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>