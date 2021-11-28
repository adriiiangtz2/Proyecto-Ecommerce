<!-- //! Vistas para editar la informacion de la tarjeta, datos llegan por compact -->
<!-- //! Se renderiza a mostrar -->
<div>
    <div class="infor-desplagado" style="display:flex; justify-content:space-between;">
        <div>
            <!--   //*  trae el nombre completo de el modelo usuario -- -->
            <p><b>Nombre en la tarjeta:</b> <br> <?= $tarjeta->tar_nombre ?></p>
            <p><b>Tipo:</b> <br> <?= $tarjeta->tar_tipo ?></p>
            <p><b>Entidad F. :</b> <br> <?= $tarjeta->tar_financiera ?></p>
            <p><b>Expiración:</b> <br> <?= $tarjeta->tar_expiracion ?></p>
        </div>
        <div style="display:flex;flex-direction: column;justify-content: space-between;">
            <p><b>Dirección de facturacion:</b></p>
            <p>Traer datos de la tabla domicilio</p>
            <!-- VENTANA EMERGENTE MODAL EL ID BTN SOLO DIFERENCIA LOS BOTONES, LA FUNCION SI SE USA EN JS -->
            <div class="d-flex align-items-baseline" style="justify-content: space-around;">
                <!--   // TODO  FUNCION QUE EDITA -- -->
                <button type="button" class="editar-btn-tarjeta" data-toggle="modal" data-target="#exampleModal"
                    id="btn-modal<?= $tarjeta->tar_id ?>" onclick="modal(<?= $tarjeta->tar_id ?>)">
                    Editar
                    <i class="far fa-edit"></i>
                </button>
                <!-- // TODO  FUNCION QUE ELIMINA -- -->
                <button class="eliminar-btn-tarjeta" id="eliminar-tarjeta<?= $tarjeta->tar_id ?> "
                    onclick="eliminar(<?= $tarjeta->tar_id ?>)">
                    Eliminar
                    <!-- ICONO DE CLOSE -->
                    <i class="fas fa-window-close"></i>
                </button>
            </div>
        </div>
    </div>
</div>