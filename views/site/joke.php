<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;
/* @var $this yii\web\View */

$category_name=$jokeModel->categories;

 foreach ($category_name as $k=>$v){ 
   $category=$v['category']; 
   $category_id=$v['id'];
}

$this->title = $jokeModel->title;
$this->params['breadcrumbs'][] = ['label' => $category, 'url' => ['joke-category','id' => $category_id]];
$this->params['breadcrumbs'][] = $this->title;
?>  

<h2><?= $jokeModel->title; ?></h2>
  <p><?= $jokeModel->joke; ?></p> 
  
<div class="joke-rating-form">
 <?php $form = ActiveForm::begin(); ?>
<?= $form->field($ratingModel, 'joke_rating')->widget(StarRating::classname(), [
    'pluginOptions' => ['size'=>'xs',
                         'stars' => 5, 
                            'min' => 0,
                            'max' => 5,
                            'step' => 1,
                        'lang'=>'hr']
])->label(false)?>
    <?= $form->field($commentModel, 'joke_id')->hiddenInput(['value'=> $jokeModel->id])->label(false);?>
    
    <?= $form->field($commentModel, 'ip')->hiddenInput(['value'=>  '1:1:1:2'])->label(false); ?>
    <div class="form-group">
        <?= Html::submitButton('Rate', ['class' =>'btn btn-danger']) ?>
</div>
    <?php ActiveForm::end();?>
</div>
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

 


 