<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\JokeCommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Komentari na viceve';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joke-comments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p>
       
    <?= Html::a('Pretraga', ['joke-comments/search'], ['class' => 'btn btn-default']) ?>
    <br>
     <?= $view ?>
    <br>
    <br>   
    </p>
    
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [

            'id',
            'joke_id',
            'submitter',
            'joke_comment:ntext',
            'submit_date',
            'active',

            ['header'=>'Akcija',
             'class' => 'yii\grid\ActionColumn',
             'template' => '{delete}'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
