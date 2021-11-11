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

            <div class="modal-body" id="modal-body-tarjeta" style="border:1px dashed;">

                <table>
                    <tr>
                        <th></th>
                        <th>Institución</th>
                        <th>Terminación</th>
                        <th>Nombre</th>
                        <th>Vencimiento</th>
                    </tr>
                    <?php foreach (\app\models\CatTarjeta::tarjeta() as $tarjeta) : ?>
                        <tr>
                            <td>
                                <div style="padding: 10px;">
                                    <input type="radio" id="informacion<?= $tarjeta->tar_id ?>" name="tarjcolor" value="<?= $tarjeta->tar_id ?>">
                                </div>
                            </td>
                            <td>
                                <div class="card-info">
                                    <p><b><?= $tarjeta->tar_financiera ?></b> </p>
                                </div>
                            </td>
                            <td>
                                <p><b><?php echo substr($tarjeta->tar_numtarjeta, 12, 16); ?></b></p>
                            </td>
                            <td>
                                <p><?= $tarjeta->tar_nombre ?></p>
                            </td>
                            <td>
                                <p><b><?= $tarjeta->tar_expiracion ?></b></p>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="editar-btn-tarjeta" data-dismiss="modal">Cerrar <i class="fas fa-window-close"></i></button>
                <button type="button" class="eliminar-btn-tarjeta" onclick="registrarTarjeta(<?= $tarjeta->tar_id ?>)">Guardar <i class="far fa-save"></i></button>
            </div>
        </div>
    </div>
</div>