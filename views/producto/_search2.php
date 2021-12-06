<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
/* // TODO se crean objetos los cuales tendran 3 parametros ,Nombre,Url,Img,Info, se usa en ciclo de line 18 */
$fil = [
    (object)['nombre'  => 'NOMBRE',    'idbtn'  =>   'btn-filro-4', 'idjs'   =>  '4',   'idfil'   => 'filtros-4', 'nomfil'  => 'pro_nombre', 'holder'        => 'Escribe el Nombre',],
    // (object)['nombre'  => 'MARCA',     'idbtn'  =>   'btn-filro-5', 'idjs'   =>  '5',   'idfil'   => 'filtros-5', 'nomfil'  => 'marca',      'holder'        => 'Escribe la Marcas',],
    //(object)['nombre'  => 'TIPO',   'idbtn'     =>   'btn-filro-6', 'idjs'   =>  '6',   'idfil'   => 'filtros-6', 'nomfil'  => 'tipo',       'holder'      => 'Escribe el Tipo',  ],
    //(object)['nombre'  => 'TIENDA',   'idbtn'   =>   'btn-filro-3', 'idjs'   =>  '3',   'idfil'   => 'filtros-3', 'nomfil'  => 'tienda',     'holder'      => 'Escribe la Tienda',],
];
?>

<div class="producto-search">

    <div style="">
        <!-- //TODO ORDENAR POR MAYOR Y MENOR -->
        <div class="d-flex contenedor-filtro" style="justify-content: space-between; padding: 5px 15px;">
            <div>
                ORDENAR POR
            </div>
            <div>
                <button id="btn-filro-1" class="desplegar-producto-filtro" onclick="mostrarfiltro(1)">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
        <!-- Contenedor Oculto -->
        <?php $form = ActiveForm::begin([
            'action' => ['producto/productos'],
            'method' => 'get',
        ]); ?>
        <div id="filtros-1" class="mostrar-filtro">

            <?= $form->field($model, 'menorPrecio')->textInput(['placeholder' => '$......', 'class' => "input-filtros"]) ?>

            <?= $form->field($model, 'mayorPrecio')->textInput(['placeholder' => '$......', 'class' => "input-filtros"]) ?>
            <div class="contenedor-filtro-btn">
                <?= Html::submitButton('Buscar', ['class' => 'editar-btn-tarjeta']) ?>
            </div>
            <hr>
            <div>
                <?= Html::a('Ascendente',        ['productos', 'orden'          => '1']) ?><br>
                <?= Html::a('Descendente',       ['productos', 'orden'          => '2']) ?><br>
                <?= Html::a('Más de 1000',       ['productos', 'producto'       => '4']) ?><br>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        <!-- //TODO FILTRO COLORES -->
        <div class="d-flex contenedor-filtro" style="justify-content: space-between; padding: 5px 15px; margin-top: 6px;">
            <div>
                COLORES
            </div>
            <div>
                <button id="btn-filro-2" class="desplegar-producto-filtro" onclick="mostrarfiltro(2)">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
        <!-- Contenedor Oculto -->
        <?php $form = ActiveForm::begin([
            'action' => ['producto/productos'],
            'method' => 'get',
        ]); ?>
        <div id="filtros-2" class="mostrar-filtro">
            <?= $form->field($model, 'pro_color')->textInput(['placeholder' => 'Escribe el Color', 'class' => "input-filtros"]) ?>
            <div>
                <?= Html::a('N', ['productos', 'producto' => '6'], ['class' => 'input-filtro-colores', 'style' => 'background: black']) ?>
                <?= Html::a('B', ['productos', 'producto' => '5'], ['class' => 'input-filtro-colores', 'style' => 'background: white']) ?>
                <?= Html::a('G', ['productos', 'producto' => '7'], ['class' => 'input-filtro-colores', 'style' => 'background: rgb(156, 156, 156)']) ?>
                <?= Html::a('R', ['productos', 'producto' => '8'], ['class' => 'input-filtro-colores', 'style' => 'background: rgb(180, 0, 0)']) ?>
            </div><br>
            <div class="contenedor-filtro-btn">
               <?= Html::submitButton('Buscar', ['class' => 'editar-btn-tarjeta']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

        <!-- //!INICIO DE CICLO -->
        <?php foreach ($fil as $filtros) { ?>

            <div class="d-flex contenedor-filtro" style="justify-content: space-between; padding: 5px 15px; margin-top: 6px;">
                <div>
                    <?= $filtros->nombre ?>
                </div>
                <div>
                    <button id="<?= $filtros->idbtn ?>" class="desplegar-producto-filtro" onclick="mostrarfiltro(<?= $filtros->idjs ?>)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            <!-- Contenedor Oculto -->
            <?php $form = ActiveForm::begin([
                'action' => ['producto/productos'],
                'method' => 'get',
            ]); ?>
            <div id="<?= $filtros->idfil ?>" class=" mostrar-filtro">

                <?= $form->field($model, '' . $filtros->nomfil . '')->textInput(['placeholder' => '' . $filtros->holder . '', 'class' => "input-filtros"]) ?>
                <div class="contenedor-filtro-btn">
                    <?= Html::submitButton('Buscar', ['class' => 'editar-btn-tarjeta']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        <?php } ?>
        <!-- //!FIN DEL CICLO -->

        <?php $form = ActiveForm::begin([
            'action' => ['producto/productos'],
            'method' => 'get',
        ]); ?>

        <div class="form-group" style="justify-content: center; display: flex; margin-top: 10px;">
            <?php /*Html::submitButton('Buscar', ['class' => 'btn btn-primary'])*/ ?>
            <?= Html::a('Limpiar', ['productos', 'orden' => '0', 'producto' => '0'], ['class' => 'btn btn-outline-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>



    <?php /*Html::a('Combinado',         ['productos', 'orden'          => '0'])*/ ?>

    <?php /*Html::a('Todos los Precios', ['productos', 'producto'       => '0'])*/ ?>
    <?php // Html::a('Hasta 500',    ['productos', 'producto'       => '3']) 
    ?>



</div>