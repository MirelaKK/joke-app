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
        <?= $view ?>

    
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'joke_id',
            'date_of_rating',
            'ip',
            'joke_rating',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
