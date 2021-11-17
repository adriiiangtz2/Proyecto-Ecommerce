<div style="border: 1px solid;">
    <div class="d-flex" style="justify-content: space-around;">
        <div>
            <p>ORDENAR POR</p>
        </div>
        <div>
            <button id="btn-filro-1" class="desplegar-producto-filtro" onclick="mostrarfiltro(1)">
                <i class=" fas fa-angle-down"></i>
            </button>
        </div>
    </div>
    <!-- Contenedor Oculto -->
    <div id="filtros-1" class="mostrar-filtro">
        <?= $form->field($model, 'menorPrecio') ?>

        <?= $form->field($model, 'mayorPrecio') ?>
    </div>
</div>

<?= $form->field($model, 'pro_nombre') ?>

<?= $form->field($model, 'pro_color') ?>

<?= $form->field($model, 'marca') ?>

<?= $form->field($model, 'tipo') ?>

<?= $form->field($model, 'tienda') ?>