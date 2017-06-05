<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JokeRating */

$this->title = 'Updat-uj ocjenu vica: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ocjena vica', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="joke-rating-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
