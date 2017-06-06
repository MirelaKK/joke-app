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

    <p>
       
        <?= Html::a('Pretraga', ['joke-comments/search'], ['class' => 'btn btn-default']) ?>
        <?= $view ?>
        
    </p>
    
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'joke_id',
            'submitter',
            'joke_comment:ntext',
            'submit_date',
            'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
