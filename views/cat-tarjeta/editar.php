<!-- //! MODAL para editar las tarjetas, los datos lleagn por compact -->
<!-- //! Se renderiza en mostrar -->
<?php 
use yii\widgets\MaskedInput;
use kartik\widgets\DatePicker;
use yii\bootstrap4\ActiveForm;
?>
<!-- MODEL EMERGENTE BOOSTRAP -->
<div id="ventana-modal<?= $tarjeta->tar_id ?>" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#9da2cc3b;">
                <h5 class="modal-title" id="exampleModalLongTitle">Editar metodo de pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body-editar<?= $tarjeta->tar_id ?>" style="border:1px dashed;">
                <!-- CONTENIDO PRINCIPAL -->
                <div class="row" style="height:200px">
                    <div class="col-md-4 color-blanco">
                        <p><b>Metodo de pago:</b><br>
                        <p><b><?= $tarjeta->tar_financiera ?></b> con terminacion:
                            <b><?php echo substr($tarjeta->tar_numtarjeta,15,20); ?></b>
                        </p>
                    </div>

                    <?php $form = ActiveForm::begin(); ?>
                    <div class="row color-blanco">
                        <div class="col-md-6">
                            <b><?= $form->field($tarjeta, 'tar_nombre')->textInput(['maxlength' => true ,'id' => "inputNom_{$tarjeta->tar_id}"]) ?></b>
                        </div>
                        <div class="col-md-6">
                            <b>
                                <?php 
						$script = <<< JAVASCRIPT
							function (chrs, buffer, pos, strict, opts) {
								var valExp2 = new RegExp("(0[1-9]|1[0-2])");
								return valExp2.test(buffer[pos - 1] + chrs);
							}
JAVASCRIPT;
                    ?>
                                <?= $form->field($tarjeta, 'tar_expiracion')->widget(MaskedInput::classname(), [
						// 'mask' => 'md99',
						// 'mask' => 'm/99',
						'mask' => 'm/j',
                        'options' => [
                            'id'=>"expiracion_{$tarjeta->tar_id}",
                            
                        ],
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
                            </b>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <!-- TERMINA CONTENIDO PRINCIPAL -->
            </div>
            <div class="modal-footer">
                <button type="button" class="editar-btn-tarjeta" data-dismiss="modal">Cerrar <i
                        class="fas fa-window-close"></i></button>
                <button type="button" class="eliminar-btn-tarjeta"
                    onclick="editarUniontarjeta(<?= $tarjeta->tar_id ?>)">Guardar <i class="far fa-save"></i></button>
            </div>
        </div>
    </div>
    <script src="js/tarjeta.js"></script>
</div>