<!-- // ! Botonera creada para ver apartados para el usuario -->
<?php
use yii\bootstrap4\Html;
?>            
<?php
/* // TODO se crean objetos los cuales tendran 3 parametros ,Nombre,Url,Img,Info, se usa en ciclo de line 18 */
$card = [
    (object)['nombre' => 'USUARIO'    , 'url'  => 'informacion', 'img' => '<i class="fas fa-user-cog"></i>', 'info' => 'Informacion del Usuario'  ],
    (object)['nombre' => 'DOMICILIO'  , 'url'  => '/domicilio/mostrar', 'img' => '<i class="far fa-address-card"></i>', 'info' => 'EDITA DIRECCIONES PARA PEDIDOS Y REGALOS'  ],
    (object)['nombre' => 'TARJETAS'   , 'url' => '/cat-tarjeta/registrar', 'img' => '<i class="fas fa-credit-card"></i>' , 'info' => 'ADMINISTRA CONFIGURACIONES Y METODOS DE PAGO'  ],
    (object)['nombre' => 'FAVORTOS'   , 'url' => '/cat-favorito/favorito', 'img' => '<i class="fab fa-gratipay"></i>' , 'info' => 'LOS PRODUCTOS QUE AGREGUES A TUS FAVORITOS SE GUARDARÁN AQUÍ.'  ],
];
?>
<h3><b>MI CUENTA</b></h3>
            <!--     // *  INICIA CONTENEDOR GENERAL -- -->
                <div class="row">
                 <!--    // TODO ##### inicia el ciclo #######-- -->
                    <?php foreach ($card as $cards) { ?>
                        <div class="col-md-3">
                            <div id="cards">
                                <div class="card">
                                    <?= Html::a("<p>{$cards->img}</p>", ["{$cards->url}"], ['class' => 'icon','styles'=>'']) ?>
                                    <h3 class="category"><b><?=$cards->nombre?></b></h3>
                                    <p class="descripcion"><b>
                                        <?=$cards->info?>
                                    </b>
                                    </p>
                                </div>
                                </div>
                            </div>
                           <!--  // TODO -- ##### Termina el ciclo #######-- -->
                    <?php } ?>
                   <!--  //* TERMINA CONTENEDOR GENERAL -- -->
                </div>