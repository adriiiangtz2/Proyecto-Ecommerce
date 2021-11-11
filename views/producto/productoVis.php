<?php

use yii\bootstrap4\Html;
use yii\widgets\ListView;
use yii\bootstrap4\ActiveForm;

?>
<!-- tittle -->
<?= $this->render('/layouts/usuario/header') ?>
<div class="small-container">

    <div class="row row-2">
    </div>

    <div class="categories">
        <h1>Productos</h1>

        <div class="produc-form product">
            <?php $form = ActiveForm::begin(); ?>

            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h3 class="agileits-sear-head" style="margin-bottom: auto;"><i class="fas fa-sort-amount-down"></i>Filtro</h3>
                            </button>
                        </h5>
                    </div>
                    <?= $this->render('_search2', ['model' => $searchModel]); ?>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                    <div class="card card-body">
                                        <?= Html::a("De menor a mayor precio", ['/site/producto', 'num' => '1']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

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