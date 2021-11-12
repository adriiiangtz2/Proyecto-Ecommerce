<?php

use kartik\widgets\DatePicker;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use app\models\Usuario;
//use kartik\select2\Select2;
use yii\bootstrap4\Html;
use kartik\depdrop\DepDrop;

?>
<!-- MODEL EMERGENTE BOOSTRAP -->
<div id="ventana-modal<?= $domicilio->dom_id ?>" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#9da2cc3b;">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar tu dumicilio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" id="modal-body-editar">
        <!-- CONTENIDO PRINCIPAL -->
        <div class="row" style="height:200px">


          <div class="Registrar-domicilio">

            <?php $form = ActiveForm::begin(); ?>
            <form id="contactForm" name="contactform" data-toggle="validator" class="popup-form">
              <div class="row">
                <div id="msgContactSubmit" class="hidden"></div>

                <div class="form-group col-sm-6">
                  <div class="help-block with-errors"></div>
                  <?= $form->field($domicilio, 'dom_fkcp')->textInput(['id' => 'dom_cp']) ?>
                  <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                </div><!-- end form-group -->


                <div class="form-group col-sm-6">
                  <div class="help-block with-errors"></div>
                  <?= $form->field($domicilio, 'dom_colonia')->widget(DepDrop::classname(), [
                    'options' => ['id' => 'dom_colonia'],
                    'pluginOptions' => [
                      'depends' => ['dom_cp'],
                      'placeholder' => 'Selecciona la colonia',
                      'url' => Url::to(['/domicilio/cp'])
                    ]
                  ]); ?>
                  <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                </div><!-- end form-group -->

                <div class="form-group col-sm-6">
                  <div class="help-block with-errors"></div>
                  <?= $form->field($domicilio, 'dom_ciudad')->textarea(['rows' => 6]) ?>
                  <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                </div><!-- end form-group -->
                <div class="form-group col-sm-6">
                  <div class="help-block with-errors"></div>
                  <?= $form->field($domicilio, 'dom_calle')->textarea(['rows' => 6]) ?>
                  <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                </div><!-- end form-group -->

                <div class="form-group col-sm-6">
                  <div class="help-block with-errors"></div>
                  <?= $form->field($domicilio, 'dom_numExt')->textInput(['maxlength' => true]) ?>

                  <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                </div><!-- end form-group -->

                <div class="form-group col-sm-6">
                  <div class="help-block with-errors"></div>
                  <?= $form->field($domicilio, 'dom_numInt')->textInput(['maxlength' => true]) ?>
                  <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                </div><!-- end form-group -->

                <div class="form-group col-sm-6">
                  <div class="help-block with-errors"></div>
                  <?= $form->field($domicilio, 'dom_telefono')->textInput(['maxlength' => true]) ?>
                  <!--<div class="input-group-icon"><i class="fa fa-user"></i></div>-->
                </div><!-- end form-group -->

              </div>
              <?php ActiveForm::end(); ?>
          </div>
        </div>
        <!-- TERMINA CONTENIDO PRINCIPAL -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="editarTarjeta(<?= $domicilio->dom_id ?>)">Guardar</button>
      </div>
    </div>
  </div>
  <script src="js/domicilio.js"></script>
</div>