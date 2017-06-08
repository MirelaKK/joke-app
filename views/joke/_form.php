<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\JokeStatus;
use app\models\Category;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Joke */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="joke-form">

    <?php $form = ActiveForm::begin([
    
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'offset' => 'col-sm-offset-2',
            'wrapper' => 'col-sm-4',
            'input'=> 'col-md-4'
        ],
    ],
]); ?>
    <div class="row">   
        <div class="col-md-4">
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'joke')->textarea(['rows' => 6]) ?>
        </div>
   
        <div class="col-md-4">
    <?= $form->field($model, 'category_ids')-> checkboxList(Category::getAvailableCategories())->label('Kategorije')?>
        </div>

        <div class="col-md-4">
    <?= $form->field($model, 'joke_status_id')->dropDownList(ArrayHelper::map(JokeStatus::find()->all(),'id','status'),['prompt'=>'Izaberi status']) ?>
        
        
       
    <?= $form->field($model, 'admin_id')->hiddenInput(['value'=> $admin])->label(false);  ?>

       
    <?= $form->field($model, 'joke_of_day_date')->widget(
            DatePicker::className(), [
                 'inline' => false, 
                 'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ])->hint('Ostaviti prazno ako nije bio vic dana');?> 
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dodaj' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
