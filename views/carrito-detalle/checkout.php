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
            <?= $this->render('carrito-final') ?>
        </div>
        <div class="col-md-12">
            <p class="infoinferior">
                <b>¿Necesitas ayuda?</b> Consulta nuestras Páginas de ayuda o contacta con nosotros
                Para un producto vendido por RedStore.com: Al hacer clic en "Finalizar pedido", te enviaremos un e-mail notificándote que hemos recibido tu pedido. El contrato de compra no estará formalizado hasta que te enviemos un mensaje por e-mail notificándote que se ha enviado el producto.
                En el plazo de 30 días desde la entrega, puedes devolver el artículo nuevo, sin abrir y en su estado original. Se aplican restricciones y excepciones. Ver la Política de devoluciones de Redstore.com.
            </p>
        </div>
    </div>
    <div id="contenedor-carrito-final" class="contenedor-finalizar">
    <?= $this->render('finalizar') ?>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>