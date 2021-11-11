<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

?>

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
            <?php /*$this->render('_search2', ['model' => $searchModel]);*/ ?>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <p>
                    <a class="btn btn-white" data-toggle="collapse" href="multiCollapseExample1" role="button" arial-expanded="false" arial-controls="multiCollapseExample1">
                        <i class="fas fa-marca-sing"></i> Modelos
                    </a>
                </p>
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