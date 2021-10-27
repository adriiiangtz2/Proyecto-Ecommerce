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
    'options' => [
        'class' => 'headerr navbar navbar-expand-md  fixed-top a',
    ],
]);


echo Nav::widget([
    'options' => ['class' => ''],
    'encodeLabels' => false,
    'items' => [

        [
            'label' => 'Administrador',
            'items' => UserManagementModule::menuItems(),
            'visible' => Yii::$app->user->isSuperAdmin
        ],
        [
            'label' => 'Menu',
            'url' => ['/site/menu'],
            'visible' => Yii::$app->user->isSuperAdmin
        ],

        [
            'label' => 'Productos',
            'url' => ['/producto/productos'],
            'visible' => !Yii::$app->user->isSuperAdmin

        ],
        [
            'label' => 'Favorito',
            'url' => ['/cat-favorito/favorito'],
            //no se delcara en controlador por que aparece cuando se registre
            //se niega ! por que aparecera cuando se registre 
            // isGuest es para cuando no se ha registrado es cliente
            'visible' => !Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin
        ],
        [
            'label' => 'Carrito',
            'url' => ['/carrito-detalle/carrito'],
            'visible' => !Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin
        ],
        [
            'label' => 'Tarjetas',
            'url' => ['/cat-tarjeta/registrar'],
            'visible' => !Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin
        ],
        [
            'label' => 'Registrar',
            'url' => ['/usuario/registrar-usuario'],
            //se delcara en el controllador usuario por que aparecera la vista directamente
            // como no tiene el negado , desaparecera cuando se registre
            'visible' => Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin

        ],
        [
            'label' => 'Domicilio',
            'url' => ['/domicilio/registrar'],
            'visible' => !Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin
        ],

        Yii::$app->user->isGuest ? (['label' => 'Iniciar Sesion', 'url' => ['/user-management/auth/login']]) : (['label' => 'Cerrar Sesion', 'url' => ['/user-management/auth/logout']]
            /* '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>' */),




    ],
]);

NavBar::end();
?>