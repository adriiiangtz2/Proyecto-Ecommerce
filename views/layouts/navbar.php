<?php

use yii\bootstrap4\Nav;
use yii\bootstrap4\Html;
use yii\bootstrap4\NavBar;
use webvimark\modules\UserManagement\UserManagementModule;

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
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
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/user-management/auth/login']]
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
            )
        ],
    ]);
    
    NavBar::end();
