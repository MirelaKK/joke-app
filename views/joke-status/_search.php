<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\JokeStatusSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="joke-status-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'fieldConfig' => [
            'template' => "{label}<div class=\"col-md-3\">{input}</div><div class=\"col-md-3\">{error}</div><br><br>",
            'labelOptions' => ['class' => 'col-md-1 control-label'],
            ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'status')->dropDownList(ArrayHelper::map($model::find()->all(),'id','status'),['prompt'=>'Izaberi status']) ?> 

    <div class="form-group">
        <?= Html::submitButton('Traži', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Resetuj', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
