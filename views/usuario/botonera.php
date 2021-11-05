<h2>Mi cuenta</h2>
<?php

use yii\bootstrap4\Html;

$card = [
    (object)['nombre' => 'Usuario'    , 'url'  => '', 'img' => '<i class="fas fa-user-cog"></i>', 'info' => 'Informacion del Usuario'  ],
    (object)['nombre' => 'Domicilio'  , 'url'  => '/domicilio/mostrar', 'img' => '<i class="far fa-address-card"></i>', 'info' => 'Edita direcciones para pedidos y regalos'  ],
    (object)['nombre' => 'Tarjetas'   , 'url' => '/cat-tarjeta/registrar', 'img' => '<i class="fas fa-credit-card"></i>' , 'info' => 'Administra configuraciones y metodos de pago'  ],
    
];

?>            
                <!-- INICIA CONTENEDOR GENERAL -->
                <div class="row">
                    <?php foreach ($card as $cards) { ?>
                        <div class="col-md-4">
                            <div id="cards">
                                <div class="card">
                               <?= Html::a("<p>{$cards->img}</p>", ["{$cards->url}"], ['class' => 'icon','styles'=>'']) ?>
                                    <h2 class="category"><?=$cards->nombre?></h2>
                                    <p class="descripcion">
                                    <?=$cards->info?>
                                    </p>
                                </div>
                                </div>
                            </div>
                    <?php } ?>

                </div>
         <!-- TERMINA CONTENEDOR GENERAL -->