<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JokeCommentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="joke-comments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'joke_id') ?>

    <?= $form->field($model, 'submitter') ?>

    <?= $form->field($model, 'joke_comment') ?>

    <?= $form->field($model, 'submit_date') ?>

    <?php echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
