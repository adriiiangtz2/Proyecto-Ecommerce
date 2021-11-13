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
       <div>
           <h4> <b>MIS DIRECCIONES</b></h4>
       </div>
       <div class="row domicilio-contenedor">
           <div class="col-md-3 contenedor-agregar"> <a class="hiper" href="registrar" style="text-decoration: none">
                   <!-- owl-carousel -->
                   <div class="contenedor-card-agregar">
                       <div style="display: flex; justify-content: center; text-align: center;">
                           <h4>AGREGAR DIRECCIONES </h4>
                       </div>
                       <div style="display: flex; justify-content: center;">
                           <i class="fas fa-plus"></i>
                       </div>
                   </div>
               </a>
           </div>
           <?php foreach (\app\models\Domicilio::domi() as $domicilio) : ?>


               <div class="col-md-3 contenedor-card-domicilio ">
                   <!-- owl-carousel -->

                   <div class="domicilio-titulo">
                       <h3>Domicilio</h3>
                   </div>
                   <div class="domicilio-informacion">
                       <div>
                           <p><b> Ciudad:</b><?= $domicilio->dom_ciudad ?><br>
                               <b>Colonia:</b><?= $domicilio->dom_colonia ?><br>
                               <b>Calle:</b><?= $domicilio->dom_calle ?><br>
                               <b>Numero exterior:</b><?= $domicilio->dom_numExt ?><br>
                               <b>Numero interior:</b><?= $domicilio->dom_numInt ?><br>
                               <b>Teléfono :</b><?= $domicilio->dom_telefono ?><br>
                               <b>Código postal:</b><?= $domicilio->dom_fkcp ?>
                           </p>
                       </div>
                   </div>
                   <div class="domicilio-botones">
                       <?= Html::a('Modificar', ['update', 'id' => $domicilio->dom_id], ['class' => 'btn btn-primary']) ?>
                       <?= Html::a('Eliminar', ['delete', 'id' => $domicilio->dom_id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => '¿Estas seguro que quieres eliminar este domicilio?',
                                'method' => 'post',
                            ],
                        ]) ?>
                   </div>
               </div>

           <?php endforeach; ?>
       </div>


   </body>

   </html>