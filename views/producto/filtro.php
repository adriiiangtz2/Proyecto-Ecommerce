<?php

use app\models\CatTipo;
use app\models\CatMarca;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;

?>

<div class="produc-form product">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'marca')->widget(Select2::classname(), [
                'data' => CatMarca::getmap(),
                'language' => 'es',
                'options' => ['placeholder' => 'Seleccione una marca'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'tipo')->widget(Select2::classname(), [
                'data' => CatTipo::getmap(),
                'language' => 'es',
                'options' => ['placeholder' => 'Seleccione una tipo'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>