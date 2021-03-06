<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p>
        <?= Html::a('Dodaj admina', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [

            ['attribute'=>'id',
            'contentOptions' => array('style' => 'width: 100px;')],
            'first_name',
            'last_name',
            'email',
             ['attribute'=>'active',
            'contentOptions' => array('style' => 'width: 100px;')],

            ['header'=>'Akcija',
             'class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>