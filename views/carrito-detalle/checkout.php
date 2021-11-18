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
/* Consultas guardadas en una variable */
$domicilio = \app\models\CarritoDetalle::domicilioCheck();
$tarjeta = \app\models\CarritoDetalle::tarjetaCheck();
$envio = \app\models\CarritoDetalle::envioCheck();

$tarpre = \app\models\CarritoDetalle::tarjetaPredeterminado();
$dompre = \app\models\CarritoDetalle::domicilioPredeterminado();
?>
<!-- Contenedores que muestran partes del checkout -->
<div class="content-check d-flex">
    <div class="col-md-8">
        <div class="cardet-form cardet">
            <div class="col-md-12 contenedor-principal-checkout">
                <div class="row">
                    <div class="col-md-12 checkoutcuadro d-flex ">
                        <!-- Direccion de envio -->
                        <div class="d-flex" id="domi-info">
                            <!-- Se llama la vista con un render. domusu es donde se encuentra la vista -->
                            <?= $this->render('domusu') ?>
                            <!-- Input con value para saber si hay domicilio en la tabla carro -->
                            <input class="d-none" id="dom-existente" value="<?=$domicilio->dom_id?>"></input>
                        </div>
                        <div class="contenedor-cambiar">
                            <!-- Boton para llevar a la vista modal para elegir un domicilio de la lista. La vista del modal
                        se encuentra en domicilio.php -->
                            <?php /* If para que se compare si hay datos de domicilio en la base de datos. Si no existen se esconde 
                            el boton Cambiar */
                            if ($dompre != null) : 
                            ?>
                                <button class="botonCambiar" onclick="modaldomicilio(<?= $dompre->dom_id ?>)">Cambiar</button>
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- Donde se va a renderizar el cambio hecho en el modal -->
                    <?= $this->render('domicilio', compact('dompre')) ?>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 checkoutcuadro d-flex ">
                        <!-- Metodo de pago -->
                        <div class="d-flex" id="tarje-info">
                            <!-- Se llama la vista con un render. tarusu es donde se encuentra la vista -->
                            <?= $this->render('tarusu') ?>
                            <!-- Input con value para saber si hay un metodo de pago en la tabla carro -->
                            <input class="d-none" id="tar-existente" value="<?=$tarjeta->tar_id?>"></input>
                        </div>
                        <div class="contenedor-cambiar">
                            <!-- Boton para llevar a la vista modal para elegir una tarjeta de la lista. La vista del modal
                        se encuentra en tarjeta.php -->
                            <?php /* If para que se compare si hay datos de domicilio en la base de datos. Si no existen se esconde 
                            el boton Cambiar */
                            if ($tarpre != null) : 
                            ?>
                                <button class="botonCambiar" onclick="modaltarjeta(<?= $tarpre->tar_id ?>)">Cambiar</button>
                            <?php endif ?>
                        </div>
                    </div>
                    <!-- Donde se va a renderizar el cambio hecho en el modal -->
                    <?= $this->render('tarjeta', compact('tarpre')) ?>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 checkoutcuadro d-flex ">
                        <!-- Metodo de envio -->
                        <div class="d-flex" id="envi-info">
                            <!-- Se llama la vista con un render. envusu es donde se encuentra la vista. La vista del modal
                        se encuentra en envio.php-->
                            <?= $this->render('envusu') ?>
                        </div>
                        <div class="contenedor-cambiar">
                            <!-- Boton para llevar a la vista modal para elegir un metodo de envio de la lista -->
                            <button class="botonCambiar" onclick="modalenvio(<?= $envio->env_id ?>)">Cambiar</button>
                        </div>
                    </div>
                    <!-- Donde se va a renderizar el cambio hecho en el modal -->
                    <?= $this->render('envio', compact('envio')) ?>
                </div>
                <hr>
            </div>
        </div>
        <div id="cardet" class="cardet col-md-12">
            <!-- Se manda a renderizar la tabla donde se muestran los productos en el carrito -->
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
        <!-- Se manda a renderizar el contenedor con el boton para finalizar el pedido y el resumen final de la compra -->
        <?= $this->render('finalizar') ?>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>