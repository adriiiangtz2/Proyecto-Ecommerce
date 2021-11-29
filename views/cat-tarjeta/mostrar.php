<!-- //! Vista que contiene las tarjetas guardadas , datos llegan por funcion -->
<!-- //! S renderiza a registrae -->
<?php
use yii\bootstrap4\Html; ?>



<div class="" id="idtarjeta">
    <!-- //TODO -------- Empieza el ciclo , contiene las tajetas del usuario ------- -->
    <?php foreach (\app\models\CatTarjeta::tarjeta() as $tarjeta):   ?>
    <div onmouseover="estilosTarjeta('<?= $tarjeta->tar_id?>','<?= $tarjeta->tar_financiera ?>')"
        class="tarjetas-guardadas" id="estilos-tarjetas-<?= $tarjeta->tar_id ?>">
        <div class="infos-tarjetas" id="infos-tarjetas<?= $tarjeta->tar_id ?>" style="">
            <!-- acorta una cadena de caracteres a una parte en espesifico -->
            <p><b id="tarjeta-financiera<?= $tarjeta->tar_id?>"
                    value="<?= $tarjeta->tar_financiera ?>"><?= $tarjeta->tar_financiera ?></b> con terminación:
                <b><?php echo substr($tarjeta->tar_numtarjeta,15,20); ?></b>
            </p>
            <div id="expiracion-tar<?= $tarjeta->tar_id ?>">
                <?= $this->render('expiracion', compact('tarjeta')) ?>
            </div>
            <div>
                <!-- // TODO  Funcion que cambie de clases a contenedor oculto -- -->
                <button class="desplegar-tarjeta-info" id="desplegar-tarjeta-info<?= $tarjeta->tar_id ?>"
                    onclick="desplegar(<?= $tarjeta->tar_id ?>)">
                    <!-- //* ICONO DE DESPLIEGUE -- -->
                    <i class="fas fa-angle-down"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="mostrar" id="mostrar<?= $tarjeta->tar_id ?>">
        <!-- //! Se renderia la vista de informacion de la tarjeta -->
        <?= $this->render('info-tar', compact('tarjeta')) ?>
    </div>

    <!-- //! Se renderiza el modal cuandp es llamado -->
    <?= $this->render('editar', compact('tarjeta')) ?>
    <?php endforeach; ?>
    <!-- //TODO -------- Termina el ciclo -->
</div>