<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JokeComments */

$this->title = 'Updat-uj komentar na vic: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Komentari viceva', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="joke-comments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
