<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Joke */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Vicevi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joke-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Izbriši', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Jeste li sigurni da želite izbrisati vic?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'joke:ntext',
            'submit_date',
            'submitter',
            'status_id',
            'approval_date',
            'admin_id',
            'joke_of_day_date',
            'joke_rating',
        ],
    ]) ?>

</div>
