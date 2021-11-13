<?php

use app\models\CatTarjeta;
?>

<div id="ventana-modaltarjeta<?= $tarjeta->tar_id ?>" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#9da2cc3b;">
                <h5 class="modal-title" id="exampleModalLongTitle"><b>TUS TARJETAS</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
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
                <?php foreach (\app\models\CatTarjeta::tarjeta() as $tarjeta) : ?>
                    <div id="contenedor-tarjeta" class="activo">
                        <div class="d-flex input-tarjeta" style="justify-content: space-between;">
                            <div class="d-flex">
                                <div style="padding: 10px;">
                                    <input class="input-tarjeta" type="radio" id="informacion<?= $tarjeta->tar_id ?>" name="tarjcolor" value="<?= $tarjeta->tar_id ?>">
                                </div>

                                <div class="card-info">
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
                <button type="button" class="editar-btn-tarjeta" data-dismiss="modal">Cerrar <i class="fas fa-window-close"></i></button>
                <button type="button" class="eliminar-btn-tarjeta" onclick="registrarTarjeta(<?= $tarjeta->tar_id ?>)">Guardar <i class="far fa-save"></i></button>
            </div>
        </div>
    </div>
</div>