<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\JokeRating */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="joke-rating-form">

    <?php $form = ActiveForm::begin(['fieldConfig' => [
            'template' => "{label}<div class=\"col-md-3\">{input}</div><div class=\"col-md-3\">{error}</div><br><br>",
            'labelOptions' => ['class' => 'col-md-1 control-label'],
            ],]); ?>

    <?= $form->field($model, 'joke_id')->textInput() ?>

    <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'joke_rating')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
