<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Joke */

$this->title = 'Create Joke';
$this->params['breadcrumbs'][] = ['label' => 'Jokes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joke-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
