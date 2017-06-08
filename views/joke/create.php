<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Joke */

$this->title = 'Dodaj vic';
$this->params['breadcrumbs'][] = ['label' => 'Vicevi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="joke-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'admin' => $admin
    ]) ?>

</div>
