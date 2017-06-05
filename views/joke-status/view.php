<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JokeStatus */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Statusi viceva', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joke-status-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Izbriši', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Jeste li sigurni da želite izbrisati ovaj status?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'status',
        ],
    ]) ?>

</div>
