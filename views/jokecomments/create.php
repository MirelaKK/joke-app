<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JokeComments */

$this->title = 'Dodaj komentar na vic';
$this->params['breadcrumbs'][] = ['label' => 'Komentari viceva', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joke-comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
