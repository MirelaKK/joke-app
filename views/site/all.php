<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ListView;
$this->params['breadcrumbs'][] = $this->title;


echo ListView::widget([
    'dataProvider' => $listDataProvider,
    'summary'=>'',
    'itemView' => '_joke',    
    'viewParams' => [
        'fullView' => true,
        'context' => 'main-page',
        // ...
    ],
    
]);
?>

   
    

