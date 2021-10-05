<?php

use yii\helpers\Html;
use app\models\CatEstados;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatMunicipios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-municipios-form">



    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col">
             <?= $form->field($model, 'mun_id')->textInput() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'mun_fkestado')->widget(Select2::classname(), [
        'data' =>CatEstados::getMap4(),
        'language' => 'es',
        'options' => ['placeholder' => 'selecciona el estado ...'],
        'pluginOptions' => [
        'allowClear' => true
    ],
    ]);?>
        </div>
        <div class="col">
                <?= $form->field($model, 'mun_municipio')->textInput(['maxlength' => true]) ?>

        </div>
        </div>
        
    </div>
    <div class="form-group">
        <?= Html::submitButton('guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

