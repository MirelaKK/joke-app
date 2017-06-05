<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JokeStatus */

$this->title = 'Dodaj status vica';
$this->params['breadcrumbs'][] = ['label' => 'Statusi viceva', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joke-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
