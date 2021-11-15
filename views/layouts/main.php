<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;


AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <?php $this->registerCsrfMetaTags(); ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head(); ?>
    <!-- fonto poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100  contenedor-pagina-eccomerce">
    <?php $this->beginBody(); ?>
    <header>
        <?= $this->render('usuario/header') ?>
    </header>
    <main role="main" class="flex-shrink-0">
        <div class="container contenedor--eccomerce">
        <!-- <div style="background-color:black;height:5px"></div><br> -->
    
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs'])
                    ? $this->params['breadcrumbs']
                    : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>
    <footer class="footer mt-auto py-3 text-muted">
        <?= $this->render('footer') ?>
    </footer>

    <?php $this->endBody(); ?>
</body>

</html>
<?php $this->endPage(); ?>