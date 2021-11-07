<?php
use yii\bootstrap4\Html; ?>
<div class="" id="idtarjeta">

<?php
        if (!empty(\app\models\CatTarjeta::tarjeta())):
        foreach (\app\models\CatTarjeta::tarjeta() as $tarjeta): ?>
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
				
</div>
<!-- inicia -->
</div>
<!-- termina -->
<!-- <div action="" id="formulario-tarjeta-mostrar" class="formulario-tarjeta-mostrar">
</div> -->
</div>
<div class="mostrar" id="mostrar<?= $tarjeta->tar_id ?>">
				<?= $this->render('info-tar', compact('tarjeta')) ?> 
			</div>
<!-- termina -->
<!-- PERMANECE OCULTA HASTA QUE LA FUNCION MODEL SE EJECUTA -->
<?= $this->render('editar', compact('tarjeta')) ?>  
</div>
<?php endforeach;
            
		else: ?>
		<div  style="width:auto;height:250px;display: flex;align-items: center;text-aling:center;">
			<p><b>GUARDA TUS FORMAS DE PAGO</b></p>
		</div>
<?php  endif?>
<script src="js/tarjeta.js"></script>