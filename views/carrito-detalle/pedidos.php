<?php
$carr = \app\models\Carro::carroPagado();
?>
<h3><b>MIS PEDIDOS</b></h3>
<!-- Contador de pedidos -->
<p><?= count($carr) ?> PEDIDOS</p>
<!-- Los productos se muestran en una tabla -->
<div class="primer-contenedor-principal">

    <div class="segundo-contenedor-principal">
        <?php /* foreach que manda a llamar todos los carros que fueron pagados por el usuario logueado y se guarda en variable*/
        foreach (\app\models\Carro::carroPagado() as $a) :
        ?>
            <div class="row tercer-contenedor-principal">
                <div class="col-md-3 contenedordatos-header fecha">
                    <p>PEDIDO REALIZADO</p>
                    <p><b><?= $a->car_fecha ?></b></p>
                </div>
                <div class="col-md-2 contenedordatos-header">
                    <p>TOTAL</p>
                    <p><b>$<?= $a->car_total ?></b></p>
                </div>
                <div class="col-md-5 contenedordatos-header">
                    <p>MÉTODO DE PAGO</p>
                    <!-- Se trae dato de la tarjeta de cat_tarjeta -->
                    <p><b><?= $a->tarjetaCarro->tar_financiera ?></b> con terminación: <b><?php echo substr($a->tarjetaCarro->tar_numtarjeta, 12, 16); ?></b></p>
                </div>
                <div class="col-md-2 contenedordatos-header pedido">
                    <p><b>Pedido No. <?= $a->car_id ?></b></p>
                </div>

                <?php /* Con cada carro de la consulta anterior hay un foreach para que se muestren todos los productos en el carro si esto
                es necesario, para eso se asigna el dato de la consulta anterior y se asigna en esta */
                foreach ($a->productosPagados() as $pedido) :
                ?>
                    <div class="col-md-2 producto-imagen">
                        <!-- Se llama la imagen del producto en cuestion con funcion getUrl -->
                        <img class="producto-img" src=<?= $pedido->cardetFkproducto->getUrl() ?>>
                    </div>
                    <div class="col-md-6 producto-nombre">
                        <!-- Nombre viene de la consulta -->
                        <p class="producto-p"><?= $pedido->productoNombre ?> <?= $pedido->cardet_fkcarro ?></p>
                    </div>
                    <div class="col-md-4 producto-rating">
                        <!-- Boton para ir a la vista de rating -->
                        <button class="btn btn-light producto-boton">Escribir una opinión sobre el producto</button>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>