<?php

use yii\widgets\ListView;

?>
<!-- tittle -->
<?= $this->render('/layouts/usuario/header') ?>
<div class="small-container">

    <div class="row row-2">
    </div>

    <div class="categories">
        <h1>Productos</h1>
        <?= $this->render('filtro', compact('model')) ?>
        <div class="small-container">
            <div class="filas">
                <?=
                ListView::widget([
                    'dataProvider' => $dataProvider,
                    'options' => [
                        'tag' => 'div',
                        'class' => 'row',
                        'id' => 'list-wrapper',
                    ],
                    'itemView' => 'productoitem',
                    'itemOptions' => [
                        'tag' => false,
                    ],
                    'layout' => "<div class='col-md-12'>{summary}</div>{items}<div class='col-md-12'>{pager}</div>",
                ]);
                ?>

            </div>
        </div>
    </div>