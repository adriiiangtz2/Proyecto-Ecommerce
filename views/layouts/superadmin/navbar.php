<?php

use yii\bootstrap4\Nav;
use yii\bootstrap4\Html;
use yii\bootstrap4\NavBar;
use webvimark\modules\UserManagement\UserManagementModule;

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
                'items'=>UserManagementModule::menuItems(),
                'visible' => Yii::$app->user->isSuperAdmin
            ],
            [
                'label' => 'Menu',
                'url'=>['/site/menu'],
                'visible' => Yii::$app->user->isSuperAdmin
            ],

            // [
            //     'label' => 'Principal',
            //     'url'=>['/site/menu'],
            // ],
            // [
            //     'label' => 'Productos',
            //     'url'=>['/site/productos'],
            // ],
            // [
            //     'label' => 'Contactanos',
            //     'url'=>['/site/menu'],
            // ],
            // [
            //     'label' => 'Carrito',
            //     'url'=>['/site/menu'],
            // ],



            Yii::$app->user->isGuest ? (
                ['label' => 'Iniciar Sesion', 'url' => ['/user-management/auth/login']]
            ) : (

                ['label' => 'Logout', 'url' => ['/user-management/auth/logout']]
                /* '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>' */
                ),


        ],
    ]);
    





    NavBar::end();
?>
