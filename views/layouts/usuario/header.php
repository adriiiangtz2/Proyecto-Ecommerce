<?php

use yii\helpers\Html;
use app\models\Usuario;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\models\CarritoDetalle;
use webvimark\modules\UserManagement\UserManagementModule;
?>
<div class="menu-negro">
   <div class="opercase">REDSTORE Bienvenido <?= \app\models\Usuario::usuario()->usu_nombre?></div> 
</div>
<?php
NavBar::begin([
    'brandLabel' => Yii::$app->name,
    // 'brandLabel' => '<img  style="width:30%;margin:none;" src='.Yii::$app->getUrlManager()->getBaseUrl().'/plantilla/images/logo.png>',
    'brandLabel' => Yii::$app->name. '   ' .Html::img('/plantilla/images/logo.png',['style' => 'width: 100px;']),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => '','style' => "background-color:#fff;"],
]);
//nav 1 - se divide para que pueda agarrar el style flex-grow y se jala a la izq
echo Nav::widget([
    'options' => ['class' => '', 'style' => "flex-grow:1"],
    'encodeLabels' => false,
    'items' => [
        [
            'label' => 'ADMINISTRADOR',
            'items' => UserManagementModule::menuItems(),
            'visible' => Yii::$app->user->isSuperAdmin,
            //visible solo para el admin
        ],

        [
            'label' => 'MENU',
            'url' => ['/site/menu'],
            'visible' => Yii::$app->user->isSuperAdmin,
        ],

    ],
]);

//nav 2 - contiene los elementos de la vista para el usuario o Guess
echo Nav::widget([
    'options' => ['class' => '', 'style' => ""],
    'encodeLabels' => false,
    'items' => [
        [
            'label' => '<i class="fas fa-tshirt"></i>' . ' PRODUCTOS',
            'url' => ['/producto/productos'],
            'visible' => !Yii::$app->user->isSuperAdmin,
            // se declara en el controlador como free para que tengan acceso sin estar logeado
        ],

        [
            'label' => '<i class="fas fa-heart"></i>',
            'url' => ['/cat-favorito/favorito'], //no se delcara en controlador por que aparece cuando se registre //se niega ! por que aparecera cuando se registre // isGuest es para cuando no se ha registrado es cliente
            'visible' =>
            !Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin,
            // para que no aparezca cuando esta en admin y usuario no registrado
        ],

        [
            'label' => '<i class="fas fa-shopping-cart"></i> <label id="contador">'.CarritoDetalle::carritoContador().'</label>',
            'url' => ['/carrito-detalle/carrito'],
            'visible' =>
            !Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin,
            // para que no aparezca cuando esta en admin y usuario no registrado
        ],

        // [
        //     'label' => 'Tarjetas',
        //     'url' => ['/cat-tarjeta/registrar'],
        //     'visible' =>
        //         !Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin,
        // ],

        [
            'label' => 'REGISTRAR',
            'url' => ['/usuario/registrar-usuario'], //se delcara en el controllador usuario por que aparecera la vista directamente // como no tiene el negado , desaparecera cuando se registre
            'visible' =>
            Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin,
        ],

        // [
        //     'label' => 'Domicilio',
        //     'url' => ['/domicilio/registrar'],
        //     'visible' =>
        //         !Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin,
        // ],

        // MENU DESPLEGABLE PARA EL USUARIO INFO
        [
            'label' => '<i class="fas fa-sort-amount-down"></i>' . ' CUENTAS Y LISTAS', 'url' => ['/usuario/botonera'],
            'visible' => !Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin,
            'items' => [
                ['label' => '<i class="fas fa-user"></i> ' . ' Mi Cuenta', 'url' => '/usuario/botonera'],

                [
                    'label' => '<i class="fas fa-credit-card"></i>' . ' MIS TARJETAS', 'url' => ['/cat-tarjeta/registrar'],
                    'visible' => !Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin,
                ],

                [
                    'label' => '<i class="far fa-address-card"></i>' . ' DOMICILIO', 'url' => ['/domicilio/mostrar'],
                    'visible' => !Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin,
                ],

                ['label' => '<i class="fas fa-boxes"></i>' . ' MIS PEDIDOS', 'url' => '#'],
            ],
        ],

        //BOTON INICIO DE SESION
        Yii::$app->user->isGuest ? [
            'label' => 'INICIAR SESION',
            'url' => ['/user-management/auth/login'],
        ] : [
            'label' => 'CERRAR SESION',
            'url' => ['/user-management/auth/logout'],
        ] /* '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>' */,
    ],
]);

NavBar::end();
?>