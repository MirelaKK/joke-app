<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\JokeStatus;
use app\models\Admin;
use app\models\Category;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $model app\models\JokeRatingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    //'layout' => 'horizontal',
    'action' => ['index'],
        'method' => 'get',
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'offset' => 'col-sm-offset-2',
            'wrapper' => 'col-sm-4',
        ],
    ],
]); ?>

<div class="joke-search">
    <div class="row">

        <div class="col-md-4">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?> 
            <?= $form->field($model, 'joke')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'category_ids')-> dropDownList(Category::getAvailableCategories(),['prompt'=>'Izaberi kategoriju'])->label('Kategorije')?>
       </div>

        <div class="col-md-4">
             <?= $form->field($model, 'submit_date')->widget(
            DateRangePicker::className(), [
                'model'=>$model,
                'convertFormat'=>true,
                'pluginOptions'=>[
                'locale'=>[
                'format'=>'Y-m-d H:m:s'   
            ]]
            ]) ?>
            <?= $form->field($model, 'submitter') ?>
            <?= $form->field($model, 'joke_status_id')->dropDownList(ArrayHelper::map(JokeStatus::find()->all(),'id','status'),['prompt'=>'Izaberi status']) ?>
             <?= $form->field($model, 'approval_date')->widget(
            DateRangePicker::className(), [
                'model'=>$model,
                'convertFormat'=>true,
                'pluginOptions'=>[
                'locale'=>[
                'format'=>'Y-m-d H:m:s']]
            ])?>
            </div>

        <div class="col-md-4">
            <?= $form->field($model, 'publish_date')->widget(
            DateRangePicker::className(), [
                'model'=>$model,
                'convertFormat'=>true,
                'pluginOptions'=>[
                'locale'=>[
                'format'=>'Y-m-d H:m:s']]
            ])?>
            <?= $form->field($model, 'joke_of_day_date')->widget(
            DateRangePicker::className(), [
                 'model'=>$model,
                'convertFormat'=>true,
                'pluginOptions'=>[
                'format'=>'Y-m-d']
            ])->hint('Ostaviti prazno ako nije bio vic dana');?> 
             <?= $form->field($model, 'joke_rating') ?>
             </div>

         <div class="form-group">
        <?= Html::submitButton('Traži', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Resetuj', ['class' => 'btn btn-default']) ?>        
    
        </div>

       
    </div>
    </div>
<?php ActiveForm::end() ?>