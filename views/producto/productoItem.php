<?

use yii\helpers\Html;

?>

<div id="contendor-fav<?= $productos->pro_id ?>" class="colum-4 columm4">
    <div id="lds-facebook_<?= $productos->pro_id ?>" class="">
        <?= Html::a(Html::img("/img/producto/{$model->pro_imagen}", ['class' => 'logo', 'style' => 'width: 100%;']), ['']) ?>
    </div>
    <!-- //! Boton que manda a vista de producto/detalles  -->
    <!--  //TODO estructura de etiqueta (a) y dentro etiqueta (img)  -->

    <!--  // TODO  incia la condicional interno ------- -->
    <!--  // ! Inicia renderizado del boton -------------------- -->
    <?= $this->render('/cat-favorito/btnfavpro', ['productos' => $model]) ?>
    <!-- // ! Termina renderizado del boton ---------------------->
    <div class="contenedor-card-foter">
        <p style="margin:0;"> <?= Html::encode("{$model->pro_nombre}")  ?></p>
        <p style="margin:0;"> <?= Html::encode("{$model->pro_color}") ?> </p>
        <p style="margin:0;"> <?= Html::encode("{$model->pro_precio}") ?> </p>
        <?= Html::a('Ver más <i class="fas fa-caret-down"></i>', ['/producto/detalles/', 'id' => $model->pro_id], ['class' => 'profile-link']) ?>
    </div>
    <!--  // ?-- Inicia apartado para estrellas ----->
    <div class="rating">
        <p style="margin:0;"> <?= $this->render('star', (['producto' => $model])) ?> </p>
    </div>
    <!--  // ?-- Termina apartado para estrellas -- -->
</div>