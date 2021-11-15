<!-- // ! Botonera creada para ver apartados para el usuario -->
<?php
use yii\bootstrap4\Html;
?>            
<?php
/* // TODO se crean objetos los cuales tendran 3 parametros ,Nombre,Url,Img,Info, se usa en ciclo de line 18 */
$card = [
    (object)['nombre' => 'USUARIO'    , 'url'  => 'informacion',           'img' => 'usuario', 'info' => 'INFORMACION DEL USUARIO'  ],
    (object)['nombre' => 'DOMICILIO'  , 'url'  => '/domicilio/mostrar',    'img' => 'domicilio', 'info' => 'EDITA DIRECCIONES PARA PEDIDOS Y REGALOS'  ],
    (object)['nombre' => 'TARJETAS'   , 'url' => '/cat-tarjeta/registrar', 'img' => 'tarjeta' , 'info' => 'ADMINISTRA CONFIGURACIONES Y METODOS DE PAGO'  ],
    (object)['nombre' => 'FAVORTOS'   , 'url' => '/cat-favorito/favorito', 'img' => 'corazon' , 'info' => 'LOS PRODUCTOS QUE AGREGUES A TUS FAVORITOS SE GUARDARÁN AQUÍ.'  ],
];
?>
<h3><b>MI CUENTA</b></h3>
            <!--     // *  INICIA CONTENEDOR GENERAL -- -->
                <div class="row">
                 <!--    // TODO ##### inicia el ciclo #######-- -->
                    <?php foreach ($card as $cards) { ?>
                        <div class="col-md-4"> 
                            <div class="d-flex contenedor-cards-boto-usu">
                                <div class="contenedor-icono-usuario-botonera">
                                <?= Html::img("/img/botonerausu/{$cards->img}.png", ['class' => 'botonera-usuario'],["{$cards->url}"]) ?>
                            </div>
                            <div class="contenedor-cat-des-boto">
                            <?= Html::a("{$cards->nombre}", ["{$cards->url}"],['style'=>'font-weight: 400;font-size: 20px;']) ?>
                                <p><b><?=$cards->info?></b></p>
                            </div>
                                  
                                </div>
                                </div> 
                           <!--  // TODO -- ##### Termina el ciclo #######-- -->
                    <?php } ?>
                   <!--  //* TERMINA CONTENEDOR GENERAL -- -->
                </div>