<!-- //! Vista que contiene las tarjetas guardadas , datos llegan por funcion -->
<!-- //! S renderiza a registrae -->
<?php
use yii\bootstrap4\Html; ?>
<div class="" id="idtarjeta">
	<!-- //TODO -------- Empieza el ciclo , contiene las tajetas del usuario ------- -->
	<?php foreach (\app\models\CatTarjeta::tarjeta() as $tarjeta): ?>
		<div class="tarjetas-guardadas">
			<div class="infos-tarjetas" id="infos-tarjetas<?= $tarjeta->tar_id ?>">
			<!-- acorta una cadena de caracteres a una parte en espesifico -->
			<p><b><?= $tarjeta->tar_financiera ?></b>   con terminación: <b><?php echo substr($tarjeta->tar_numtarjeta,12,16); ?></b></p>
			<p class="expira-fin"><b><?= $tarjeta->tar_expiracion ?></b></p>
			<div>
				<!-- // TODO  Funcion que cambie de clases a contenedor oculto -- -->
				<button class="desplegar-tarjeta-info" id="desplegar-tarjeta-info<?= $tarjeta->tar_id ?>" onclick="desplegar(<?= $tarjeta->tar_id ?>)" >
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
<script src="js/tarjeta.js"></script>