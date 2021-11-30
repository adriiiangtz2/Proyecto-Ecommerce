<!-- // ! Vista para agregar tarjetas de usuario, datos llegan por controlador -->
<?php
use app\models\Usuario;
use yii\bootstrap4\Html;
use app\models\CatFavorito;
use kartik\date\DatePicker;
use kartik\widgets\Select2;
use yii\widgets\MaskedInput;
use yii\bootstrap4\ActiveForm;
// hola
$producto= \app\models\CatFavorito::producto();
?>

<body class="body-tarjeta">
    <div class="contenedor-tarjeta">
        <div class="tarjet">
            <h3><b>TUS MÉTODOS DE PAGO GUARDADOS</b></h3>
            <P>MUESTRA MIS MÉTODOS DE PAGOS GUARDADOS EN EL PASO DEL PAGO</P>
            <!-- Tarjeta -->
            <section class="tarjeta" id="tarjeta">
                <div class="delantera" id="fondo-delantera-tar">
                    <div class="logo-marca" id="logo-marca">
                        <div class="img-logo-financiera" id="logo-financiera">

                        </div>
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
                                <p class="expiracion"><span class="mes">MM</span>
                                    <!-- / <span class="year">AA</span> -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="trasera">
                    <div class="barra-magnetica"></div>
                    <div class="datos">
                        <div class="grupo" id="firma">
                            <p class="label">Firma</p>
                            <div class="firma">
                                <p></p>
                            </div>
                        </div>
                        <div class="grupo" id="ccv">
                            <p class="label">CCV</p>
                            <p class="ccv"></p>
                        </div>
                    </div>
                    <p class="leyenda">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus
                        exercitationem, voluptates illo.</p>
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
                    <?= $form->field($model, 'tar_numtarjeta')->widget('yii\widgets\MaskedInput', [
                        'mask' => '9999 9999 9999 9999',
                        'options' => [
                            'id'=>"inputNumero",
                        ],
                    ]); ?>
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
					[   'prompt' => '',
                        'onclick'=>'seleccionarTarjeta()'
                    ]
					) ?>
                </div>
                <div class="grupo">
                    <?= $form->field($model, 'tar_tipo')->dropDownList(
							[
								'Debito' => 'Débito',
								'Credito' => 'Crédito',
								'Monedero' => 'Monedero',
							],
							['prompt' => ''],
                            
							) ?>
                </div>
                <div class="grupo">
                    <?php 
						$script = <<< JAVASCRIPT
							function (chrs, buffer, pos, strict, opts) {
								var valExp2 = new RegExp("(0[1-9]|1[0-2])");
								return valExp2.test(buffer[pos - 1] + chrs);
							}
JAVASCRIPT;
                    ?>
                    <?= $form->field($model, 'tar_expiracion')->widget(MaskedInput::classname(), [
						// 'mask' => 'md99',
						// 'mask' => 'm/99',
                        // 'clientOptions' => ['alias' =>  'date']
                        // 'clientOptions' => ['alias' =>  'mm/dd/yyyy']
						'mask' => 'm/j',
						'definitions' => [
							'm' => [
								'validator' => new \yii\web\JsExpression($script),
								'cardinality' => 2,
								'prevalidator' =>  [
									['validator' => '[01]', 'cardinality' => 1],
									['validator' => '[0-9]', 'cardinality' => 2],
								]		
							],
							// 'd' => [
							// 	'validator' => '[\/]',	
							// 	'cardinality' => 1,
							// ],
							'j' => [
								'validator' => '([0-9][0-9])',	
								'cardinality' => 2,
								'prevalidator' =>  [
									['validator' => '[0-9]', 'cardinality' => 1],
									['validator' => '[0-9]', 'cardinality' => 2],
								]
							],
						]
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
                        <!-- //! Funcion qu guarda la infor de las tarjetas  -->
                        <?= Html::button('Guardar', ['class' => 'btntarjeta2','onclick' => 'recargarTarjeta()',]) ?>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- MOSTRAR TARJETAS  MANDAMOS UN RENDER SOLAMENTE-->
        <div class=" tarjet tarjet-mostrar">
            <div class="d-flex" style="justify-content: space-around;align-items: center;">
                <b><?= Html::a('MIS TARJETAS',['cat-tarjeta/mostrar'],['class' => '']) ?></b>
            </div>
            <hr>
            <div id="idmostrar" class="contenedor-izq-tarjeta"
                style="height:376px;overflow-x:hidden;width:106%;padding:18px;">
                <!--  //! Se renderia la vista mostrar  -- -->
                <?= $this->render('mostrar') ?>
            </div>
            <br>
            <br>
            <div>
                <?= $this->render('/cat-favorito/prodescuento', compact('producto')) ?>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>