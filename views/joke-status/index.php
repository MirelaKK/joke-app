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
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj status vica', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
            ['htmlOptions' => array('style' => 'width: 30px;'),
            'filterHtmlOptions' => array('style' => 'width: 30px;');],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
