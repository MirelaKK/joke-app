<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
?>

   
  <h2><?= $model->title; ?></h2>
  <p><?= $model->joke; ?></p>          

