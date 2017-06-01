<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\assets\MyAppAsset;
use app\models\Category;

MyAppAsset::register($this);

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

    <div class="navigation">
      <ul>
        <li><?= Html::a('Naslovna', Url::to(['/category/naslovna'])) ?></li>
        <li><?= Html::a('Najbolji vicevi', Url::to(['/category/najbolji_vicevi'])) ?></li>
        <li><?= Html::a('Najnoviji vicevi', Url::to(['/category/najnoviji_vicevi'])) ?></li>
        <?php 
            $count=Category::find()->count();

            for($i=1;$i<=$count;$i++) { ?>
            <?php $query=Category::findOne($i);
            ?>
                <li><?= Html::a($query->category, Url::to(['/category/vicevi', 'id' => $i])) ?></li>
              <?php   
            }
        ?>

        <li><?= Html::a('Pošaljite vic', Url::to(['/category/send'])) ?></li>
        <li><?= Html::a('Marketing', Url::to(['/category/marketing'])) ?></li>
        <li><?= Html::a('Kontakt', Url::to(['/category/contact'])) ?></li>
      </ul>
    </div>

    <div class="content-box">
    <?= $content ?>
    </div>
    <div class="footer">&copy; Vicevi 2017</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

