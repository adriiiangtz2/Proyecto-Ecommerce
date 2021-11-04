   <?php

    use yii\helpers\Url;
    use app\models\Usuario;
    //use kartik\select2\Select2;
    use yii\bootstrap4\Html;
    use kartik\depdrop\DepDrop;
    use yii\bootstrap4\ActiveForm;
    use yii\widgets\DetailView;

    ?>

   <!DOCTYPE html>
   <html lang="en-US">

   <head>
       <meta charset="utf-8">
       <meta content="IE=edge" http-equiv="X-UA-Compatible">
       <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
       <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

       <title>Domicilio</title>
       <!-- set your website meta description and keywords -->
       <meta name="description" content="Add your business website description here">
       <meta name="keywords" content="Add your business website keywords here">

   </head>

   <body>

       <div class="a-row a-spacing-micro">
           <div class="a-column a-span4 a-spacing-none a-spacing-top-mini address-column">
               <a id="ya-myab-address-add-link" class="a-link-normal add-new-address-button" href="registrar">
                   <div class="a-box first-desktop-address-tile">
                       <div class="a-box-inner a-padding-extra-large">
                           <div id="ya-myab-plus-address-icon" class="a-section a-spacing-none address-plus-icon aok-inline-block"></div>
                           <h2 class="a-color-tertiary">Agregar dirección</h2>
                       </div>
                   </div>
               </a>
           </div>


           <div class="main">
               <h1>Mis Domicilios</h1>
           </div>


           <?php foreach (\app\models\Domicilio::domi() as $domicilio) : ?>


               <div class="main-agileinfo">

                   <!-- owl-carousel -->
                   <div class="pricing pricing-two">
                       <div class="pricing-top top-two">
                           <h3>Domicilio</h3>
                       </div>
                       <div class="pricing-bottom">
                           <p>id :<?= $domicilio->dom_id ?></p>
                           <p>ciudad:<?= $domicilio->dom_ciudad ?></p>
                           <p>colonia:<?= $domicilio->dom_colonia ?></p>
                           <p>calle:<?= $domicilio->dom_calle ?></p>
                           <p>Numero exterior:<?= $domicilio->dom_numExt ?></p>
                           <p>Numero interios: <?= $domicilio->dom_numInt ?></p>
                           <p>telefono :<?= $domicilio->dom_telefono ?></p>
                           <p>Codigo postal:<?= $domicilio->dom_fkcp ?></p>


                           <p class="w3agile">-</p>
                           <p>
                               <?= Html::a('Modificar', ['update', 'id' => $domicilio->dom_id], ['class' => 'btn btn-primary']) ?>
                               <?= Html::a('Eliminar', ['delete', 'id' => $domicilio->dom_id], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => '¿Estas seguro que quieres eliminar este domicilio?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                           </p>
                       </div>
                   </div>
               </div>
       </div>

   <?php endforeach; ?>

   </body>

   </html>