<!-- // ! Vista Modal bootstrap4 Se renderiza en informacion -->
<?php 
use kartik\widgets\DatePicker;
use yii\bootstrap4\ActiveForm;

?>
<!-- MODEL EMERGENTE BOOSTRAP -->
<div id="ventana-modalusu<?= $usuario->usu_id ?>" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header"style="background-color:#9da2cc3b;">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>EDITAR DATOS</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
    <div class="modal-body" id="modal-body-editar" style="border:1px dashed;">
      <!-- CONTENIDO PRINCIPAL -->
      <?php $form = ActiveForm::begin(); ?>
      <div class="row">  
      <div class="col-md-3">
       <!--  // ! Datos llegan por compact  -->
       <!--  // * se les asigna una id a cada input para editar -->
            <p><b> <?= $form->field($usuario, 'usu_nombre')->textInput(['maxlength' => true, 'id' => 'usu-nombre']) ?></b></p>
          </div>
         <div class="col-md-3">
         <p><b> <?= $form->field($usuario, 'usu_paterno')->textInput(['maxlength' => true, 'id' => 'usu-paterno']) ?></b></p>
        </div>
        <div class="col-md-3">
        <p><b><?= $form->field($usuario, 'usu_materno')->textInput(['maxlength' => true, 'id' => 'usu-materno']) ?></b></p>
        </div>
      </div>
      <?php ActiveForm::end(); ?>
    <!-- TERMINA CONTENIDO PRINCIPAL -->
  </div>
  <div class="modal-footer">
    <button type="button" class="editar-btn-tarjeta" data-dismiss="modal">Cerrar <i class="fas fa-window-close"></i></button>
   <!--  // * Se anda el id para proceso de editadon -->
    <button type="button" class="eliminar-btn-tarjeta" onclick="editarUnion(<?= $usuario->usu_id ?>)">Guardar <i class="far fa-save"></i></button>
  </div>
</div>
</div>
<script src="js/tarjeta.js"></script>
</div>
