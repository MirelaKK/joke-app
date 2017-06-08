<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Joke */

$this->title = 'Promijeni Vic: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Vicevi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="joke-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'admin' => $admin,
    ]) ?>
    
    <p>
    <?= Html::a('Prethodni', ['last-joke', 'id' => $model->id], ['class' => 'btn btn-default pull-left']) ?>
    <?= Html::a('Naredni', ['next-joke', 'id' => $model->id], ['class' => 'btn btn-default pull-right']) ?>
    </p>
</div>
