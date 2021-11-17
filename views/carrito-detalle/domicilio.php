<?php

use yii\bootstrap4\Html;
use kartik\widgets\DatePicker;
use yii\bootstrap4\ActiveForm;

?>
<!-- Modal para editar el domicilio en la base de datos de carro -->
<!-- id para identificar el modal en el javaScript que se va a mostrar -->
<div id="ventana-modaldomicilio<?= $dompre->dom_id ?>" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#9da2cc3b;">
                <h5 class="modal-title" id="exampleModalLongTitle"><b>TUS DIRECCIONES</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- id para identificar donde se sacara el dato para editar el domicilio -->
            <div class="modal-body" id="modal-body-domicilio">
                <!-- foreach para llamar todos los datos de domicilio disponibles para el usuario. Se llama la funcion del 
                    modelo y se guarda en una variable para mostrar -->
                <?php foreach (\app\models\Domicilio::domi() as $domicilio) : ?>


                    <div class="col-md-12 contenedor-card-domicilio">
                        <!-- owl-carousel -->

                        <div class="domicilio-titulo">

                        </div>
                        <div class="checkout-domicilio efecto-modal">
                            <div class="modalinput">
                                <!-- El input radio para identificar el domicilio seleccionado. El id esta concatenado para que se junten
                                los inputs del foreach. Se le da un valor con el id para saber cual domicilio se selecciono -->
                                <input type="radio" id="informacion<?= $domicilio->dom_id ?>" name="domcolor" value="<?= $domicilio->dom_id ?>">
                            </div>
                            <div>
                                <!-- Se llaman los valores que se necesitan de la consulta para mostrar -->
                                <p><b> Ciudad: </b><?= $domicilio->dom_ciudad ?>
                                    <b>, Colonia: </b><?= $domicilio->dom_colonia ?>
                                    <b>, Calle: </b><?= $domicilio->dom_calle ?>
                                    <b>, Número exterior: </b><?= $domicilio->dom_numExt ?>
                                    <b>, Número interior: </b><?= $domicilio->dom_numInt ?>
                                    <b>, Teléfono :</b><?= $domicilio->dom_telefono ?>
                                    <b>, Código postal: </b><?= $domicilio->dom_fkcp ?>
                                </p>
                            </div>
                        </div>

                    </div>

                <?php endforeach; ?>

            </div>
            <div class="modal-footer">
                <!-- Boton para cerrar el modal -->
                <button type="button" class="editar-btn-tarjeta" data-dismiss="modal">Cerrar <i class="fas fa-window-close"></i></button>
                <!-- Guarda el id del dato seleccionado y lo manda a la funcion registrarDomicilio en javascript para hacer el cambio
                en la bd y actualizar en la vista de checkout en tiempo real-->
                <button type="button" class="eliminar-btn-tarjeta" onclick="registrarDomicilio(<?= $domicilio->dom_id ?>)">Guardar <i class="far fa-save"></i></button>
            </div>
        </div>
    </div>
</div>