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
      <div class="row" style="height:200px">
      <div class="col-md-6">
        <p><b>Editar Nombre:</b><br>
        <p><b></b></p>
      </div>

      <?php $form = ActiveForm::begin(); ?>
      <div class="row">
          <div class="col-md-6">
            <p><b>Editar nacimiento:</b><br>
         <b></b> 
        </div>
        <div class="col-md-6">
            <p><b>Editar genero:</b><br>
        <b>  </b>
        </div>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
    <!-- TERMINA CONTENIDO PRINCIPAL -->
  </div>
  <div class="modal-footer">
    <button type="button" class="editar-btn-tarjeta" data-dismiss="modal">Cerrar <i class="fas fa-window-close"></i></button>
    <button type="button" class="eliminar-btn-tarjeta" onclick="editarTarjeta()">Guardar <i class="far fa-save"></i></button>
  </div>
</div>
</div>
<script src="js/tarjeta.js"></script>
</div>