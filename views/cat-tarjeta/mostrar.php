<?php
use yii\bootstrap4\Html; ?>
<div class="" id="idtarjeta">
	<?php foreach (\app\models\CatTarjeta::tarjeta() as $tarjeta): ?>
		<!-- incia -->
		<div class="tarjetas-guardadas">
			<!-- inicia -->
			<div class="infos-tarjetas" id="infos-tarjetas<?= $tarjeta->tar_id ?>">
			<!-- acorta una cadena de caracteres a una parte en espesifico -->
			<p><b><?= $tarjeta->tar_financiera ?></b>   con terminacion: <b><?php echo substr($tarjeta->tar_numtarjeta,12,16); ?></b></p>
			<p class="expira-fin"><b><?= $tarjeta->tar_expiracion ?></b></p>
			<!-- inicia -->
			<div>
				<!-- FUNCION QUE CAMBIE DE CLASES A CONTENEDOR OCULTO -->
				<button class="desplegar-tarjeta-info" id="desplegar-tarjeta-info<?= $tarjeta->tar_id ?>" onclick="desplegar(<?= $tarjeta->tar_id ?>)" >
				<!-- ICONO DE DESPLIEGUE -->
				<i class="fas fa-angle-down"></i>
			</button>	
			<div class="mostrar" id="mostrar<?= $tarjeta->tar_id ?>">
			<div class="infor-desplagado"style="display:flex; justify-content:space-between;">
			<div >
				<!-- trae el nombre completo de el modelo usuario -->
				<p><b>Nombre en la tarjeta:</b> <br> <?= $tarjeta->tar_nombre ?></p>
				<p><b>Tipo:</b> <br> <?= $tarjeta->tar_tipo ?></p>
				<p><b>Entidad F. :</b> <br> <?= $tarjeta->tar_financiera ?></p>
				<p><b>Expiracion:</b> <br> <?= $tarjeta->tar_expiracion ?></p>
			</div>
			<div>
				<p><b>Direccion de facturacion:</b></p>
				<p>Traer datos de la tabla domicilio</p>
				<!-- VENTANA EMERGENTE MODAL EL ID BTN SOLO DIFERENCIA LOS BOTONES, LA FUNCION SI SE USA EN JS -->
			</div>
			<!-- termina -->
			<!-- FUNCION QUE EDITA -->
			<button type="button" class="editar-btn-tarjeta" data-toggle="modal" data-target="#exampleModal" id="btn-modal<?= $tarjeta->tar_id ?>" onclick="modal(<?= $tarjeta->tar_id ?>)">
			Editar
			<i class="far fa-edit"></i>
		</button>
		<!-- FUNCION QUE ELIMINA -->
		<button class="eliminar-btn-tarjeta"id="eliminar-tarjeta<?= $tarjeta->tar_id ?> "onclick="eliminar(<?= $tarjeta->tar_id ?>)">
		Eliminar
		<!-- ICONO DE CLOSE -->
		<i class="fas fa-window-close"></i>
	</button>
</div>
</div>
</div>
<!-- inicia -->
</div>
<!-- termina -->
<!-- <div action="" id="formulario-tarjeta-mostrar" class="formulario-tarjeta-mostrar">
</div> -->
</div>
<!-- termina -->
<!-- PERMANECE OCULTA HASTA QUE LA FUNCION MODEL SE EJECUTA -->
<?= $this->render('editar', compact('tarjeta')) ?>  
<?php endforeach; ?>	
</div>
<script src="js/tarjeta.js"></script>