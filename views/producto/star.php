<?php

use kartik\rating\StarRating;
use yii\bootstrap4\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($producto, "pro_estrellas")->widget(StarRating::classname(), [
    'pluginOptions' => ['step' => 0.1,],
    'options' => ['id' => "pro_estrellas" . $producto->pro_id]
]);
?>
<?php ActiveForm::end(); ?>