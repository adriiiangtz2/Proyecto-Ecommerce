<!-- Modal para editar el metodo de envio en la base de datos de carro -->
<!-- id para identificar el modal en el javaScript que se va a mostrar -->
<div id="ventana-modalenvio<?= $envio->env_id ?>" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#9da2cc3b;">
                <h5 class="modal-title" id="exampleModalLongTitle"><b>METODO DE ENVÍO</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- id para identificar donde se sacara el dato para editar el metodo de envio -->
            <div class="modal-body" id="modal-body-envio">
                <!-- foreach para llamar todos los datos de envio disponibles en la base de datos. Se llama la funcion del 
                    modelo y se guarda en una variable para mostrar -->
                <?php foreach (\app\models\CarritoDetalle::envioModal() as $envio) : ?>

                    <div class="alinearInputModal efecto-modal">
                        <div class="modalinput">
                            <!-- El input radio para identificar el metodo de envio seleccionado. El id esta concatenado para que se junten
                                los inputs del foreach. Se le da un valor con el id para saber cual metodo de envio se selecciono -->
                            <input type="radio" id="informacion<?= $envio->env_id ?>" name="envcolor" value="<?= $envio->env_id ?>">
                        </div>
                        <div class="d-flex">
                             <!-- Se llaman los valores que se necesitan de la consulta para mostrar -->
                            <p>$<b><?= $envio->env_costo ?></b> Método de envío: <b><?= $envio->env_metodo ?></b> - Tiempo de entrega: <b><?= $envio->env_tiempo ?></b></p>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
            <div class="modal-footer">
                 <!-- Boton para cerrar el modal -->
                <button type="button" class="editar-btn-tarjeta" data-dismiss="modal">Cerrar <i class="fas fa-window-close"></i></button>
                <!-- Guarda el id del dato seleccionado y lo manda a la funcion registrarEnvio en javascript para hacer el cambio
                en la bd y actualizar en la vista de checkout en tiempo real-->
                <button type="button" class="eliminar-btn-tarjeta" onclick="registrarEnvio(<?= $envio->env_id ?>)">Guardar <i class="far fa-save"></i></button>
            </div>
        </div>
    </div>
</div>