<?php

use app\models\CatTarjeta;
?>
<!-- Modal para editar la tarjeta en la base de datos de carro -->
<!-- id para identificar el modal en el javaScript que se va a mostrar -->
<div id="ventana-modaltarjeta<?= $tarjeta->tar_id ?>" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#9da2cc3b;">
                <h5 class="modal-title" id="exampleModalLongTitle"><b>TUS TARJETAS</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- id para identificar donde se sacara el dato para editar el domicilio -->
            <div class="modal-body" id="modal-body-tarjeta">
                <div class="row">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-4">
                        <p><b>Tarjeta</b></p>
                    </div>
                    <div class="col-md-4">
                        <p><b>Nombre en la tarjeta</b></p>
                    </div>
                    <div class="col-md-2">
                        <p><b>Vencimiento</b></p>
                    </div>
                </div>
                <!-- foreach para llamar todos los datos de tarjeta disponibles para el usuario. Se llama la funcion del 
                    modelo y se guarda en una variable para mostrar -->
                <?php foreach (\app\models\CatTarjeta::tarjeta() as $tarjeta) : ?>
                    <div id="contenedor-tarjeta" class="efecto-modal">
                        <div class="d-flex input-tarjeta modaltarjeta">
                            <div class="d-flex">
                                <div class="modalinput">
                                     <!-- El input radio para identificar la tarjeta seleccionada. El id esta concatenado para que se junten
                                los inputs del foreach. Se le da un valor con el id para saber cual tarjeta se selecciono -->
                                    <input class="input-tarjeta" type="radio" id="informacion<?= $tarjeta->tar_id ?>" name="tarjcolor" value="<?= $tarjeta->tar_id ?>">
                                </div>

                                <div class="card-info">
                                    <!-- Se llaman los valores que se necesitan de la consulta para mostrar. El echo substr es para
                                solo mostrar la ultima parte del numero de tarjeta -->
                                    <p><b><?= $tarjeta->tar_financiera ?></b> con terminación <b><?php echo substr($tarjeta->tar_numtarjeta, 12, 16); ?></b></p>
                                </div>
                            </div>
                            <div>
                                <p><?= $tarjeta->tar_nombre ?></p>
                            </div>
                            <div>
                                <p><b><?= $tarjeta->tar_expiracion ?></b></p>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <!-- Boton para cerrar el modal -->
                <button type="button" class="editar-btn-tarjeta" data-dismiss="modal">Cerrar <i class="fas fa-window-close"></i></button>
                <!-- Guarda el id del dato seleccionado y lo manda a la funcion registrarTarjeta en javascript para hacer el cambio
                en la bd y actualizar en la vista de checkout en tiempo real-->
                <button type="button" class="eliminar-btn-tarjeta" onclick="registrarTarjeta(<?= $tarjeta->tar_id ?>)">Guardar <i class="far fa-save"></i></button>
            </div>
        </div>
    </div>
</div>