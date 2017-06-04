<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Tabs;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
        'brandLabel' => 'Home',
        'brandUrl' => ['/admin/index'],
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [
                'label' => 'Login',
                'url' => ['/admin/login']],
            ],
        ]);
    NavBar::end();
    ?>
    <div class="container">
       
        <?= Nav::widget([
            'options'=>['class'=>'nav-tabs'],
            'items' => [
                [
                    'label' => 'Vicevi',
                    'url' => ['joke/index'],
                ],
                [
                    'label' => 'Kategorije',
                    'url' => ['category/index'],
                ],
                [
                    'label' => 'Admini',
                    'url' => ['admin/overview'],
                ],

                [
                    'label' => 'Komentari',
                    'url' => ['jokecomments/index'],
                ],
                [
                    'label' => 'Ocjene',
                    'url' => ['jokerating/index'],
                ],]
                
            ]);
        ?>
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
