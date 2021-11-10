<?php

use yii\bootstrap4\Html;
use kartik\widgets\DatePicker;
use yii\bootstrap4\ActiveForm;

?>
<!-- MODEL EMERGENTE BOOSTRAP -->
<div id="ventana-modaldomicilio<?= $domicilio->dom_id ?>" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#9da2cc3b;">
                <h5 class="modal-title" id="exampleModalLongTitle"><b>TUS DIRECCIONES</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="modal-body-domicilio" style="border:1px dashed;">
               
                    <?php foreach (\app\models\Domicilio::domi() as $domicilio) : ?>


                        <div class="col-md-12 contenedor-card-domicilio">
                            <!-- owl-carousel -->

                            <div class="domicilio-titulo">

                            </div>
                            <div class="checkout-domicilio">
                                <div style="padding: 10px;">
                                    <input type="radio" id="informacion<?= $domicilio->dom_id ?>" name="domcolor" value="<?= $domicilio->dom_id ?>">
                                </div>
                                <div>
                                    <p><b> Ciudad: </b><?= $domicilio->dom_ciudad ?>
                                        <b>, Colonia: </b><?= $domicilio->dom_colonia ?>
                                        <b>, Calle: </b><?= $domicilio->dom_calle ?>
                                        <b>, Numero exterior: </b><?= $domicilio->dom_numExt ?>
                                        <b>, Numero interior: </b><?= $domicilio->dom_numInt ?>
                                        <b>, Teléfono :</b><?= $domicilio->dom_telefono ?>
                                        <b>, Código postal: </b><?= $domicilio->dom_fkcp ?>
                                    </p>
                                </div>
                            </div>

                        </div>

                    <?php endforeach; ?>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="editar-btn-tarjeta" data-dismiss="modal">Cerrar <i class="fas fa-window-close"></i></button>
                <button type="button" class="eliminar-btn-tarjeta" onclick="registrarDomicilio(<?= $domicilio->dom_id ?>)">Guardar <i class="far fa-save"></i></button>
            </div>
        </div>
    </div>
</div>