<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JokeComments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="joke-comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'joke_id')->textInput() ?>

    <?= $form->field($model, 'submitter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'joke_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'active')->dropDownList([1,2],['prompt'=>'Izaberi status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
