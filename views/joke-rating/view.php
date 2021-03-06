<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JokeRating */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ocjena vica', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joke-rating-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('izbriši', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Jeste li sigurni da želite izbrisati ovu ocjenu?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'joke_id',
            'date_of_rating',
            'ip',
            'joke_rating',
        ],
    ]) ?>

</div>
