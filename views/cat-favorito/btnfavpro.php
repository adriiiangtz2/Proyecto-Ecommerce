<?php
use yii\helpers\Html;
use app\models\CatFavorito;
use yii\widgets\ActiveForm;

$proid = $productos->pro_id;
$estado = CatFavorito::estado($proid);
$es = $estado == 1;
?>
<div class="cat-favorito-form">
    <?php $form = ActiveForm::begin(); ?>
   
 <?= Html::button(' ', [
     'id' => 'icon-fav' . $productos->pro_id . '',
     'onclick' => 'favoritoIcon(' . $productos->pro_id . ')',
     'class' => 'botonfavorito ' . ($es ? 'fas fa-heart' : 'far fa-heart'),
 ]) ?>
 
 <?php ActiveForm::end(); ?>
</div>
<!-- <button class="botonfavorito"><i class="fas fa-heart"> hola</i></button> -->
