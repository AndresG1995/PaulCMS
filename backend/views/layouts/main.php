<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Inicio',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    /*$menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];*/
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Iniciar Sesion', 'url' => ['/user/login']];
    } else {
    $menuItems[] = [
                    'label' => 'Administrar',
                    'items' => [
                        [
                            'label' => 'Noticias',
                            'url' => ['/noticia'],
                        ],
                        [
                            'label' => 'Categorias',
                            'url' => ['/categoria'],
                        ],
                        [
                            'label' => 'Usuarios',
                            'url' => ['/user/admin'],
                        ],
                    ],
              ];
    $menuItems[] = [
                    'label' => Yii::$app->user->identity->username,
                    'items' => [
                        [
                            'label' => 'Ir a Frontend',
                            'url' => ['/../../frontend/web']
                        ],
                        [
                            'label' => 'Salir',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']
                        ],
                    ],
              ];
        
        
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
