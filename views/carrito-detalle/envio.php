<!-- MODEL EMERGENTE BOOSTRAP -->
<div id="ventana-modalenvio<?= $envio->env_id ?>" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#9da2cc3b;">
                <h5 class="modal-title" id="exampleModalLongTitle"><b>METODO DE ENVIO</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="modal-body-envio" style="border:1px dashed;">

                <?php foreach (\app\models\CarritoDetalle::envioModal() as $envio) : ?>

                    <div style="align-items: baseline; display: flex;">
                        <div style="padding: 10px;">
                            <input type="radio" id="informacion<?= $envio->env_id ?>" name="envcolor" value="<?= $envio->env_id ?>">
                        </div>
                        <div class="d-flex">
                            <p>$<b><?= $envio->env_costo ?></b> Metodo de envio: <b><?= $envio->env_metodo ?></b> - Tiempo de entrega: <b><?= $envio->env_tiempo ?></b></p>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="editar-btn-tarjeta" data-dismiss="modal">Cerrar <i class="fas fa-window-close"></i></button>
                <button type="button" class="eliminar-btn-tarjeta" onclick="registrarEnvio(<?= $envio->env_id ?>)">Guardar <i class="far fa-save"></i></button>
            </div>
        </div>
    </div>
</div>