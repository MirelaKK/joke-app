<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Pošalji vic';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <?php if (Yii::$app->session->hasFlash('jokeSent')): ?>

        <div class="alert alert-success">
            Hvala na poslatom vicu.
        </div>

    <?php else: ?>


                <?php $form = ActiveForm::begin(['id' => 'send-form']); ?>

                    <?= $form->field($model, 'title')->textInput(['maxLength' => true]) ?>

                    <?= $form->field($model, 'joke')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'submitter') ?>
                    <div class="form-group">
                        <?= Html::submitButton('Pošalji', ['class' => 'btn btn-primary', 'name' => 'send-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>


    <?php endif; ?>
</div>
