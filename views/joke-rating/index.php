<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\JokeRatingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ocjena vica';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joke-rating-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
        <?= Html::a('Pretraga', ['joke-rating/search'], ['class' => 'btn btn-default']) ?>
    <br>
        <?= $view ?>
    <br>
    <br>
    
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [

            ['attribute'=>'id',
            'headerOptions' => ['style' => 'width:10%'],
             ],
            ['attribute'=>'joke_id',
            'headerOptions' => ['style' => 'width:10%'],
             ],
            ['attribute'=>'date_of_rating',
            'headerOptions' => ['style' => 'width:20%'],
             ],
            ['attribute'=>'ip',
            'headerOptions' => ['style' => 'width:30%'],
             ],
            ['attribute'=>'joke_rating',
            'headerOptions' => ['style' => 'width:10%'],
             ],

        ],
    ]); ?>
<?php Pjax::end(); ?></div>
