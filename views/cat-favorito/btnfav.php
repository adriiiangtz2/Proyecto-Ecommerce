<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
// $tipo = $seguido->seg_estado;
// $sigues = $tipo == 1;
?>
<div class="cat-favorito-form">
    <?php $form = ActiveForm::begin(); ?>
         <!-- $form->field($favoritos, 'seg_fkdivision')->hiddenInput()->label(false);  -->
        <?= $form->field($favoritos, 'fav_estado')->hiddenInput(['value' => 0])->label(false); ?>
        <?= Html::button( ' ', ['onclick' => 'favoritos(' . $favoritos->fav_id . ')', 'class' => 'botonfavorito fas fa-heart']); ?>
        
        <?php ActiveForm::end(); ?>
</div>

<!-- <button class="botonfavorito"><i id="icon-fav" onclick="favoritos()" class="far fa-heart"></i></button> -->

<!-- <button class="botonfavorito"><i class="fas fa-heart"> hola</i></button> -->
