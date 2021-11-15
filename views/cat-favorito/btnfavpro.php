<!-- // ! Boton de la vista de productos , datos llegan por compact -->
<?php
use yii\helpers\Html;
use app\models\CatFavorito;
use yii\widgets\ActiveForm;
/* // ? variable que giarda el id del producto */
$proid = $productos->pro_id;
/* //* Le mandamos el id para que haga la consulta en el modelo favorito y guardar el return */
$estado = CatFavorito::estado($proid);
/* // * vendra 0 o 1 este se compara y solo si es igual se cambia de clases al boton */
$es = $estado == 1;
?>
<div class="cat-favorito-form" style="position: absolute;top: 10px;right: 6%;font-size: 10px;">
    <?php $form = ActiveForm::begin(); ?>
    <!-- // * Se le asigna una id al boton para diferencias en el ciclo -- -->
    <?= Html::button(' ', [
        'id' => 'icon-fav' . $productos->pro_id . '',
        'onclick' => 'favoritoIcon(' . $productos->pro_id . ',' . $estado . ')',
        'style' => 'font-size:19px; color:#ca2020;',
        'class' => 'botonfavorito ' . ($es ? 'fas fa-heart' : 'far fa-heart'),
    ]) ?>
    <?php ActiveForm::end(); ?>
</div>