<?php

use yii\helpers\Html;
use app\models\Tienda;
use app\models\CatTipo;
use app\models\CatMarca;
use kartik\file\FileInput;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use kartik\rating\StarRating;
use yii\bootstrap4\ActiveForm;
use kartik\number\NumberControl;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">

        <div class="col-md-4">
            <?= $form->field($model, 'pro_nombre')->textInput(['maxlength' => true]) ?>
        </div>

        <?php /*<div class="col-md-4">
            <?= $form->field($model, 'pro_precio')->textInput(['maxlength' => true]) ?>
        </div>*/ ?>
        

        <div class="col-md-4">
            <?= $form->field($model, 'pro_precio')->widget(NumberControl::classname(), [
                'maskedInputOptions' => [
                    'prefix' => '$',
                    'allowMinus' => false
                ]
            ]) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, "pro_estrellas")->widget(StarRating::classname(), [
                'pluginOptions' => ['step' => 1,],
            ]);
            ?>

        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'pro_descuento')->textInput(['type' => 'number']); ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'descuentoCompra')->widget(NumberControl::classname(), [
                'disabled' => true,
                'maskedInputOptions' => [
                    'prefix' => '$',
                    'allowMinus' => false
                ]
            ]) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'pro_fecha')->widget(
                DatePicker::className(),
                [
                    //'name' => 'dp_1',
                    'type' => DatePicker::TYPE_INPUT,
                    'value' => date('Y-m-d'),
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]
            ); ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'pro_dimensiones')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'pro_estatus')->dropDownList(['Agotado' => 'Agotado', 'Disponible' => 'Disponible',], ['prompt' => '']) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'pro_color')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'pro_fkmarca')->widget(Select2::classname(), [
                'data' => CatMarca::getmap(),
                'language' => 'es-ES',
                'options' => ['placeholder' => 'Selecciona un Tipo ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <div class="div col-md-4">
            <?= $form->field($model, 'pro_fktienda')->widget(Select2::classname(), [
                'data' => Tienda::map(),
                'language' => 'es-ES',
                'options' => ['placeholder' => 'Selecciona un Tipo ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <div class="div col-md-4">
            <?= $form->field($model, 'pro_fktipo')->widget(Select2::classname(), [
                'data' => CatTipo::getmap(),
                'language' => 'es-ES',
                'options' => ['placeholder' => 'Selecciona un Tipo ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'pro_descripcion')->textarea(['rows' => 16]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'img')->widget(FileInput::classname(), [
                'options'       => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'allowedFileExtensions'  => ['jpg', 'gif', 'png'],
                    'initialPreview'         => [$model->url],
                    'initialPreviewAsData'   => true,
                    'maxFileCount' => '5',
                ],
            ]); ?>
        </div>
    </div>

    <?php /*$form->field($model, 'pro_fecha')->textInput()*/ ?>

    <?php /*$form->field($model, 'pro_imagen')->textInput(['maxlength' => true])*/ ?>

    <?php /*$form->field($model, 'pro_fktipo')->textInput()*/ ?>

    <?php /*$form->field($model, 'pro_fkmarca')->textInput()*/ ?>

    <?php /*$form->field($model, 'pro_fktienda')->textInput()*/ ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$js = <<<JAVASCRIPT
    $("#producto-pro_descuento").on('change', function(e){
        //console.log($("#producto-pro_precio").val().replace(/[$,]/g,'') * (100 - $("#producto-pro_descuento").val()));
        $("#producto-descuentocompra-disp").val($("#producto-pro_precio").val().replace(/[$,]/g,'') * (100 - $("#producto-pro_descuento").val()) / 100);
    });
JAVASCRIPT;
$this->registerJs($js);
?>