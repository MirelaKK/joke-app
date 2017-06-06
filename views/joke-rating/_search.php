<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JokeRatingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="joke-rating-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'fieldConfig' => [
            'template' => "{label}<div class=\"col-md-3\">{input}</div><div class=\"col-md-3\">{error}</div><br><br>",
            'labelOptions' => ['class' => 'col-md-1 control-label'],
            ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'joke_id') ?>

    <?= $form->field($model, 'date_of_rating') ?>

    <?= $form->field($model, 'ip') ?>

    <?= $form->field($model, 'joke_rating') ?>

    <div class="form-group">
        <?= Html::submitButton('Traži', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Resetuj', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
