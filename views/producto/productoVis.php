<?php

use yii\widgets\ListView;

?>
<!-- tittle -->
<?= $this->render('/layouts/usuario/header') ?>
<div class="small-container">

    <div class="row row-2">
        <h2>Todos Los Productos</h2>
        <select>
            <option>Mujeres</option>
            <option>Hombres</option>
            <option>Niños</option>
            <option>Niñas</option>
            <option>Bebés</option>
        </select>
    </div>

    <div class="categories">
        <h1>Productos</h1>
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
                    'itemView' => 'producto_item',
                    'itemOptions' => [
                        'tag' => false,
                        /*'class' => 'col-lg-4',*/
                    ],
                    'layout' => "<div class='col-md-12'>{summary}</div>{items}<div class='col-md-12'>{pager}</div>",
                ]);
                ?>

            </div>
        </div>
    </div>