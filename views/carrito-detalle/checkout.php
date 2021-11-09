<?php

use app\models\Envio;
use app\models\Usuario;
use yii\bootstrap4\Html;
use app\models\Domicilio;
use kartik\select2\Select2;
use app\models\CatMetodopago;
use app\models\CarritoDetalle;
use yii\bootstrap4\ActiveForm;

$total = 0;
?>
<!-- card items details -->
<div class="content-check">

    
    <div id="cardet" class="cardet">

        <div class="small-container card-page">
            <table>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>SubTotal</th>
                </tr>
                <?php foreach (\app\models\CarritoDetalle::productosCarrito() as $carritoDe) : ?>
                    <tr>
                        <td>
                            <div class="card-info">
                                <img src=<?= $carritoDe->cardetFkproducto->getUrl() ?>>
                                <div>
                                    <p><?= $carritoDe->productoNombre ?></p>
                                    <small>Precio: $<?= $carritoDe->productoPrecio ?></small>
                                    <br>
                                    
                                </div>
                            </div>
                        </td>
                        <td><input id="input-cant<?= $carritoDe->cardet_id ?>" type="number" onclick="registrarCantidad(<?= $carritoDe->cardet_id ?>)" value=<?= $carritoDe->cardet_cantidad ?>></td>
                        <td>$<?= $carritoDe->cardet_precio ?></td>
                        <?php
                        $total = $total + $carritoDe->cardet_precio;
                        $iva = $total * 0.16;
                        $importe = $total + $iva;
                        ?>
                    </tr>
                <?php endforeach; ?>
                <!-- </tr>
        <tr>
            <td>
                <div class="card-info">
                    <img src="images/buy-2.jpg">
                    <div>
                        <p>red printed t-shirt</p>
                        <small>Price: $50.00 </small>
                        <br>
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td><input type="number" value="1"></td>
            <td>$80.00</td>
        </tr>

        </tr>
        <tr>
            <td>
                <div class="card-info">
                    <img src="images/buy-3.jpg">
                    <div>
                        <p>red printed t-shirt</p>
                        <small>Price: $50.00 </small>
                        <br>
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td><input type="number" value="1"></td>
            <td>$70.00</td>
        </tr> -->

            </table>

            <div class="total-price">
                <table>
                    <tr>
                        <td>SubTotal</td>
                        <td>$<?= $total ?></td>

                    </tr>

                    <tr>
                        <td>Impuestos</td>
                        <td>$<?= $iva ?></td>

                    </tr>

                    <tr>
                        <td>Total</td>
                        <td>$<?= $importe ?></td>

                    </tr>
                </table>

            </div>




        </div>
    </div>
    <div class="cardet-form cardet">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <? /* $form->field($model, 'car_fecha')->textInput()*/ ?>
        <?php /*$form->field($model, 'car_fkusuario')->textInput()*/ ?>
       


        <? /* $form->field($model, 'car_fkmetodo')->textInput() */?>
        
        <div class="col-md-4">
            <?= $form->field($model, 'car_fkmetodo')->widget(Select2::classname(), [
            'data' => CatMetodopago::map(),
            'language' => 'es',
            'options' => [
                
                    'placeholder' => 'Selecciona un metodo de pago...',
                    'onclick' => "guardarMetodo()",
                
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        </div>

        <? /* $form->field($model, 'car_fkdomicilio')->textInput() */ ?>
        <div class="col-md-4">
            <?= $form->field($model, 'car_fkdomicilio')->widget(Select2::classname(), [
            'data' => CarritoDetalle::domicilio(),
            'language' => 'es',
            'options' => ['placeholder' => 'Selecciona un domicilio...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        </div>
        <? /* $form->field($model, 'car_fkenvio')->textInput() */ ?>

        <div class="col-md-4">
            <?= $form->field($model, 'car_fkenvio')->widget(Select2::classname(), [
            'data' => Envio::map(),
            'language' => 'es',
            'options' => ['placeholder' => 'Selecciona un método de envio...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>
    


    <?php ActiveForm::end(); ?>
    <div class="form-group">
        <?= Html::submitButton('Guardar1', ['onclick' => 'guardarMetodo()']) ?>
    </div> 
    </div>

</div>  