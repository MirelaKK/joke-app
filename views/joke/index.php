<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\JokeStatus;
use yii\web\UrlManager;
/* @var $this yii\web\View */
/* @var $searchModel app\models\JokeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vicevi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joke-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p>
        <?= Html::a('Dodaj vic', ['create'], ['class' => 'btn btn-success']) ?>
        
        <?= Html::a('Pretraga', ['joke/search'], ['class' => 'btn btn-default']) ?>
        <br>
        <?= $view ?>
        <br>
        <br>
        
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'columns' => [

            'id',
            'title',
            'joke:ntext',
            ['label'=> 'Kategorije',
             'attribute' => 'category_ids',
             'value' => function($searchModel) {
                        $string='';
                        $searchModel->loadCategories();
                        foreach ($searchModel->categories as $category) {
                            $string = $string." ".$category->category;
                        }
                    return $string;
            }],
            'submit_date',
            'submitter',
            ['label'=> 'Status',
             'attribute' => 'joke_status_id',
             'value' => function($searchModel) {
                        return $searchModel->status->status;
            }],
            'approval_date',
            'publish_date',
            'joke_of_day_date',
            ['label'=> 'Admin',
             'attribute' => 'admin_id',
             'value' => function($searchModel) {
                        return $searchModel->admin->first_name." ".$searchModel->admin->last_name;
            }],
            'joke_rating',

            ['header'=>'Akcija',
             'class' => 'yii\grid\ActionColumn',
            'buttons'=> [
            'comment' => function($url, $model) {return Html::a('<span class="glyphicon glyphicon-comment"></span>', $url); }
            ],
            'template' => '{comment}{update}{delete}',
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>



