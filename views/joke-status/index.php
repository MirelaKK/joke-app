<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\JokeStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Statusi viceva';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joke-status-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Dodaj status vica', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['attribute'=>'id',
            'contentOptions' => array('style' => 'width: 50px;')],
            'status',
            
            ['class' => 'yii\grid\ActionColumn',
              'template' => '{update}{delete}'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
