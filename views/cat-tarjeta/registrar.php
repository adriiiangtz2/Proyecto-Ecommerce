<?php

use app\models\Usuario;
use yii\bootstrap4\Html;
use app\models\CatFavorito;
use kartik\date\DatePicker;
use kartik\widgets\Select2;
use yii\bootstrap4\ActiveForm;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Formulario de Tarjeta de Crédito Dinámico</title>
	<link href="https://fonts.googleapis.com/css?family=Lato|Liu+Jian+Mao+Cao&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body class="body-tarjeta">
	<div class="contenedor-tarjeta">
		<div class="tarjet">
			<!-- Tarjeta -->
			<section class="tarjeta" id="tarjeta">
				<div class="delantera">
					<div class="logo-marca" id="logo-marca">
						<?= Html::img('/img/tarjeta/logos/visa.png') ?>
					</div>
					<img src="/img/tarjeta/chip-tarjeta.png" class="chip" alt="">
					<div class="datos">
						<div class="grupo" id="numero">
							<p class="label">Número Tarjeta</p>
							<p class="numero">#### #### #### ####</p>
					</div>
					<div class="flexbox">
						<div class="grupo" id="nombre">
							<p class="label">Nombre Tarjeta</p>
							<p class="nombre">Nombre</p>
						</div>

						<div class="grupo" id="expiracion">
							<p class="label">Expiracion</p>
							<p class="expiracion"><span class="mes">MM</span> <!-- / <span class="year">AA</span> --></p>
						</div>
					</div>
				</div>
			</div>

			<div class="trasera">
				<div class="barra-magnetica"></div>
				<div class="datos">
					<div class="grupo" id="firma">
						<p class="label">Firma</p>
						<div class="firma"><p></p></div>
					</div>
					<div class="grupo" id="ccv">
						<p class="label">CCV</p>
						<p class="ccv"></p>
					</div>
				</div>
				<p class="leyenda">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus exercitationem, voluptates illo.</p>
				<a href="#" class="link-banco">www.tubanco.com</a>
			</div>
		</section>

		<!-- Contenedor Boton Abrir Formulario -->
		<div class="contenedor-btn">
			<button class="btn-abrir-formulario" id="btn-abrir-formulario">
				<i class="fas fa-plus"></i>
			</button>
		</div>
		<!-- Formulario -->
		
		<div action="" id="formulario-tarjeta" class="formulario-tarjeta">
			<?php $form = ActiveForm::begin(['id' => 'formulariot']); ?>
			
			<div class="grupo">
				<?= $form->field($model, 'tar_numtarjeta')->textInput(['maxlength' => true, 'id' => 'inputNumero']) ?>
			</div>
			<div class="grupo">
				<?= $form->field($model, 'tar_nombre')->textInput(['maxlength' => true, 'id' => 'inputNombre']) ?>
			</div>
			<div class="grupo">
				<?= $form->field($model, 'tar_financiera')->dropDownList(
					[
						'Mastercard' => 'Mastercard',
						'Visa' => 'Visa',
						'American Express' => 'American Express',
					],
					['prompt' => '']
					) ?>
					</div>
					
					<div class="grupo">
						<?= $form->field($model, 'tar_tipo')->dropDownList(
							[
								'Debito' => 'Debito',
								'Credito' => 'Credito',
								'Monedero' => 'Monedero',
							],
							['prompt' => '']
							) ?>
							</div>
							
							<div class="grupo">
								<?= $form->field($model, 'tar_expiracion')->widget(DatePicker::className(), [
									'type' => DatePicker::TYPE_INPUT,
									'value' => date('Y-m'),
									'pluginOptions' => [
										'autoclose' => true,
										'format' => 'mm/yy',
									],
									]) ?>
									</div>
									<div class="flexbox">
										<div class="grupo expira">	
											<div class="flexbox">

											</div>
										</div>
									</div>
									<!-- <button type="submit" class="btn-enviar">Enviar</button> -->
									<div class="row justify-content-center">
										<div class="form-group">
											<?= Html::button('Guardar', ['class' => 'btntarjeta2','onclick' => 'recargarTarjeta()',]) ?>
											<?php ActiveForm::end(); ?>
										</div>
									</div>
								</div>
							</div>
							<!-- MOSTRAR TARJETAS  MANDAMOS UN RENDER SOLAMENTE-->
							<div class=" tarjet tarjet-mostrar">
									<div class="d-flex" style="justify-content: space-around;align-items: center;">
									<p>Tus métodos de pago guardados</p>
									<?= Html::a('Mis Tarjetas',['cat-tarjeta/mostrar'],['class' => 'btnMostrarTj']) ?>
									
								</div>
								<hr>
								<!-- SE RENDERIZA LA VISTA REGISTRAR -->
								<div  id="idmostrar" class="contenedor-izq-tarjeta" style="height:376px;overflow-x:hidden;width:106%;padding:18px;">
								<?= $this->render('mostrar') ?>  
							</div> 
							
						</div>
						<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
					</body>
					</html>

