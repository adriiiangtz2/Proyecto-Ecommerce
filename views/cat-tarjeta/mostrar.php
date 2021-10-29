<?php 
use yii\bootstrap4\Html;
?>
<div class="" id="idtarjeta">


<?php foreach (\app\models\CatTarjeta::tarjeta() as $tarjeta): ?>
<!-- incia -->
<div class="tarjetas-guardadas">
	<!-- inicia -->
	<div class="infos-tarjetas" id="infos-tarjetas<?=$tarjeta->tar_id?>">
       <!-- acorta una cadena de caracteres a una parte en espesifico -->
		<p><b><?= $tarjeta->tar_financiera ?></b>   con terminacion: <b><?php echo substr($tarjeta->tar_numtarjeta,12,16); ?></b></p>
		<p class="expira-fin"><b><?=$tarjeta->tar_expiracion ?></b></p>
		<!-- inicia -->
		<div>
			<button class="desplegar-tarjeta-info" id="desplegar-tarjeta-info<?=$tarjeta->tar_id?>" onclick="desplegar(<?=$tarjeta->tar_id?>)" >
				<i class="fas fa-angle-down"></i>
			</button>	
			<div class="mostrar" id="mostrar<?=$tarjeta->tar_id?>">
				<div class="infor-desplagado"style="display:flex; justify-content:space-between;">
					<div >
						<!-- trae el nombre completo de el modelo usuario -->
						<p><b>Nombre en la tarjeta:</b> <br> <?=$tarjeta->tarFkusuario->getNombreCompleto()?></p>
						<p><b>Tipo:</b> <br> <?=$tarjeta->tar_tipo?></p>
						<p><b>Entidad F. :</b> <br> <?=$tarjeta->tar_financiera?></p>
						<p><b>Expiracion:</b> <br> <?=$tarjeta->tar_expiracion?></p>
					</div>
					<div>
					<p><b>Direccion de facturacion:</b></p>
					<p>Traer datos de la tabla domicilio</p>
						
					</div>
				</div>
			</div>
			<!-- inicia -->
		</div>
		<!-- termina -->
	</div>
<!-- termina -->
	
<!-- <div action="" id="formulario-tarjeta-mostrar" class="formulario-tarjeta-mostrar">
		   <h3>HOLAAAA</h3>
		</div> -->
</div>
<!-- termina -->
<?php endforeach; ?>	
</div>

		<script src="js/tarjeta.js"></script>