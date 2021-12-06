<?php



?>
<!-- tittle -->
<div>
    <h3><b>PRODUCTOS</b></h3>
</div>
<div class="row d-flex">

    <!-- filtros -->
    <div class="col-md-2 contenedor-izq-producto">
        <h4><b>FILTRO</b></h4>
        <?= $this->render('_search2', ['model' => $searchModel]); ?>
    </div>
    <!--tarjetas-->
    <div class="col-md-10" style="">
        <div class="filas">
            <?= $this->render('listView', compact('searchModel', 'dataProvider')); ?>
        </div>
    </div>
</div>