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
        'fieldConfig' => [
            'template' => "{label}<div class=\"col-md-3\">{input}</div><div class=\"col-md-3\">{error}</div><br><br>",
            'labelOptions' => ['class' => 'col-md-1 control-label'],
            ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'joke_id') ?>

    <?= $form->field($model, 'submitter') ?>

    <?= $form->field($model, 'joke_comment') ?>

    <?= $form->field($model, 'submit_date') ?>

    <?php echo $form->field($model, 'active')->dropDownList([0=>'Ne',1=>'Da'],['prompt'=>'']) ?>

    <div class="form-group">
        <?= Html::submitButton('Traži', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Resetuj', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
