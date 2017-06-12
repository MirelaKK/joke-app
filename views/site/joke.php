<?php
use yii\helpers\Html;
use app\models\Joke;
use app\models\JokeComments;
/* @var $this yii\web\View */

$category_name=Joke::findOne($query->id)->categories;

$model=JokeComments::find()->where(['joke_id'=>$query->id]);
$number_of_joke_comments=$model->count();
$joke_comments=$model->all();

 foreach ($category_name as $k=>$v){ 
   $category=$v['category']; 
   $category_id=$v['id'];
}

foreach ($joke_comments as $k=>$v){ 
   $joke_comment=$v['joke_comment']; 
}

$this->title = $query->title;
$this->params['breadcrumbs'][] = ['label' => $category, 'url' => ['joke-category','id' => $category_id]];
$this->params['breadcrumbs'][] = $this->title;
?>  		 
    

<h2><?= $query->title; ?></h2>
  <p><?= $query->joke; ?></p> 
 <h2>Komentari na vic:</h2>

<p><?php for($i=0;$i<$number_of_joke_comments;$i++) {
	
	  echo $joke_comment=$joke_comments[$i]['joke_comment']."<br>"; 
	
}?></p>

	<p>
    <?= Html::a('Prethodni vic', ['site/last-joke', 'id' => $query->id], ['class' => 'btn btn-default pull-left']) ?>
    <?= Html::a('Naredni vic', ['site/next-joke', 'id' => $query->id], ['class' => 'btn btn-default pull-right']) ?>
    </p>


 


 