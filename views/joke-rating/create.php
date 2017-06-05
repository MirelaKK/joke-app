<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JokeRating */

$this->title = 'Dodaj ocjenu';
$this->params['breadcrumbs'][] = ['label' => 'Ocjena vica', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joke-rating-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
