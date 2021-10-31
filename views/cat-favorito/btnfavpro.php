<?php
use yii\helpers\Html;
use app\models\CatFavorito;
use yii\widgets\ActiveForm;

$proid = $productos->pro_id;
$estado = CatFavorito::estado($proid);
$es = $estado == 1;
?>
<div class="cat-favorito-form" style="
    position: absolute;
    top: 10px;
    right: 6%;
    font-size: 10px;
">
    <?php $form = ActiveForm::begin(); ?>
   
 <?= Html::button(' ', [
     'id' => 'icon-fav' . $productos->pro_id . '',
     'onclick' => 'favoritoIcon(' . $productos->pro_id .','.$estado. ')','style'=>'font-size:19px; color:#ca2020;',/* se le agrega color al boton */
     'class' => 'botonfavorito ' . ($es ? 'fas fa-heart' : 'far fa-heart'),
 ]) ?>
 
 <?php ActiveForm::end(); ?>
</div>
<!-- <button class="botonfavorito"><i class="fas fa-heart"> hola</i></button> -->
