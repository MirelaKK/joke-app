<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = $jokeModel->title;
//$this->params['breadcrumbs'][] = ['label' => $category, 'url' => ['joke-category','id' => $category_id]];
$this->params['breadcrumbs'][] = $this->title;
?>  

<h2><?= $jokeModel->title; ?></h2>
  <p><?= $jokeModel->joke; ?></p> 
  
<!-- failed attempt to add star-rating -->
  <input id="input-21e" value="0" type="number" class="rating" data-min=0 data-max=5 data-step=1 data-size="xs" data-rtl="true"
               title="">
  <hr>
	<p>
    <?= Html::a('Prethodni vic', ['site/last-joke', 'id' => $jokeModel->id], ['class' => 'btn btn-default pull-left']) ?>
    <?= Html::a('Naredni vic', ['site/next-joke', 'id' => $jokeModel->id], ['class' => 'btn btn-default pull-right']) ?>
    </p>
    <br>
    <br> 
    <hr>
<h4 class='comment'>Komentari:</h4>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'summary'=>'',
    'itemView' => '_comment',    
    'viewParams' => [
        'fullView' => false,
    ],
    
]) ?>
<div class="joke-comments-form">
 <?php $form = ActiveForm::begin(['fieldConfig' => [
            'template' => "{label}{input}{error}",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
            ],]); ?> 
    <?= $form->field($commentModel, 'joke_id')->hiddenInput(['value'=> $jokeModel->id])->label(false); ?>
    
    <?= $form->field($commentModel, 'active')->hiddenInput(['value'=> 1])->label(false); ?>
    
    <?= $form->field($commentModel, 'submitter')->textInput(['maxlength' => true])->label('Ime'); ?>

    <?= $form->field($commentModel, 'joke_comment')->textarea(['rows' => 6])->label('Komentar'); ?>
<div class="form-group">
        <?= Html::submitButton('Komentiraj', ['class' =>'btn btn-primary']) ?>
</div>
    <?php ActiveForm::end();?>
</div>

 


 