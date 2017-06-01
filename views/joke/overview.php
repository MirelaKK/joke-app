<?php

/* @var $this yii\web\View */
use yii\grid\GridView;

$this->title = 'Pregled';
?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        //'id',
        ['label' => 'Naziv vica',
         'attribute' => 'title'],
         ['label' => 'Text vica',
         'attribute' => 'text'],
        [
        'class' => 'yii\grid\ActionColumn',
        //'controller' => 'category',
        'template'=> '{update}{delete}',
        'headerOptions' => ['style' => 'width:5%'],
],
        ],
]) ?>