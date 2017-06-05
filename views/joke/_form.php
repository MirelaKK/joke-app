<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\JokeStatus;
use app\models\Admin;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Joke */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="joke-form">

    <?php $form = ActiveForm::begin(['fieldConfig' => [
            'template' => "{label}<div class=\"col-md-3\">{input}</div><div class=\"col-md-3\">{hint}</div><div class=\"col-md-3\">{error}</div><br><br>",
            'labelOptions' => ['class' => 'col-md-1 control-label'],
            ],
        ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'joke')->textarea(['rows' => 6]) ?>
    <br><br><br><br><br>
    <?= $form->field($model, 'status_id')->dropDownList(ArrayHelper::map(JokeStatus::find()->all(),'id','status'),['prompt'=>'Izaberi status']) ?>

    <?= $form->field($model, 'admin_id')->dropDownList(ArrayHelper::map(Admin::find()->all(),'id','id'),['prompt'=>'Izaberi ID'])  ?>

    <?= $form->field($model, 'joke_of_day_date')->widget(
            DatePicker::className(), [
                 'inline' => false, 
                 'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ])->hint('Ostaviti prazno ako nije bio vic dana');?> 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dodaj' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
