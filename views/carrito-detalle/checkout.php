<?php

use app\models\Envio;
use app\models\Usuario;
use yii\bootstrap4\Html;
use app\models\Domicilio;
use app\models\CatTarjeta;
use kartik\select2\Select2;
use app\models\CatMetodopago;
use app\models\CarritoDetalle;
use yii\bootstrap4\ActiveForm;

$total = 0;
$domicilio = \app\models\CarritoDetalle::domicilioCheck();
$tarjeta = \app\models\CarritoDetalle::tarjetaCheck();
$envio = \app\models\CarritoDetalle::envioCheck();
?>
<!-- card items details -->
<div class="content-check d-flex">
    <div class="col-md-8">
        <div class="cardet-form cardet">
            <div class="col-md-12 contenedor-principal-checkout">
                <div class="row">
                    <div class="col-md-12 checkoutcuadro d-flex ">
                        <div class="d-flex" id="domi-info">
                            <?= $this->render('domusu') ?>
                        </div>
                        <div class="contenedor-cambiar">
                            <button class="botonCambiar" onclick="modaldomicilio(<?= $domicilio->dom_id ?>)">Cambiar</button>
                        </div>
                    </div>
                    <?= $this->render('domicilio', compact('domicilio')) ?>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 checkoutcuadro d-flex ">
                        <div class="d-flex" id="tarje-info">
                            <?= $this->render('tarusu') ?>
                        </div>
                        <div class="contenedor-cambiar">
                            <button class="botonCambiar" onclick="modaltarjeta(<?= $tarjeta->tar_id ?>)">Cambiar</button>

                        </div>
                    </div>
                    <?= $this->render('tarjeta', compact('tarjeta')) ?>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 checkoutcuadro d-flex ">
                        <div class="d-flex" id="envi-info">
                            <?= $this->render('envusu') ?>
                        </div>
                        <div class="contenedor-cambiar">
                            <button class="botonCambiar" onclick="modalenvio(<?= $envio->env_id ?>)">Cambiar</button>
                        </div>
                    </div>
                    <?= $this->render('envio', compact('envio')) ?>
                </div>
                <hr>
            </div>
        </div>
        <div id="cardet" class="cardet col-md-12">

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

                                    </div>
                                </div>
                            </td>
                            <td><input id="input-cant<?= $carritoDe->cardet_id ?>" type="number" onclick="registrarCantidad(<?= $carritoDe->cardet_id ?>)" value=<?= $carritoDe->cardet_cantidad ?>></td>
                            <td>$<?= $carritoDe->cardet_precio ?></td>
                            <?php
                            $total = $total + $carritoDe->cardet_precio;
                            $iva = $total * 0.16;
                            $envio_costo = $envio->env_costo;
                            $importe = $total + $iva + $envio_costo;
                            ?>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
        <div class="col-md-12">
            <p style="font-size:12px">
                <b>¿Necesitas ayuda?</b> Consulta nuestras Páginas de ayuda o contacta con nosotros
                Para un producto vendido por RedStore.com: Al hacer clic en "Finalizar pedido", te enviaremos un e-mail notificándote que hemos recibido tu pedido. El contrato de compra no estará formalizado hasta que te enviemos un mensaje por e-mail notificándote que se ha enviado el producto.
                En el plazo de 30 días desde la entrega, puedes devolver el artículo nuevo, sin abrir y en su estado original. Se aplican restricciones y excepciones. Ver la Política de devoluciones de Redstore.com.
            </p>
        </div>
    </div>
    <div>
        <div>
            <button type="button" onclick="finalizarPago()" class="btn btn-primary">Finalizar pedido</button>
        </div>
        <div>
            <p><b> Subtotal:</b>$<?= $total ?><br>
                <b> Impuestos:</b>$<?= $iva ?><br>
                <b> Envio:</b>$<?= $envio_costo ?><br>
                <b> Total:</b>$<?= $importe ?><br>
                <input id="total-carro" class="d-none" type="text" value="<?= $importe?>"></input>
                <input id="iva-carro" class="d-none" type="text" value="<?= $iva?>"></input>
            </p>
        </div>
        <!-- <div>
            <h1>Su pedido se ha realizado</h1>
        </div> -->
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
