<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\JokeStatus;
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
        'columns' => [

            'id',
            'title',
            'joke:ntext',
            'submit_date',
            'submitter',
            ['label'=> 'Status',
             'attribute' => 'joke_status_id',
             'value' => function($searchModel) {
                        return $searchModel->status->status;
            }],
            'approval_date',
            ['label'=> 'Admin',
             'attribute' => 'admin_id',
             'value' => function($searchModel) {
                        return $searchModel->admin->first_name." ".$searchModel->admin->last_name;
            }],
            'joke_of_day_date',
            'joke_rating',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
