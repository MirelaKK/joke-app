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
use app\models\SiteSearch;
use yii\bootstrap\ActiveForm;

MyAppAsset::register($this);
$model = new SiteSearch();

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
<div class="container">
          <div class="content-header">
        <h1>Vicevi</h1>
      </div>

    <div class="content-box">
    <div class="body-content">
        

        <div class="row">
            <div class="col-lg-2">
                <ul class="nav flex-column">
                      <li><?= Html::a('Naslovna', Url::to(['/site/index'])) ?></li>
                      <?= Html::a('Najbolji vicevi', Url::to(['/site/best']),['class'=>'btn btn-outline-primary btn-sm']) ?>
                      <?= Html::a('Najnoviji vicevi', Url::to(['/site/new']),['class'=>'btn btn-outline-primary btn-sm']) ?>
                      <?php 
                          $count=Category::find()->count();

                          for($i=1;$i<=$count;$i++) { ?>
                          <?php $query=Category::findOne($i);
                          ?>
                              <?= Html::a($query->category, Url::to(['/site/joke-category', 'id' => $i]),['class'=>'btn btn-outline-primary btn-sm']) ?>
                            <?php   
                          }
                      ?>

                      <li><?= Html::a('Pošaljite vic', Url::to(['/site/send'])) ?></li>
                      <li><?= Html::a('Kontakt', Url::to(['/site/contact'])) ?></li>
                </ul>
            </div>
            <div class="col-lg-8">
                <div class="center-block">
                    <?= $content ?>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="site-search">
                    <h4> Pretraga </h4>
                <?php $form = ActiveForm::begin([
                    'layout' => 'horizontal',
                    'action'=>['site/search'],
                    'method'=>'get',
  
                ]); ?>
                <div>  
                <?= $form->field($model, 'search')->textInput()->label(false) ?>
                </div>
        <div class="form-group">
                <?=Html::submitButton('Traži', ['class' => 'btn btn-primary'])?>
        </div>



</div>
<?php ActiveForm::end() ?>


                </div>
        </div>   
        
  
        <div class="row">
    <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Vicevi 2017</p>
    </div>
    </footer> 
        </div>
         </div> <!-- body content --> 
    </div> <!-- content box --> 
</div>  <!-- container -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

