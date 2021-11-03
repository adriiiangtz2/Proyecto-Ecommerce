<?php

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use webvimark\modules\UserManagement\UserManagementModule;
?>
<?php
NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => 'headerr navbar navbar-expand-md  fixed-top a'],
]);
//nav 1 - se divide para que pueda agarrar el style flex-grow y se jala a la izq
echo Nav::widget([
    'options' => ['class' => '','style'=>"flex-grow:1;"],
    'encodeLabels' => false,
    'items' => [
        [
            'label' => 'Administrador',
            'items' => UserManagementModule::menuItems(),
            'visible' => Yii::$app->user->isSuperAdmin,
            //visible solo para el admin
        ],

        [
            'label' => 'Menu',
            'url' => ['/site/menu'],
            'visible' => Yii::$app->user->isSuperAdmin,
        ],

    ],
]);

//nav 2 - contiene los elementos de la vista para el usuario o Guess
    echo Nav::widget([
        'options' => ['class' => '','style'=>""],
        'encodeLabels' => false,
        'items' => [
            [
                'label' => '<i class="fas fa-tshirt"></i>'.' Productos',
                'url' => ['/producto/productos'],
                'visible' => !Yii::$app->user->isSuperAdmin,
                // se declara en el controlador como free para que tengan acceso sin estar logeado
            ],
    
            [
                'label' => '<i class="fas fa-heart"></i>'.' Favorito',
                'url' => ['/cat-favorito/favorito'], //no se delcara en controlador por que aparece cuando se registre //se niega ! por que aparecera cuando se registre // isGuest es para cuando no se ha registrado es cliente
                'visible' =>
                    !Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin,
                    // para que no aparezca cuando esta en admin y usuario no registrado
            ],
    
            [
                'label' => '<i class="fas fa-shopping-cart"></i>'.' Carrito',
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
                'label' => 'Registrar',
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
                'label' => '<i class="fas fa-sort-amount-down"></i>'.' Cuentas y Listas','url' => ['/usuario/botonera'],
                'visible' => !Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin,
                'items' => [
                    ['label' => '<i class="fas fa-user"></i> '.' Mi Cuenta', 'url' => '/usuario/botonera'],
                    
                    ['label' => '<i class="fas fa-credit-card"></i>'.' Mis Tarjetas', 'url' => ['/cat-tarjeta/registrar'],
                    'visible' => !Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin,],
                    
                    [ 'label' => '<i class="far fa-address-card"></i>'.' Domicilio','url' => ['/domicilio/registrar'],
                    'visible' => !Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin,
                    ],
    
                    ['label' => '<i class="fas fa-boxes"></i>'.' Mis Pedidos', 'url' => '#'],
                ],
            ],
    
            //BOTON INICIO DE SESION
                 Yii::$app->user->isGuest ? [
                    'label' => 'Iniciar Sesion',
                    'url' => ['/user-management/auth/login'],
                ]: [
                    'label' => 'Cerrar Sesion',
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
