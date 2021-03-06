<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategorije';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p>
        <?= Html::a('Dodaj kategoriju', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['style' => 'width:500px','style' => 'height:400px','class' => 'table-bordered'],
        'summary' => '',
        'columns' => [

            'id',
            'category',
            'sort_key',

            ['header'=>'Akcija',
             'class' => 'yii\grid\ActionColumn',
             'template' => '{update}{delete}'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
