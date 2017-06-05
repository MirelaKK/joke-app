<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JokeComments */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Joke Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joke-comments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Izbriši', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Jeste li sigurni da želite izbrisati ovaj komentar?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'joke_id',
            'submitter_name',
            'joke_comment:ntext',
            'submit_date',
            'active',
        ],
    ]) ?>

</div>
