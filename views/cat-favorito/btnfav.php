<?php
use yii\helpers\Html;
use app\models\CatFavorito;
use yii\widgets\ActiveForm;
//esta funcion trar el valor del estado 
$estado = CatFavorito::estado($proid);
?>
<div class="cat-favorito-form">
    <!-- ###### incial el active form ######-->
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($favoritos, 'fav_estado')->hiddenInput(['value' => 0])->label(false); ?>
    <?= Html::button( ' ', ['onclick' => 'favoritos(' . $favoritos->fav_id .','.$estado. ')', 'class' => 'botonfavorito fas fa-heart','id' => 'icon-fav1' . $favoritos->fav_id . '','style'=>'font-size:19px;color:#ca2020;',"data-id"=>$favoritos->fav_id]); ?>
      <!-- ###### Termina el active form ######-->
    <?php ActiveForm::end(); ?>
</div>

