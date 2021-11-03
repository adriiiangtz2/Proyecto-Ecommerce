<?php 
use kartik\widgets\DatePicker;
use yii\bootstrap4\ActiveForm;

?>
<!-- MODEL EMERGENTE BOOSTRAP -->
<div id="ventana-modal<?= $tarjeta->tar_id ?>" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header"style="background-color:#9da2cc3b;">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar metodo de pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
    <div class="modal-body">
      <!-- CONTENIDO PRINCIPAL -->
      <div class="row" style="height:200px">
      <div class="col-md-4">
        <p><b>Metodo de pago:</b> <br>
        <p><b><?= $tarjeta->tar_financiera ?></b>   con terminacion: <b><?php echo substr($tarjeta->tar_numtarjeta,12,16); ?></b></p>
      </div>

      <?php $form = ActiveForm::begin(); ?>
      <div class="row">
        <div class="col-md-6">
          <?= $form->field($tarjeta, 'tar_nombre')->textInput(['maxlength' => true ,'id' => "inputNom_{$tarjeta->tar_id}"]) ?>
        </div>
        <div class="col-md-6">
          <?= $form->field($tarjeta, 'tar_expiracion')->widget(DatePicker::className(), [
            'type' => DatePicker::TYPE_INPUT,
            'value' => date('Y-m'),
            'options'=>[
            'id'=>"expiracion_{$tarjeta->tar_id}",
          ],
          'pluginOptions' => [
          'autoclose' => true,
          'format' => 'mm/yy',
        ],
        ]) ?>
        </div>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
    <!-- TERMINA CONTENIDO PRINCIPAL -->
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Guardar</button>
  </div>
</div>
</div>
</div>