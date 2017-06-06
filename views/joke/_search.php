<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\JokeStatus;
use app\models\Admin;
use dosamigos\datepicker\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;

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

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'joke') ?>

    <?= $form->field($model, 'submit_date')->widget(
            DatePicker::className(), [
                'language' => 'bs',
                 'inline' => false, 
                 'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]) ?>

    <?= $form->field($model, 'submitter') ?>

    <?= $form->field($model, 'joke_status_id')->dropDownList(ArrayHelper::map(JokeStatus::find()->all(),'id','status'),['prompt'=>'Izaberi status']) ?>
    
    <?= $form->field($model, 'approval_date')->widget(
            DatePicker::className(), [
                'language' => 'bs',
                 'inline' => false, 
                 'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ])?>
    
        <?= $form->field($model, 'publish_date')->widget(
            DatePicker::className(), [
                 'inline' => false, 
                 'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ])?>
    
    <?= $form->field($model, 'admin_id')->dropDownList(ArrayHelper::map(Admin::find()->all(),'id','id'),['prompt'=>'Izaberi ID'])  ?>

    <?= $form->field($model, 'joke_of_day_date')->widget(
            DatePicker::className(), [
                'language' => 'bs',
                 'inline' => false, 
                 'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ])?>

    <?= $form->field($model, 'joke_rating') ?>

    <div class="form-group">
        <?= Html::submitButton('Traži', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Resetuj', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
