<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\JokeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vicevi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joke-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Dodaj vic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'joke:ntext',
            'submit_date',
            'submitter',
            'status_id',
            'approval_date',
            'admin_id',
            'joke_of_day_date',
            'joke_rating',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
